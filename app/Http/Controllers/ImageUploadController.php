<?php

namespace App\Http\Controllers;
use DB;
use App\ImageUpload;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImageUploadController extends Controller
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
    public function upload(Requests\UploadImageRequest $request)
    {

        $files = $request->file('filename');

        if(!empty($files)){
            foreach ($files as $file){
                $name = $file->getClientOriginalName();
                $filesize = $file->getClientSize();
                list($width, $height) = getimagesize($file);

                DB::table('image_uploads')->insert(
                    ['filename' => $name, 'filesize'=>$filesize, 'height'=>$height, 'width'=>$width]
                );
                $destinationPath = public_path('/images');
                $file->move($destinationPath, $name);
            }
        }
        return back()
            ->with('status',"<div class='alert alert-success'>Image Upload successfully</div>");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ImageUpload  $imageUpload
     * @return \Illuminate\Http\Response
     */
    public function show(ImageUpload $imageUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ImageUpload  $imageUpload
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageUpload $imageUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ImageUpload  $imageUpload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageUpload $imageUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImageUpload  $imageUpload
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageUpload $imageUpload)
    {
        //
    }
}
