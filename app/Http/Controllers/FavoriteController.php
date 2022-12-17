<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $query = Favorite::query();
        $query->where('user_id', Auth::id());
        $favorites = $query->paginate(2);
        $query = Reservation::query();
        $query->where('user_id', Auth::id());
        $reservations = $query->paginate(1);
        return view('mypage', ['favorites' => $favorites, 'reservations' => $reservations]);
    }
}
