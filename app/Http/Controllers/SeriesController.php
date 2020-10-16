<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) {

        $series = [
            'Mr. Robot',
            'Silicon Valley',
            'How I Meet Your Mother'
        ];

        $html = "<ul>";
        foreach ($series as $serie){
        $html .="<li>$serie</li>";
        }
        $html .= "</ul>";

        return view('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }

}
