<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KitchenController extends Controller
{
    public function index()
    {
        $kitchen = auth()->user()->kitchens()->with('items')->first();
        return view('my-kitchen', compact('kitchen'));
    }
}
