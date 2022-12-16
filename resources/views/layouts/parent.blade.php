<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @yield('header')
  <title>COACHTECH</title>
  <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  @if(Auth::check())
  <nav class="nav" id="nav">
    <ul>
      <li><a href="/">HOME</a></li>
      <form method="post" name="form_1" action="/logout">
        @csrf
        <li><a href="javascript:form_1.submit()">Logout</a></li>
      </form>
      <form method="get" name="form_2" action="{{ route('form.mypageindex') }}">
        @csrf
        <li><a href="javascript:form_2.submit()">Mypage</a></li>
      </form>
    </ul>
  </nav>
  @else
  <nav class="nav" id="nav">
    <ul>
      <li><a href="/">HOME</a></li>
      <li><a href="/register">Registration</a></li>
      <li><a href="/login">Login</a></li>
    </ul>
  </nav>
  @endif
  <div class="container">
    <header class="header flex">
      <div class="header-left">
        <div class="menu" id="menu">
          <span class="menu__line--top"></span>
          <span class="menu__line--middle"></span>
          <span class="menu__line--bottom"></span>
          <h1 class="header__ttl_nauth">Rese</h1>
        </div>
      </div>
      <div class="search-box">
        @yield('search-box')
      </div>
    </header>
    <main class="main">
      @yield('main')
    </main>
  </div>
  <script src="../js/main.js"></script>
</body>

</html>