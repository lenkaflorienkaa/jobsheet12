<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function showFileUploadForm()
    {
        return view('assignment');
    }

    public function handleFileUpload(Request $request)
    {
        $request->validate([
            'file_name' => 'required|string',
            'file' => 'required|file|image|max:500',
        ]);

        $extension = $request->file->getClientOriginalExtension();
        $completeFileName = $request->file_name . '.' . $extension;

        $storedPath = $request->file->move('images', $completeFileName);
        $storedPath = str_replace("\\", "//", $storedPath);

        $publicPath = url('images/' . $completeFileName);

        return "
            Image successfully uploaded to <a href='$publicPath'>$completeFileName</a>
            <br>
            <img src='$publicPath' alt='$completeFileName' style='max-width: 500px; height: auto;'>
        ";
    }
}
