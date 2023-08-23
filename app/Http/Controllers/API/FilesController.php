<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImageRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function upload(StoreImageRequest $request)
    {
        $name = Carbon::now()->timestamp . '_' . $request->file('image')->getClientOriginalName();
        $path = Storage::putFileAs('public/images', $request->file('image'), $name);

        return redirect()->back();
    }

    public function getFiles()
    {
        $files = Storage::allFiles();
        return response($files, 200);
    }
}
