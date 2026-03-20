<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Level;
use App\Models\Product;
use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index(Category $category)
    {
        // get a serie of the category and redirect

        if ($category->series->count() > 0) {
            $serie = $category->series->toQuery()->orderBy('name', 'ASC')->first();
        } else {
            // si es que la categoria no tiene ninguna serie
            return redirect()->route("home.index");
        }

        return redirect()->route("series.show", ["category" => $category, "serie" => $serie]);
    }

    public function show(Category $category, Serie $serie, Request $request)
    {
        $level_selected_id = $request->query('level');

        $series = $category->series()
            ->where('state_id', 1)
            ->orderBy('name', 'ASC')
            ->get();

        $levels = $serie->levels;

        $level_selected = null;

        if ($levels->isNotEmpty()) {
            $level_selected = $levels->firstWhere('id', $level_selected_id) 
                ?? $levels->first();
        }

        // productos por nivel
        $products_levels = $levels->map(function ($level) {
            return [
                'level' => $level,
                'products' => Product::where('level_id', $level->id)
                    ->where('state_id', 1)
                    ->orderBy('name', 'ASC')
                    ->get()
            ];
        });

        return view('series', [
            'current_category' => $category,
            'current_serie' => $serie,
            'series' => $series,
            'levels' => $levels,
            'products_levels' => $products_levels,
            'level_selected' => $level_selected
        ]);
    }
}
