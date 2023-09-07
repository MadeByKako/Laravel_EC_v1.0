@extends('layouts.front')

@section('content')
<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt">注文履歴詳細</h1>
            </div>
        </div>
        <hr class="divider-w pt-20">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped table-border checkout-table">
                    <tbody>
                        <tr>
                            <th class="hidden-xs">Item</th>
                            <th>name</th>
                            <th class="hidden-xs">Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        @foreach ($cart_contents as $item)
                        <tr>
                            <td class="hidden-xs"><a href="{{route('item.show', $item->id)}}"><img src="{{ asset(App\Models\Item::find($item->id)->image) }}" alt="Accessories Pack" /></a></td>
                            <td>
                                <h5 class="product-title font-alt">{{ $item->name }}</h5>
                            </td>
                            <td class="hidden-xs">
                                <h5 class="product-title font-alt">￥{{ $item->price }}</h5>
                            </td>
                            <td>
                                <h5 class="product-title font-alt">{{ $item->qty }}</h5>
                            </td>
                            <td>
                                <h5 class="product-title font-alt">￥{{$item->qty * $item->price}}</h5>
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