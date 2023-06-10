<?php

namespace App\Http\Controllers;

use App\Models\Mcriteria;
use App\Models\Msubcriteria;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_criteria = Mcriteria::all()->count();
        $count_alternative = Mcriteria::all()->count();
        $count_subcriteria = Msubcriteria::all()->count();
        return view('modules.dashboard', compact('count_criteria', 'count_alternative', 'count_subcriteria'));
    }
}
