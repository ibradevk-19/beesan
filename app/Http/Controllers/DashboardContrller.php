<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WordFood;

class DashboardContrller extends Controller
{
    public function index()  {
        return view('dashboard')->with([
            'beneficial' => null,
        ]);
    }



}
