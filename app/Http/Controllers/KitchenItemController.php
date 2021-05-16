<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KitchenItemController extends Controller
{
    public function create($id)
    {
        $kitchen = Auth::user()->kitchens()->findOrFail($id);

        return view('items.create', ['kitchen' => $kitchen]);
    }
}