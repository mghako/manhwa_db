<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ChapterImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function destroy($id) {
        $image = Image::findOrFail($id);
        $tmp_image = $image;
        $image->delete();
        $status = Storage::disk('public')->delete($tmp_image->image_url);
        dd($status);
    }
}
