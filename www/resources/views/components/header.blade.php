<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="/">Laravel EC</a>
        </div>
        <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="/">Home</a>
                </li>
                @guest
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">会員登録＆ログイン</a>
                    @else
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                    @endguest
                    <ul class="dropdown-menu" role="menu">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endguest
                        @auth
                        <li class="nav-item dropdown">
                            <a href="{{ route('mypage.order_history') }}">注文履歴</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endauth
                    </ul>

                </li>
                @auth
                <li class="dropdown">
                    <?php
                    $item_count = 0;
                    if (Auth::user()) {
                        $cart = Gloudemans\Shoppingcart\Facades\Cart::instance(Auth::user()->id)->content();
                        foreach ($cart as $c) {
                            $item_count += $c->qty;
                        }
                    }
                    ?>
                    <a class="" href="{{ route('cart.index') }}">Cart({{ $item_count }})</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>