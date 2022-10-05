<?php

namespace App\Http\Controllers;

use App\Http\Resources\LanguageResource;
use App\Http\Resources\LanguagesCollection;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LanguagesCollection(Language::all());

        /** Without API Resource collection */
        // return Language::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Language::create($request->all())) {
            return response()->json([
                'message' => 'Language successfully registered'
            ], 201);
        }

        return response()->json([
            'message' => 'Language register failed'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show($language)
    {
        $language = Language::with('translates')->find($language);

        if ($language) {
            return new LanguageResource($language);

            /** Without API Resource */
            // $language->translates;
            // return $language;
        }

        return response()->json([
            'message' => 'Language not exists'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $language)
    {
        $language = Language::find($language);

        if ($language) {
            $language->update($request->all());

            return $language;
        }

        return response()->json([
            'message' => 'Language not exists'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy($language)
    {
        if (Language::destroy($language)) {
            return response()->json([
                'message' => 'Language successfully removed'
            ], 201);
        }

        return response()->json([
            'message' => 'Language not exists'
        ], 404);
    }
}
