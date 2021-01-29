<?php

namespace App\Http\Controllers\Admin;

use App\Chapter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChapterRequest;
use App\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $chapter = Chapter::findOrFail($chapter_id)->with('series')->first();
        return view('chapters.show', compact('chapter'));

    }

    public function upload(Request $request, $series_id, $chapter_id) {
        dd($request);
    }
}
