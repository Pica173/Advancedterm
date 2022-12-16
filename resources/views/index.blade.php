@extends('layouts.parent')

@section('search-box')
<!-- 検索フォーム -->
<form class="form-search" method="post" action="{{ route('form.search') }}">
  @csrf
  <select name="area" id="area" class="form-select">
    <option value="All area">All area</option>
    @foreach ($areas as $area)
    <option value="{{$area -> id}}">{{$area -> name}}</option>
    @endforeach
  </select>
  <select name="genre" id="genre" class="form-select" placeholder="All genre">
    <option value="All genre">All genre</option>
    @foreach ($genres as $genre)
    <option value="{{$genre -> id}}">{{$genre -> name}}</option>
    @endforeach
  </select>
  <input class="search-input" type="text" name="text" placeholder="Search...">
  <button class="btn-search">GO</button>
</form>
@endsection

@section('main')
<div class="flex-shop">
  @foreach ($shops as $shop)
  <div class="card">
    <div class="card__img">
      <img src="{{$shop->img_url}}" alt="">
    </div>
    <div class="card__shop">
      <h4 class="card__shop-name">{{$shop->name}}</h4>
      <div class="card__shop-tag">
        <p>#{{ $shop->getArea() }}</p>
        <p>#{{ $shop->getGenre() }}</p>
      </div>
      <div class="margin-t-15 flex">
        <form action="{{ route('form.show', $shop) }}" method="post">
          @csrf
          <button class="shop__detail">詳しくみる</button>
        </form>

        @if($shop->users()->where('user_id', Auth::id())->exists())
        <form action="{{ route('form.delete', $shop) }}" method="POST">
          @csrf
          <button class="img-btn">
            <img class="img-heart" src="img/heart-pink.svg" alt="">
          </button>
        </form>
        @else
        <form action="{{ route('form.add', $shop) }}" method="POST">
          @csrf
          <button class="img-btn">
            <img class="img-heart" src="img/heart.svg" alt="">
          </button>
        </form>
        @endif
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection