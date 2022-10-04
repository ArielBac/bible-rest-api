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
        if (Verse::create($request->all())) {
            return response()->json([
                'message' => 'Verse successfully registered'
            ], 201);
        }

        return response()->json([
            'message' => 'Verse register failed'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  Verse  $verse
     * @return \Illuminate\Http\Response
     */
    public function show($verse)
    {
        $verse = Verse::find($verse);

        if ($verse) {
            $verse->book;

            return $verse;
        }

        return response()->json([
            'message' => 'Verse not exists'
        ], 404);
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
        $verse = Verse::find($verse);

        if ($verse) {
            $verse->update($request->all());

            return $verse;
        }

        return response()->json([
            'message' => 'Verse not exists'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Verse  $verse
     * @return \Illuminate\Http\Response
     */
    public function destroy($verse)
    {
        if (Verse::destroy($verse)) {
            return response()->json([
                'message' => 'Verse successfully removed'
            ], 201);
        }

        return response()->json([
            'message' => 'Verse not exists'
        ], 404);
    }
}
