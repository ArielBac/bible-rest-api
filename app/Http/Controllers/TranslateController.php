<?php

namespace App\Http\Controllers;

use App\Http\Resources\TranslateResource;
use App\Http\Resources\TranslatesCollection;
use App\Models\Translate;
use Illuminate\Http\Request;

class TranslateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TranslatesCollection(Translate::select('id', 'name', 'abbreviation')->paginate(5));

        /** Without API resource collection */
        //return Translate::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Translate::create($request->all())) {
            return response()->json([
                'message' => 'Translate successfully registered'
            ], 201);
        }

        return response()->json([
            'message' => 'Translate register failed'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  Translate  $translate
     * @return \Illuminate\Http\Response
     */
    public function show($translate)
    {
        $translate = Translate::with('language', 'books')->find($translate);

        if ($translate) {
            return new TranslateResource($translate);

            /** Without API Resource */
            // $translate->language;
            // $translate->books;

            // return $translate;
        }

        return response()->json([
            'message' => 'Translate not exists'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Translate  $translate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $translate)
    {
        $translate = Translate::find($translate);

        if ($translate) {
            $translate->update($request->all());

            return $translate;
        }

        return response()->json([
            'message' => 'Translate not exists'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Translate  $translate
     * @return \Illuminate\Http\Response
     */
    public function destroy($translate)
    {
        if (Translate::destroy($translate)) {
            return response()->json([
                'message' => 'Translate successfully removed'
            ], 201);
        }

        return response()->json([
            'message' => 'Translate not exists'
        ], 404);
    }
}
