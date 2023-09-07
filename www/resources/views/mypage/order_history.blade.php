@extends('layouts.front')

@section('content')
<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt">購入履歴</h1>
            </div>
        </div>
        <hr class="divider-w pt-20">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped table-border checkout-table">
                    <tbody>
                        <tr>
                            <th class="hidden-xs">ID</th>
                            <th>ユーザー名</th>
                            <th>購入日時</th>
                            <th class="hidden-xs">注文履歴詳細</th>
                        </tr>
                        @foreach ($carts as $cart)
                        <tr>
                            <td class="hidden-xs">
                                {{ $cart['id'] }}
                            </td>
                            <td>
                                <h5 class="product-title font-alt">{{ $cart['user_name'] }}</h5>
                            </td>
                            <td>
                                <h5 class="product-title font-alt">{{ $cart['created_at'] }}</h5>
                            </td>
                            <td class="hidden-xs">
                                <a href="{{ route('mypage.order_history_show', $cart['id']) }}" style="color: #337ab7;text-decoration:underline;font-weight: 600;">
                                    詳細
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection