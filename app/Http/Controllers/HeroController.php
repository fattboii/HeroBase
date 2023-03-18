<?php

namespace App\Http\Controllers;

use App\Models\hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public $timestamps = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['heroes'] = hero::paginate(5);
        return view('heros.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('heros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $heroData = request()->except('_token');
        //uploads the photos to a folder in storage->app->public->uploads
        if($request->hasFile('photo')){
            $heroData['photo']=$request->file('photo')->store('uploads','public');
        }
        hero::insert($heroData);
        return Redirect('heros');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function show(hero $hero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hero = hero::findOrFail($id);
        return view('heros.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $heroData = request()->except(['_token','_method']);
        //uploads the photos to a folder in storage->app->public->uploads
        if($request->hasFile('photo')){
            $hero = hero::findOrFail($id);
            Storage::delete('public/'.$hero->photo);
            $heroData['photo']=$request->file('photo')->store('uploads','public');
        }
        hero::where('id','=',$id)->update($heroData);
        $hero = hero::findOrFail($id);
        return view('heros.edit', compact('hero'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        hero::destroy($id);
        return redirect('/heros');
    }
}
