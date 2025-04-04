<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index(){
        return view('profesor.inicio');
    }
}
