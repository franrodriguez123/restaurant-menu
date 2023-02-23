<?php

namespace App\Http\Controllers\Admin;

use App\Models\Meal;
use App\Models\Allergen;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.meals.index', [
            'meals' => Meal::orderBy('order')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meals.create', [
            'categories' => Category::all(),
            'allergens' => Allergen::all(),
        ]);
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
            'category_id' => 'required',
            'name' => 'required',
        ]);

        $meal = Meal::create($request->all());
        $meal->allergens()->attach($request->get('allergens'));

        return redirect()->route('meals.index')->with('success', 'Elemento creado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        return view('admin.meals.edit', [
            'meal' => $meal,
            'categories' => Category::all(),
            'allergens' => Allergen::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
        ]);
        
        $meal->update($request->all());
        $meal->allergens()->sync($request->get('allergens'));

        return redirect()->route('meals.index')->with('success', 'Elemento actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        $meal->delete();
        return redirect()->route('meals.index')->with('success', 'Elemento borrado correctamente');
    }
}
