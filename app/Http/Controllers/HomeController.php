<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Serie;

class HomeController extends Controller
{
    public function index()
    {
        // get series
        $series = Serie::where('state_id', 1)
                    ->inRandomOrder()
                    ->limit(20)
                    ->get();

        // get products from 5 diferent series
        $id_series_selected = [109, 99, 114, 64, 132, 44, 105, 159];

        $group_products = array();

        for ($i = 0; $i < count($id_series_selected); $i++) {
            $group_products[$i] = array();

            $group_products[$i]["serie"] = Serie::find($id_series_selected[$i]);

            $group_products[$i]["products"] = Product::join("levels", "products.level_id", "=", "levels.id")
                ->join("series", "levels.serie_id", "=", "series.id")
                ->where("series.id", $id_series_selected[$i])
                ->where("products.state_id", 1)
                ->select("products.*")
                ->orderBy("price_usd", "ASC")
                ->get();
        }

        return view("home", ["series" => $series, "group_products" => $group_products]);
    }

    public function serie(Serie $serie)
    {
        $category = $serie->category;

        return redirect()->route("series.show", ["category" => $category, "serie" => $serie]);
    }
}
