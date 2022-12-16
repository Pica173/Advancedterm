<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        return view('index', ['areas' => $areas, 'genres' => $genres, 'shops' => $shops]);
    }
    public function search(Request $request)
    {
        $areas = Area::all();
        $genres = Genre::all();
        $form = $request;
        $query = Shop::query();
        if (!empty($form->area) && $form->area !== "All area") {
            $query->Where('area_id',   "$form->area");
        }
        if (!empty($form->genre) && $form->genre !== "All genre") {
            $query->Where('genre_id', "$form->genre");
        }
        if (!empty($form->text)) {
            $query->Where('name', 'LIKE BINARY', "%$form->text%");
        }
        $result = $query->get();
        return view('index', ['areas' => $areas, 'genres' => $genres, 'shops' => $result]);
    }

    public function add(Shop $shop, $id)
    {
        $shop = Shop::find($id);
        $shop->users()->attach(Auth::id());
        return redirect()->route('index');
    }
    public function delete(Shop $shop, $id)
    {
        $shop = Shop::find($id);
        $shop->users()->detach(Auth::id());
        return redirect()->route('index');
    }
    public function reserveDelete($id)
    {
        Reservation::find($id)->delete();
        return redirect()->route('form.mypageindex');
    }
    public function deleteFrmMypage(Shop $shop, $id)
    {
        $shop = Shop::find($id);
        $shop->users()->detach(Auth::id());
        return redirect()->route('form.mypageindex');
    }
    public function show(Shop $shop, $id)
    {
        $shop = Shop::find($id);
        $areas = Area::all();
        $genres = Genre::all();
        $query = Reservation::query();

        $query->where('user_id', Auth::id())
            ->where('shop_id', $id);
        $reserve = $query->paginate(1);
        return view('shop', ['areas' => $areas, 'genres' => $genres, 'shop' => $shop, 'reserves' => $reserve]);
    }

    public function reserve(Request $request, $id)
    {
        $form =
            [
                'user_id' => Auth::id(),
                'shop_id' => $id,
                'date' => $request->date,
                'time' => $request->time,
                'number' => $request->number
            ];
        Reservation::create($form);
        return view('reservethanks');
    }
}
