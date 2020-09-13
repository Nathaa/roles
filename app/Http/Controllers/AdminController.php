<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //

    public function __construct()
{

}
public function index2()
{

    return view('admin.index2');

}

public function post()
{
    return view('admin.post');
}

}
