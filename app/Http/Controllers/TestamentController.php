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
        if (Testament::create($request->all())) {
            return response()->json([
                'message' => 'Testament succefully registered'
            ], 201);
        }

        return response()->json([
            'message' => 'Testament register failed'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  Testament  $testament
     * @return \Illuminate\Http\Response
     */
    public function show($testament)
    {
        $testament = Testament::find($testament);

        if ($testament) {
            return $testament;
        }

        return response()->json([
            'message' => 'Testament not exists'
        ], 404);
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
        $testament = Testament::find($testament);

        if ($testament) {
            $testament->update($request->all());

            return $testament;
        }

        return response()->json([
            'message' => 'Testament not exists'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Testament  $testament
     * @return \Illuminate\Http\Response
     */
    public function destroy($testament)
    {
        if (Testament::destroy($testament)) {
            return response()->json([
                'message' => 'Testament succefully removed'
            ], 201);
        }

        return response()->json([
            'message' => 'Testament not exists'
        ], 404);
    }
}
