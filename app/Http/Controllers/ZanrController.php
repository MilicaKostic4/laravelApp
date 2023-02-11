<?php

namespace App\Http\Controllers;

use App\Http\Resources\ZanrCollection;
use App\Http\Resources\ZanrResource;
use App\Models\Zanr;
use Illuminate\Http\Request;

class ZanrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ZanrCollection(Zanr::all());
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zanr = Zanr::find($id);
        if(is_null($zanr)){
            return response()->json('Zanr za trazeni id nije pronadjen', 404);
        }

        return response()->json(new ZanrResource($zanr));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function edit(Zanr $zanr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zanr $zanr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zanr  $zanr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zanr $zanr)
    {
        //
    }
}
