<?php

namespace App\Http\Controllers;

use App\Http\Resources\KnjigaCollection;
use App\Http\Resources\KnjigaResource;
use App\Models\Knjiga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KnjigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new KnjigaCollection(Knjiga::all());
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
        $validator =Validator::make($request->all(),[
            'nazivKnjige'=>'required|string|max:255',
            'godinaIzdanja'=>'required|integer|digits:4|min:1500|max:'.(date('Y')+1),
            'brojStrana'=>'required|integer|digits:3|min:50|max:300',
            'opis'=>'required|string|max:255',
            'autor_id'=>'required',
            'zanr_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $knjiga=Knjiga::create([
            'nazivKnjige'=>$request->nazivKnjige,
            'godinaIzdanja'=>$request->godinaIzdanja,
            'brojStrana'=>$request->brojStrana,
            'opis'=>$request->opis,
            'user_id'=>Auth::user()->id,
            'autor_id'=>$request->autor_id,
            'zanr_id'=>$request->zanr_id
        ]);

        return response()->json(['Knjiga je uspesno kreirana', new KnjigaResource($knjiga)]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $knjiga = Knjiga::find($id);
        if(is_null($knjiga)){
            return response()->json('Knjiga za trazeni id nije pronadjena', 404);
        }

        return response()->json(new KnjigaResource($knjiga));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function edit(Knjiga $knjiga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knjiga $knjiga)
    {
        $validator =Validator::make($request->all(),[
            'nazivKnjige'=>'required|string|max:255',
            'godinaIzdanja'=>'required|integer|digits:4|min:1500|max:'.(date('Y')+1),
            'brojStrana'=>'required|integer|digits:3|min:50|max:300',
            'opis'=>'required|string|max:255',
            'autor_id'=>'required',
            'zanr_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $knjiga=Knjiga::create([
            $knjiga->nazivKnjige=$request->nazivKnjige,
            $knjiga->godinaIzdanja=$request->godinaIzdanja,
            $knjiga->brojStrana=$request->brojStrana,
            $knjiga->opis=$request->opis,
            $knjiga->autor_id=$request->autor_id,
            $knjiga->zanr_id=$request->zanr_id
        ]);

        $knjiga->save();

        return response()->json(['Knjiga je uspesno azurirana', new KnjigaResource($knjiga)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knjiga $knjiga)
    {
        $knjiga->delete();
        return response()->json(['Knjiga je uspesno obrisana']);
    }
}
