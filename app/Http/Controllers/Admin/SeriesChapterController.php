<?php

namespace App\Http\Controllers\Admin;

use App\Chapter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChapterRequest;
use App\Image;
use App\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SeriesChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create($id) {
        $series = Series::findOrFail($id);
        return view('chapters.create', compact('series'));
    }

    public function store(StoreChapterRequest $request) {
        try {
            DB::beginTransaction();
            $series = Chapter::create([
                'series_id' => $request->series_id,
                'name' => $request->name
            ]);
            DB::commit();

            return back()->withSuccess('Chapter Added Successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->withError('Chapter Cannot Add!');
        }
    }
    public function show($series_id, $chapter_id) {

        
        $chapter = Chapter::findOrFail($chapter_id);
        
        return view('chapters.show', compact('chapter'));

    }

    public function upload(Request $request, $series_id, $chapter_id) {
       
        
        $newPath = '/contents/'.'series/'.$series_id.'/chapters/'.$chapter_id;
        // if(Storage::exists($newPath)){

        // } else {
        //     Storage::makeDirectory($newPath);
        // }

        try {

            DB::beginTransaction();
            foreach($request->file('contents') as $content) {
                
                $storedPath = $content->storeAs($newPath, $content->getClientOriginalName(), 'public');

                $image = Image::create([
                    'image_url' => $storedPath,
                    'image_name' => $content->getClientOriginalName(),
                    'chapter_id' => $chapter_id
                ]);
                $image->save();
            }
            
            DB::commit();
            return back()->withSuccess("Content images are added successfully");

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            return back()->withErrors("failed!");
        }
        
        
    }
}
