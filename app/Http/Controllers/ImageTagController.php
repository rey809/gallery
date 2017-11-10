<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\ImagesTag;
use App\ImageUpload;
class ImageTagController extends Controller
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
    public function tag(Request $request)
    {
        $imagestag = new ImagesTag;

        $imagestag->gallery_id = $request->image_id;
        $imagestag->tags = $request->tag;
        $imagestag->save();

        return redirect()
            ->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $imageid = $request->input('image_id');
        $filename = $request->input('filename');

            $imageUpload = ImageUpload::find($imageid);
            $imageUpload->tag()->delete();
            $imageUpload->delete();
        unlink(public_path() . '/images/'.$request->filename);

       return redirect()
            ->back();
    }
}
