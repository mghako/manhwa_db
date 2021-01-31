<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Support\Facades\Storage;

class ChapterImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function destroy($id) {
        
        try {
            $image = Image::findOrFail($id);
            $tmp_image = $image;
            $status = $image->delete();
            if($status) {
                Storage::disk('public')->delete($tmp_image->image_url);
            }
            
            return back()->withSuccess('Image Deleted');
        } catch (\Throwable $th) {
            throw $th;
        }

        
    }
}
