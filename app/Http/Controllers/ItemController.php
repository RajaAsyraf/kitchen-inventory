<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function show($id)
    {
        $item = Item::with('kitchen')->findOrFail($id);

        abort_unless($item->isVisibleTo(auth()->user()), 404);

        dd($item);

        return view('items.show', compact('item'));
    }

    public function update()
    {

    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        abort_unless($item->isVisibleTo(auth()->user()), 404);

        $item->delete();

        return redirect()->route('kitchen.index');
    }
}
