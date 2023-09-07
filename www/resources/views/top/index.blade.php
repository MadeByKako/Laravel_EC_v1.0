@extends('layouts.front')

@section('content')
<!-- <section class="module bg-dark-60 shop-page-header" data-background="style/images/shop/product-page-bg.jpg">
    <div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
        <h2 class="module-title font-alt">Shop Products</h2>
        <div class="module-subtitle font-serif">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
        </div>
    </div>
    </div>
</section> -->
<section class="module-small">
    <div class="container">
        @foreach ($errors->all() as $error)
        <p class="fs-2 text-danger">{{$error}}</p>
        @endforeach
        <form class="row" action="{{ route('top.search') }}">
            @csrf
            <div class="col-sm-4 mb-sm-20">
                <select class="form-control" id="parent_category_id" name="parent_category_id" onChange="get_category(this)">
                    <option value="">選択なし</option>
                    @foreach($parent_categories as $parent_category)
                    <option value="{{ $parent_category->id }}" @if(request('parent_category_id')==$parent_category->id){{ 'selected' }}@endif
                        >{{ $parent_category->parent_category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2 mb-sm-20">
                <select class="form-control" id="category_id" name="category_id">
                    <option value="">選択なし</option>
                    @if(isset($categories))
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(request('category_id')==$category->id){{ 'selected' }}@endif
                        >{{ $category->category_name }}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="col-sm-3 mb-sm-20">
                <select class="form-control" id="sort_id" name="sort_id">
                    <option value="" selected="selected">選択なし</option>
                    <option value="1" @if(request('sort_id')==1){{ 'selected' }}@endif>価格が高い順</option>
                    <option value="2" @if(request('sort_id')==2){{ 'selected' }}@endif>価格が低い順</option>
                </select>
            </div>
            <div class="col-sm-3">
                <button class="btn btn-block btn-round btn-g" type="submit">検索</button>
            </div>
        </form>
    </div>
</section>
<hr class="divider-w">
<section class="module-small">
    <div class="container">
        <div class="row multi-columns-row">
            @foreach($items as $item)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="shop-item">
                    <div class="shop-item-image"><img src="{{ asset($item->image) }}" alt="Accessories Pack" />
                        @auth
                        <div class="shop-item-detail">
                            <form method="post" action="{{route('cart.store')}}">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                <input type="hidden" name="count" value="1">
                                <button type="submit" class="btn btn-round btn-b"><span class="icon-basket">Add To Cart</span></button>
                            </form>
                        </div>
                        @endauth
                    </div>
                    <h4 class="shop-item-title font-alt"><a href="{{ route('item.show', $item->id) }}" style="color: #337ab7;text-decoration:underline;font-weight: 600;">{{ $item->name }}</a></h4>{{ $item->price }}円
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-sm-12">
                {{ $items->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function get_category(obj) {
        var idx = obj.selectedIndex;
        var value = obj.options[idx].value
        var request = new XMLHttpRequest();
        request.open('GET', "http://localhost/api/category/" + value, true);
        request.responseType = 'json';

        request.onload = function() {
            var data = this.response;

            const selectBox = document.getElementById('category_id');
            selectBox.innerHTML = '';
            var option_fast = document.createElement("option");
            option_fast.text = "選択なし";
            option_fast.value = "";
            selectBox.appendChild(option_fast);

            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id;
                option.text = item.category_name;
                selectBox.appendChild(option);
            });
        };
        request.send();
    }
</script>
@endsection