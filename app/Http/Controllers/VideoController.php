<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$courses = Course::withCount(['students'])
		    ->with('category', 'teacher', 'reviews')
		    ->where('status', Course::PUBLISHED)
		    ->latest()
		    ->paginate(5);
    
        return view('video', compact('courses'));
    }
}
