<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\ProductSchoolLevel;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(Country $country)
    {
        // get an school of the country and redirect
        $school = array();
        if ($country->schools->count() > 0) {
            $school = $country->schools->toQuery()->orderBy('name', 'ASC')->first();
        } else {
            return redirect()->route("home.index");
        }

        //dd($school);

        return redirect()->route("schools.show", ["country" => $country, "school" => $school]);
    }

    public function show(Country $country, School $school, Request $request)
    {
        $school_level_selected_id = $request->query('level');

        $schools = $country->schools()
            ->orderBy('name', 'ASC')
            ->get();

        $school_levels = $school->school_levels;

        $school_level_selected = null;

        if ($school_levels->isNotEmpty()) {
            $school_level_selected = $school_levels->firstWhere('id', $school_level_selected_id) ?? $school_levels->first();
        }
            
        $products_school_levels = array();
        $i = 0;
        foreach ($school_levels as $school_level) {

            $products_school_levels[$i] = array();

            $products_school_levels[$i]["school_level"] = $school_level;

            $products_school_levels[$i]["products"] = ProductSchoolLevel::join("products", "product_school_level.product_id", "=", "products.id")
                ->where("product_school_level.school_level_id", $school_level->id)
                ->where('product_school_level.state_id', 1)
                ->where('products.state_id', 1)
                ->orderBy("products.name", "ASC")
                ->select("products.*") // muy importante
                ->get();

            $i++;
        }

        //dd($products_school_levels);

        return view("schools", [
            "current_country" => $country, 
            "current_school" => $school, 
            "schools" => $schools, 
            "school_levels" => $school_levels, 
            "products_school_levels" => $products_school_levels,
            "school_level_selected" => $school_level_selected
        ]);
    }
}
