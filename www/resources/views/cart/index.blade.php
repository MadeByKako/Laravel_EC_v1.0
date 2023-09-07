@extends('layouts.front')

@section('content')
<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt">Checkout</h1>
            </div>
        </div>
        <hr class="divider-w pt-20">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped table-border checkout-table">
                    <tbody>
                        <tr>
                            <th class="hidden-xs">Item</th>
                            <th>Description</th>
                            <th class="hidden-xs">Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                        <form method="POST" id="update_form" action="{{ route('cart.update') }}">
                            @csrf
                            @method('PUT')
                            @foreach ($cart as $item)
                            <tr>
                                <td class="hidden-xs"><a href="{{route('item.show', $item->id)}}"><img src="{{ asset(App\Models\Item::find($item->id)->image) }}" alt="Accessories Pack" /></a></td>
                                <td>
                                    <h5 class="product-title font-alt">{{ $item->name }}</h5>
                                </td>
                                <td class="hidden-xs">
                                    <h5 class="product-title font-alt">￥{{ $item->price }}</h5>
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="qty[{{ $loop->index }}]" value="{{$item->qty}}" max="999999" min="1" />
                                    <input type="hidden" name="rowId[{{ $loop->index }}]" value="{{ $item->rowId }}">
                                </td>
                                <td>
                                    <h5 class="product-title font-alt">￥{{$item->qty * $item->price}}</h5>
                                </td>
                                <td class="pr-remove">
                                    <a href="{{ route('cart.delete', $item->rowId) }}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3" style="float:right">
                @foreach($errors->all() as $error)
                <div class="text-danger" style="font-weight: 900;">{{ $error }}</div>
                @endforeach
                <div class="form-group">
                    <button form="update_form" class="btn btn-block btn-round btn-d pull-right" type="submit">Update Cart</button>
                </div>
            </div>
        </div>
        <hr class="divider-w">
        <div class="row mt-70">
            <div class="col-sm-5 col-sm-offset-7">
                <div class="shop-Cart-totalbox">
                    <h4 class="font-alt">Cart Totals</h4>
                    <table class="table table-striped table-border checkout-table">
                        <tbody>
                            <tr>
                                <th>Cart Subtotal :</th>
                                <td>￥{{ $subtotal }}</td>
                            </tr>
                            <tr>
                                <th>Shipping Total :</th>
                                <td>￥0</td>
                            </tr>
                            <tr class="shop-Cart-totalprice">
                                <th>Total :</th>
                                <td>￥{{ $total }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <form method="post" action="{{route('cart.destroy')}}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-lg btn-block btn-round btn-d" type="submit">購入(テスト)</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection