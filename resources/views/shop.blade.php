@extends('layouts.parent')

@section('main')
<div class="flex-shop-detail">
  <div class="card-detail">
    <button class="btn-back" onClick="history.back();">
      <</button>
        <h1 class="card__shop-name">{{$shop->name}}</h1>
        <div class="card__img-detail">
          <img src="{{$shop->img_url}}" alt="">
        </div>
        <div class="card__shop-detail">
          <div class="card__shop-tag">
            <p>#{{ $shop->getArea() }}</p>
            <p>#{{ $shop->getGenre() }}</p>
          </div>
          <p class="overview">{{$shop->overview}}</p>
        </div>
  </div>
  <div class="reserve">
    <h1 class="reserve-ttl">予約</h1>
    <form class="form-reserve" action="{{ route('form.reserve', $shop) }}" method="POST">
      @csrf
      <div class=form-reserve-block>
        <input class="pl-5 block h-5 w-50 m-10 f-15 border-radius" type="date" name="date" required>
        <input class="pl-5 block h-5 w-88 m-10 f-15 border-radius form-icon" type="time" value="17:00" name="time" required>
        <select class="pl-5 block h-5 w-90 m-10 f-15 border-radius form-icon" type="number" name="number" required>
          @for($cnt = 1; $cnt <= 20; $cnt++ ) <option value="{{$cnt}}">{{$cnt}}人</option>
            @endfor
        </select>
        @if(!empty($reserves) )
        @foreach ($reserves as $reserve)
        <div class="reserved-content">
          <table>
            <tr>
              <th class="p-1">Shop</th>
              <td>{{$shop->name}}</td>
            </tr>
            <tr>
              <th>Date</th>
              <td>{{$reserve->date}}</td>
            </tr>
            <tr>
              <th>Time</th>
              <td>{{$reserve->time}}</td>
            </tr>
            <tr>
              <th>Number</th>
              <td>{{$reserve->number}}人</td>
            </tr>
          </table>
        </div>
        @endforeach
        {{ $reserves->links('vendor.pagination.custom') }}
        @endif
      </div>
      <button class="btn-reserve">
        予約する
      </button>
    </form>
  </div>
</div>

@endsection