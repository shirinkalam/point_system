<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new()
    {
        return view('topics.new');
    }

    public function store(Request $request)
    {
        auth()->user()->topics()->create($request->all());

        return back();
    }
}
