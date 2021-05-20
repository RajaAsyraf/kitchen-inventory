<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
    public function index()
    {
        $kitchen = auth()->user()->kitchens()->with('items')->first();
        $threeMonthDate = Carbon::today()->add(3, 'month')->toDateString();
        $expiredInThreeMonth = $kitchen->items->where('expired_at', '<', $threeMonthDate)->count();

        $sixMonthDate = Carbon::today()->add(6, 'month')->toDateString();
        $expiredInSixMonth = $kitchen->items->where('expired_at', '<', $sixMonthDate)->count();

        $oneYearDate = Carbon::today()->add(1, 'year')->toDateString();
        $expiredInOneYear = $kitchen->items->where('expired_at', '<', $oneYearDate)->count();

        $kitchen['stats'] = [
            'expiredInThreeMonth' => $expiredInThreeMonth,
            'expiredInSixMonth' => $expiredInSixMonth,
            'expiredInOneYear' => $expiredInOneYear,
        ];
        return view('kitchen.index', compact('kitchen'));
    }
}
