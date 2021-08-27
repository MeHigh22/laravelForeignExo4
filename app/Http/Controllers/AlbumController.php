<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Photo;
        $store->url = $request->file("url")->hashName();
        Storage::put("public/img", $request->file("url"));
        $store->save();

        $album = new Album;
        $album->name = $request->name;
        $album->author= $request->author;
        $album->photo_id= $store->id;
        $album->save();

        return redirect("/");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Photo::find($id);
        return view("pages.editPhoto", compact("edit"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Photo::find($id);
        Storage::delete("public/img" . $update->url);
        $update->url = $request->file("url")->hashName();
        Storage::put("public/img", $request->file("url"));
        $update->save();

        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Photo::find($id);
        $destroy2 = Album::find($id);
        Storage::delete("public/img". $destroy2->url);
        $destroy->delete();
        $destroy2->delete();

        return redirect("/");
    }
}
