<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSeriesRequest;
use App\Series;
use App\Status;
use App\Thumbnail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $series = Series::cursor();
        return view('series.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $statuses = Status::all();
        return view('series.create', compact('categories', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeriesRequest $request)
    {
        
        try {
            DB::beginTransaction();

            

            $series = Series::create([
                'name' => $request->name,
                'user_id' => auth()->user()->id,
                'category_id' => $request->category_id,
                'status_id' => $request->status_id,
                'description' => $request->description,
                'released_date' => $request->released_date
            ]);
            $series->save();

            if($series && $request->has('thumbnail')) {
                // create path for thumbnails upload
                $newPath = '/thumbnails/'.'series/'.$series->id;
                $storedPath = $request->file('thumbnail')->storeAs($newPath, $request->file('thumbnail')->getClientOriginalName(), 'public');
                
                if($storedPath) {
                    Thumbnail::create([
                        'image' => $storedPath,
                        'series_id' => $series->id
                    ]);
                }
                
            }

            DB::commit();

            return redirect()->route('admin.series.index')->withSuccess('Successfully added Series!');

        } catch (\Throwable $th) {
           DB::rollBack();
           throw $th;
        }

        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $series = Series::findOrFail($id);
        return view('series.show', compact('series'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::cursor();
        $statuses = Status::cursor();
        $series = Series::findOrFail($id);
        return view('series.edit', compact('series', 'categories', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
