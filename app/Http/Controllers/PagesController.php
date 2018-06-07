<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
    	$title = "Welcome to Laravel!";
    	//passing data to a page using compact
    	//return view('pages.index', compact('title'));
    	//passing data using with
    	return view('pages.index')->with('title', $title);
    	//it is going to look for index.php
    	//in the views folder
    }

    public function about(){
    	$title = "About";
    	return view('pages.about')->with('title', $title);
    }

    public function services(){
    	$data = array(
    		'title' => 'Services',
    		'services' => ['Web Design', 'Programming', 'SEO']
    	);
    	return view('pages.services')->with($data);
    }
}
