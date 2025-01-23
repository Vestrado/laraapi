<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function login()
    {
        return view('login');
    }

    /**
     * Handle the search request.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('search');
    }
}
