@extends('layouts.front')

@section('content')
<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mb-sm-40"><a class="gallery" href="{{ asset($item->image) }}"><img src="{{ asset($item->image) }}" alt="Single Product Image" /></a>
                <ul class="product-gallery">
                    <li><a class="gallery" href="{{ asset($item->image) }}"></a><img src="{{ asset($item->image) }}" alt="Single Product" /></li>
                    <li><a class="gallery" href="{{ asset($item->image) }}"></a><img src="{{ asset($item->image) }}" alt="Single Product" /></li>
                    <li><a class="gallery" href="{{ asset($item->image) }}"></a><img src="{{ asset($item->image) }}" alt="Single Product" /></li>
                </ul>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="product-title font-alt">{{ $item->name }}</h1>
                    </div>
                </div>
                <div class="row mb-20">
                    <div class="col-sm-12">
                        @for($i=1; $i<=$average_star; $i++) <span><i class="fa fa-star star"></i></span>
                            @endfor
                            @for($i=1; $i<=(5-$average_star); $i++) <span><i class="fa fa-star star-off"></i></span>
                                @endfor
                                <a class="open-tab section-scroll" href="#reviews">-{{ $reviews->count() }}件のカスタマーレビュー</a>
                    </div>
                </div>
                <div class="row mb-20">
                    <div class="col-sm-12">
                        <div class="price font-alt"><span class="amount">{{ $item->price }}円</span></div>
                    </div>
                </div>
                <div class="row mb-20">
                    <div class="col-sm-12">
                        <div class="description">
                            <p>{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
                @if(session('message'))
                <div class="text-danger" style="font-weight: 900;">{{ session('message') }}</div>
                @endif
                @if($errors->has('item_id') || $errors->has('count'))
                @foreach($errors->all() as $error)
                <div class="text-danger" style="font-weight: 900;">{{ $error }}</div>
                @endforeach
                @endif
                @auth
                <div class="row mb-20">
                    <form method="post" action="{{ route('cart.store') }}" name="store_form">
                        @csrf
                        <div class="col-sm-4 mb-sm-20">
                            <input class="form-control input-lg" type="number" name="count" value="1" max="40" min="1" required="required" />
                        </div>
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <div class="col-sm-8">
                            <a class="btn btn-lg btn-block btn-round btn-b" href="javascript:store_form.submit()">Add To Cart</a>
                        </div>
                    </form>
                </div>
                @endauth
                <div class="row mb-20">
                    <div class="col-sm-12">
                        <div class="product_meta">カテゴリー:{{ $item->category->category_name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-70">
            <div class="col-sm-12">
                <ul class="nav nav-tabs font-alt" role="tablist">
                    <li class="active"><a href="#description" data-toggle="tab"><span class="icon-tools-2"></span>Description</a></li>
                    <li><a href="#reviews" id="reviews_tab" data-toggle="tab"><span class="icon-tools-2"></span>Reviews ({{ $reviews->count() }})</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="description">
                        {!! nl2br(e($item->description)) !!}
                    </div>
                    <div class="tab-pane" id="reviews">
                        <div class="comments reviews">
                            @foreach($reviews as $review)
                            <div class="comment clearfix">
                                <div class="comment-avatar"><img src="" alt="avatar" /></div>
                                <div class="comment-content clearfix">
                                    <div class="comment-author font-alt">{{ $review->name }}</div>
                                    <div class="comment-body">
                                        <p>{{ $review->text }}</p>
                                    </div>
                                    <div class="comment-meta font-alt">{{ $review->created_at }}
                                        @for($i=1; $i<=$review->star; $i++)
                                            <span><i class="fa fa-star star"></i></span>
                                            @endfor
                                            @for($i=1; $i<=(5-$review->star); $i++)
                                                <span><i class="fa fa-star star-off"></i></span>
                                                @endfor
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="comment-form mt-30">
                            <h4 class="comment-form-title font-alt">Add review</h4>
                            <div id="error_spot" style="margin-bottom:10px;">
                                @if(!$errors->has('item_id') && !$errors->has('count'))
                                @foreach($errors->all() as $error)
                                <div id="error" class="text-danger" style="font-weight: 900;">{{ $error }}</div>
                                @endforeach
                                @endif
                            </div>
                            <form method="post" action="{{ route('review.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="sr-only" for="name">Name</label>
                                            <input class="form-control" id="name" type="text" name="name" placeholder="Name" style="text-transform:none;" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="sr-only" for="email">Name</label>
                                            <input class="form-control" id="email" type="text" name="email" placeholder="E-mail" style="text-transform:none;" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="form-control" name="star">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" id="text" name="text" rows="4" placeholder="Review" style="text-transform:none;"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" id="item_id" name="item_id" value="{{ $item->id }}" />
                                    <div class="col-sm-12">
                                        <button class="btn btn-round btn-d" type="submit">Submit Review</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<hr class="divider-w">

<script type="text/javascript">
    window.onload = function() {
        let errorFlg = document.getElementById("error");
        if (errorFlg != null) {
            var b = document.getElementById('reviews_tab');
            b.addEventListener('click', function() {
                console.log('clicked');
            }, false);
            b.click();

            let targetElement = document.getElementById("error_spot");
            const rect = targetElement.getBoundingClientRect().top;
            const offset = window.pageYOffset;
            const gap = 60;
            const target = rect + offset - gap;
            window.scrollTo({
                top: target,
                behavior: 'smooth',
            });
        }
    }
</script>
@endsection