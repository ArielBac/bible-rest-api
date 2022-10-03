<?php

namespace App\Http\Controllers;

use App\Models\Verse;
use Illuminate\Http\Request;

class VerseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Verse::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Verse::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Verse  $verse
     * @return \Illuminate\Http\Response
     */
    public function show($verse)
    {
        return Verse::findOrFail($verse);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Verse  $verse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $verse)
    {
        $verse = Verse::findOrFail($verse);

        $verse->update($request->all());

        return $verse;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Verse  $verse
     * @return \Illuminate\Http\Response
     */
    public function destroy($verse)
    {
        return Verse::destroy($verse);
    }
}
