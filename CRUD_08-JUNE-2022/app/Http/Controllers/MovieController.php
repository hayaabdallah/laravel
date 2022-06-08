<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //to redirect the user to home page for all movies 
        $movies=Movie::latest()->paginate(5);
        return view('movies.index',compact('movies'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //to create a new movie in create page
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request,Movie $inputs)
    {
        //when save movie data sent to store function
        $request->validate([
            'movie_name'=>'required',
            'movie_description'=>'required',
        ]);
         
        $request->file('photo')->storeAs('public/images',$request->photo->getClientOriginalName());
       // $path = $request->file('photo')->move(public_path('public/images'),$name);
        $inputs->photo= $request->photo->getClientOriginalName();
        $inputs->movie_name=$request->post('movie_name');
        $inputs->movie_description=$request->post('movie_description');
        $inputs->movie_gener=$request->post('movie_gener');
        //$inputs->photo=$name;
        $inputs->save();
        //add all user input to DB
        //Movie::create($request->all());
        return redirect()->route('movies.index')
        ->with('success','movie created successfully');
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
       return view('movies.show',compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
        return view('movies.edit',compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
        $request->validate([
            'movie_name'=>'required',
            'movie_description'=>'required',
        ]);

        $request->file('photo')->storeAs('public/images',$request->photo->getClientOriginalName());
        //dd($request);
        // $path = $request->file('photo')->move(public_path('public/images'),$name);

        $movie->photo= $request->photo->getClientOriginalName();
        $movie->movie_name=$request->post('movie_name');
        $movie->movie_description=$request->post('movie_description');
        $movie->movie_gener=$request->post('movie_gener');
        //$inputs->photo=$name;
        $movie->save();
        //$movie->update($request->all());
        return redirect()->route('movies.index')
             ->with('success','movie updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
       $movie->delete();
       return redirect()->route('movies.index')
          ->with('success','movie deleted successfully');
    }
}
