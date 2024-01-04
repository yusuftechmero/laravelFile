<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:png,webp,pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads');

        return redirect('/upload')->with('path', $path);
    }

    // app/Http/Controllers/FileController.php
    public function getFile($filename)
    {
        $path = storage_path("app/uploads/{$filename}");

        if (!Storage::exists("uploads/{$filename}")) {
            abort(404);
        }

        return response()->file($path, ['Content-Disposition' => 'inline']);
    }

}
