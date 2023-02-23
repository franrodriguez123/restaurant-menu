<?php

namespace App\Services;

use App\Models\Meal;
use App\Models\Allergen;
use App\Models\Category;

class ApiMealsService
{
    public function get()
    {
        $result = [];

        if($categories = Category::orderBy('order')->get())
        {
            foreach($categories as $category)
            {
                $meals = [];

                foreach($category->meals()->orderBy('order')->get() as $meal)
                {
                    $allergens = [];

                    foreach($meal->allergens()->orderBy('order')->get() as $allergen)
                    {
                        $allergens[] = ['name' => $allergen->name];
                    }

                    $meals[] = [
                        'name' => $meal->name,
                        'description' => $meal->description,
                        'price' => $meal->price,
                        'allergens' => $allergens,
                    ];
                }

                $result[] = [
                    'name' => $category->name,
                    'meals' =>$meals,
                ];
            }
        }

        return $result;
    }
}