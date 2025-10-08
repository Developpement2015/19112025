<?php

namespace App\Http\Controllers;

use App\Models\Cadre;
use App\Models\CategorieCadre;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function page(Request $request)
    {
        // $date_range = $request->date_range;
        // $date_range = explode(' to ', $date_range);
        // $de = $date_range[0];
        // $a = $date_range[1];
        // $effictif = array();
        // $categories_cadre = CategorieCadre::with('cadres')->get();

        // $effictif['categories_cadre'] = $categories_cadre;

        // dd($effictif);

        return view('pages.tableau-de-bord');
    }
}
