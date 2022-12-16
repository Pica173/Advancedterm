@extends('layouts.parent')

@section('main')
@php
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
@endphp
<div class="flex">
  <div class="flex-left">
    <h2 class="ttl-reserve">予約状況</h2>
    @foreach ($reservations as $reservation)
    <div class="card-reservation">
      <div class="flex-reserve">
        <div class="flex-reserve-child">
          <img class="img-clock" src="../img/clock.svg" alt="">
          <p class="reserve-number">予約{{ $reservations->currentPage() }}</p>
        </div>
        <form action="{{ route('form.reserve-del', $reservation->id) }}" method="POST">
          @csrf
          <button class="img-btn-del">
            <img class="img-cross" src="../img/cross.svg" alt="">
          </button>
        </form>
      </div>
      <table class="reserve-tbl">
        <tr class="reserve-tbl-tr">
          <th class="reserve-tbl-td">shop</th>
          <td class="reserve-tbl-td">{{Shop::find($reservation->shop_id)->name}}</td>
        </tr>
        <tr class="reserve-tbl-tr">
          <th class="reserve-tbl-td">Date</th>
          <td class="reserve-tbl-td">{{ $reservation->date }}</td>
        </tr>
        <tr class="reserve-tbl-tr">
          <th class="reserve-tbl-td">Time</th>
          <td class="reserve-tbl-td">{{ $reservation->time }}</td>
        </tr>
        <tr class="reserve-tbl-tr">
          <th class="reserve-tbl-td">Number</th>
          <td class="reserve-tbl-td">{{ $reservation->number }}人</td>
        </tr>
      </table>
    </div>
    @endforeach
    {{ $reservations->links('vendor.pagination.custom') }}
  </div>
  <div class="flex-right">
    <h1 class="login-user">{{Auth::user()->name}}さん</h1>
    <h2 class="ttl-favorite">お気に入り店舗</h2>
    <div class="favorite-shop">
      <div class="flex-favorite-shop">
        @foreach ($favorites as $favorite)
        <div class="card-favorite">
          <div class="card__img">
            <img src="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" alt="">
          </div>
          <div class="card__shop-favorite">
            <h2 class="card__shop-name-favorite">{{ Shop::find($favorite->shop_id)->name }}</h2>
            <div class="card__shop-tag-favorite">
              <p>#{{Area::find(Shop::find($favorite->shop_id)->area_id)->name}}</p>
              <p>#{{Genre::find(Shop::find($favorite->shop_id)->genre_id)->name}}</p>
            </div>
            <div class="flex">
              <form action="{{ route('form.show', $favorite->shop_id) }}" method="post">
                @csrf
                <button class="shop__detail-favorite">詳しくみる</button>
              </form>
              <form action="{{ route('form.deleteFrmMypage', $favorite->shop_id) }}" method="POST">
                @csrf
                <button class="img-btn">
                  <img class="img-heart-favorite" src="img/heart-pink.svg" alt="">
                </button>
              </form>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      {{ $favorites->links('vendor.pagination.custom') }}
    </div>
  </div>
</div>
@endsection