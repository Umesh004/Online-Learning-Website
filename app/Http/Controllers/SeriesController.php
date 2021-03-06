<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Video;
use App\Http\Requests\StoreSeriesRequest;
use App\Http\Requests\UpdateSeriesRequest;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series=Series::paginate(10);
        return view('front.series.index',compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSeriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Series  $series
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Series $series)
    {
        return view('front.series.show',compact('series'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function edit(Series $series)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSeriesRequest  $request
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeriesRequest $request, Series $series)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series)
    {
        //
    }
    public function episode(Series $series,$episodeNumber)
    {
        $video=$series->videos()->where('episode_number',$episodeNumber)->first();
        $nextVideo=$series->videos()->where('episode_number',$episodeNumber+1)->first();
        $nextVideoUrl=$nextVideo->url ?? null;
        $breadCrumbs = [
            [
                'text'=> 'Browse',
                'href'=> route('series.index')
            ],
            [
                'text'=> $series->title,
                'href'=> route('series.show', $series)
            ],
            [
                'text'=> $video->title,
                'active'=> true
            ],

        ];

        return view('front.series.video',compact('series','episodeNumber','video','nextVideoUrl','breadCrumbs'));
    }
}
