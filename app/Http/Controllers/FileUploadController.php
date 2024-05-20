<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use JeroenNoten\LaravelAdminLte\Http\Controllers\Controller;

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
            'nama' => 'required|string|max:24',
            // 'berkas' => 'required|image|max:5000',
            'berkas' => 'required|file|max:5000|mimes:jpeg,png,jpg,gif,svg,apk,exe,zip',
        ]);

        // $path = $request->berkas->store('uploads');
        // $namaFile = $request->berkas->getClientOriginalName();

        // $namaFile = 'web-' . time() . "." . $exfile;
        // echo "Variabel Path Berisi : $path <br>";

        // $pathBaru = asset('storage/' . $namaFile);
        // echo "Proses Upload Berhasil, File Berada Di : $path";
        // echo "<br>";
        // echo "Tampilkan Nama File : '$namaFile' Dan tampilan Linknya : <a href = '$pathBaru'>$pathBaru</a>";
        // echo $request->berkas->getClientOriginalName()."Lolos Validasi";

        // TUGAS
        $file = $request->file('berkas');
        $filename = $request->nama . '.' . $file->getClientOriginalExtension();
        // upload Gambar dan menyimpan gambar di folder uploads berada di public
        $path = $file->storeAs('public/uploads', $filename);

        return view('file-upload-rename', ['filename' => $filename, 'filepath' => Storage::url($path)]);
    }
}
