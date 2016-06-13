<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContentController extends Controller
{

    public function index()
    {
        return view('content.index');
    }

    public function create() {
        return view('content.add');
    }

}
