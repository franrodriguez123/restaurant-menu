<?php

namespace App\Services;

use App\Models\Category;

class ApiMealsService
{
    public function get()
    {
        $result = [];

        if($categories = Category::all())
        {
            foreach($categories as $category)
            {
                $meals = [];

                foreach($category->meals as $meal)
                {
                    $allergens = [];

                    foreach($meal->allergens as $allergen)
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