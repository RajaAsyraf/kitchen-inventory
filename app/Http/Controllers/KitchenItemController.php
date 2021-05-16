<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KitchenItemController extends Controller
{
    public function create($id)
    {
        $kitchen = auth()->user()->kitchens()->findOrFail($id);

        return view('items.create', ['kitchen' => $kitchen]);
    }
}