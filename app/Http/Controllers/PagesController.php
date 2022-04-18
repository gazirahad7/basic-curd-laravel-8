<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index()
    {
        return view('pages.index');
    }
    public function about()

    {
        $title = 'About Us';
        return view('pages.about', compact('title'));
    }
    public function users($id, $name)
    
    {
        $title = 'Gazi Rahad  - Web Developer'.$id . 'Company'.$name;

        return view('pages.users', compact('title'));

    }

        
}