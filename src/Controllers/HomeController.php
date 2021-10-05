<?php

namespace Hillel\Controllers;

class HomeController
{
    public function index()
    {
        return view('pages.home',['title' => 'Sandbox DB']);
    }
}
