<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::orderBy('id','desc')->paginate(4);
        return view('movies.index',['movies'=>$movies]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Form validation
        $validated = request()->validate([
            'title'=>'required',
            'trailer'=>'required',
            'year'=>'required',
            'genre'=>'required',
            'rating'=>'required',
            'description'=>'required',
            'image'     =>  'required|image|mimes:jpeg,png,jpg,jfif,gif|max:2048'
        ]);

        $validated['owner_id']=auth()->id();


        $image = $request->file('image');
        // Make a image name based on user name and current timestamp
        $name = Str::slug($request->input('title')).'_'.time();
        // Define folder path
        $folder = '/uploads/images/';
        // Make a file path where image will be stored [ folder path + file name + file extension]
        $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
        // Upload image
        $this->uploadOne($image, $folder, 'public', $name);
        // Set user profile image path in database to filePath
        $validated['image'] = $filePath;


        $movie = Movie::create($validated);
        return redirect()->route('movies.show', $movie->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        $featured = Movie::inRandomOrder()->first();
        return view('movies.show',compact('movie'),compact('featured'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.edit',compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, array(
            'title'=>'required',
            'trailer'=>'required',
            'year'=>'required',
            'genre'=>'required',
            'rating'=>'required',
            'description'=>'required',
            'image'     =>  'image|mimes:jpeg,png,jpg,jfif,gif|max:2048'
        ));

        $movie = Movie::find($id);

        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('title')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $movie->image = $filePath;
        }
        $movie->title=$request->input('title');
        $movie->trailer = $request->input('trailer');
        $movie->year = $request->input('year');
        $movie->genre = $request->input('genre');
        $movie->rating = $request->input('rating');
        $movie->description = $request->input('description');

        $movie->save();
        return redirect()->route('movies.show', $movie->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
