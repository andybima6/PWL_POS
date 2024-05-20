<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }
    public function prosesFileUpload(Request $request)
    {
    // dump($request->berkas);
    // return "Pemrosesan file upload disini";
    // // B. INFORMASI FILE UPLOAD
    // if ($request->hasFile('berkas')) {
    //     echo "path(): " . $request->berkas->extension();
    //     echo "<br>";
    //     echo "extension(): " . $request->berkas->extension();
    //     echo "<br>";
    //     echo "getClientOriginalExtension(): " . $request->berkas->getClientOriginalExtension();
    //     echo "<br>";
    //     echo "getMimeType(): " . $request->berkas->getMimeType();
    //     echo "<br>";
    //     echo "getClientOriginalName(): " . $request->berkas->getClientOriginalName();
    //     echo "<br>";
    //     echo "getSize(): " . $request->berkas->getSize();
    // } else {
    //     echo "Tidak ada berkas yang diupload";
    // }
        $request->validate([
            'berkas' => 'required|file|image|max:5000',
        ]);
        // $path = $request->berkas->store('uploads');
        // $namaFile = $request->berkas->getClientOriginalName();
        $exfile=$request->berkas->getClientOriginalName();
        $namaFile = 'web-'.time().".".$exfile;
        $path = $request->berkas->storeAs('public',$namaFile);
        echo "Variabel Path Berisi : $path <br>";

        $pathBaru=asset('storage/'.$namaFile);
        echo "Proses Upload Berhasil, File Berada Di : $path";
        echo "<br>";
        echo "Tampilkan Nama File : '$namaFile' Dan tampilan Linknya : <a href = '$pathBaru'>$pathBaru</a>";
        // echo $request->berkas->getClientOriginalName()."Lolos Validasi";
    }
}
