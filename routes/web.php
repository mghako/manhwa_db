<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');



Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {

    Route::resources([
        'series' => 'SeriesController',
        'chapters' => 'ChapterController'
    ]);

    Route::get('series/{id}/chapter', 'SeriesChapterController@create')->name('create.series.chapters');
    Route::post('series/chapter', 'SeriesChapterController@store')->name('store.series.chapters');
    Route::get('series/{series_id}/chapter/{chapter_id}', 'SeriesChapterController@show')->name('show.series.chapters');
    Route::post('series/{series_id}/chapter/{chapter_id}', 'SeriesChapterController@upload')->name('upload.series.chapters');
    

});