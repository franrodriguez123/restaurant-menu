<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allergen;
use Illuminate\Http\Request;

class AllergensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allergens = Allergen::all();
        return view('admin.allergens.index', ['allergens' => $allergens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.allergens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:allergens'
        ]);

        Allergen::create($request->all());

        return redirect()->route('allergens.index')->with('success', 'Elemento creado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Allergen $allergen)
    {
        return view('admin.allergens.edit', ['allergen' => $allergen]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allergen $allergen)
    {
        $request->validate([
            'name' => 'required|unique:allergens,name,' . $allergen->id,
        ]);
        
        $allergen->update($request->all());

        return redirect()->route('allergens.index')->with('success', 'Elemento actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allergen $allergen)
    {
        $allergen->delete();
        return redirect()->route('allergens.index')->with('success', 'Elemento borrado correctamente');
    }
}
