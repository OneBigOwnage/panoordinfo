<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('images.index')->with('images', Image::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $file = $request->file('filepond');

        Image::create([
            'original_file_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'file_path' => $this->saveFile($file),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return $image->toShowResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->unlinkFile()->delete();
    }

    /**
     * Save the given file in the server storage.
     *
     * @param  UploadedFile $uploadedFile The file to save.
     *
     * @return string The path at which the file is saved.
     */
    private function saveFile(UploadedFile $uploadedFile)
    {
        $name = Str::random(24) . '.' . $uploadedFile->extension();

        return $uploadedFile->storeAs('/uploaded_images', $name, [ 'disk' => 'local' ]);
    }
}
