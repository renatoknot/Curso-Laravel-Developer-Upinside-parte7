<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $property = new Property();
        $property->title = $request->title;
        $property->rental_price = $request->rental_price;
        $property->cover = $request->file('cover')->store('properties');
        $property->save();

        dump(
            $request->file('cover')->getMimeType(),//mostra o tipo de arquivo
            $request->file('cover')->getClientOriginalName(),//mostra o nome original
            $request->file('cover')->getClientOriginalExtension(),//mostra a extensão original "jpg"
            $request->file('cover')->extension(),//extensao mostrada "jpeg"
            $request->file('cover')->getSize(),//tamanho
            $request->file('cover')->isValid()//retornou true
        );

        echo "<img src='". Storage::url($property->cover) ."'>";

        // dump($request->cover, $request->allFiles());
        // dump($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
