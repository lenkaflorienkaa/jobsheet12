<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    // Display the file upload view
    public function fileUpload()
    {
        return view('file-upload');
    }

    // Process the file upload
    public function prosesFileUpload(Request $request)
    {
        // Validate the file upload
        $request->validate([
            'berkas' => 'required|file|image|max:500',
        ]);

        echo $request->berkas->getClientOriginalName() . " lolos validasi";
    }
}