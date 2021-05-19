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

    public function store($id)
    {
        $kitchen = auth()->user()->kitchens()->findOrFail($id);
        $input = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'integer'],
            'unit' => ['required', 'string', 'max:255'],
            'expired_at' => ['required'],
        ]);
        $kitchen->items()->create($input);
        return redirect()->route('kitchen.index');
    }
}