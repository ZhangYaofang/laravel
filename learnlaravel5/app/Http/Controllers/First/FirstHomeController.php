<?php

namespace App\Http\Controllers\First;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;

class FirstHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }    
	
	public function index()
	{
		return view('FirstHome')->withItems(Item::all());
	}
}
