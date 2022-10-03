<?php

namespace App\Http\Controllers;

use App\Models\Testament;
use Illuminate\Http\Request;

class TestamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Testament::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Testament::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Testament  $testament
     * @return \Illuminate\Http\Response
     */
    public function show($testament)
    {
        return Testament::findOrFail($testament);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Testament  $testament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $testament)
    {
        $testament = Testament::findOrFail($testament);

        $testament->update($request->all());

        return $testament;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Testament  $testament
     * @return \Illuminate\Http\Response
     */
    public function destroy($testament)
    {
        return Testament::destroy($testament);
    }
}
