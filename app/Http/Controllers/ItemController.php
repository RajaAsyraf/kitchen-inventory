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

        return view('items.show', compact('item'));
    }

    public function update($id)
    {
        $input = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'integer'],
            'unit' => ['required', 'string', 'max:255'],
            'location' => ['string', 'max:255', 'nullable'],
            'expired_at' => ['required'],
        ]);

        $item = Item::findOrFail($id);

        abort_unless($item->isVisibleTo(auth()->user()), 404);

        $item->update($input);

        return redirect()->route('kitchen.index');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        abort_unless($item->isVisibleTo(auth()->user()), 404);

        $item->delete();

        return redirect()->route('kitchen.index');
    }
}
