<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Status;
use Auth;

class StaticPagesController extends Controller
{
    public function home()
    {
        $feed_items = [];
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(10);
        }
    	return view('static.home', compact('feed_items'));
    }

    public function help()
    {
    	return view('static.help');
    }

    public function about()
    {
    	return view('static.about');
    }

}
