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
        $request->validate([
            'berkas' => 'required|file|image|max:500',
        ]);
        $extFile=$request->berkas->getClientOriginalName();
        $namaFile='web'.time().".".$extFile;
        $path = $request->berkas->storeAs('uploads',$namaFile);
        echo "Proses upload berhasil, file berada di: $path";
        // echo $request->berkas->getClientOriginalName() . " lolos validasi";
    }
}    