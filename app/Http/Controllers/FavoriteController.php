<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Favorite;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

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
