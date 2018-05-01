<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OverOnsController extends Controller
{
    public function index()
    {
    	return view('pages.over-ons');
    }
}
