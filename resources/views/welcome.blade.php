@extends('layouts.app')

@section('content')

    <nav class="navbar navbar-expand-sm navbar-light bg-light ">
        <a class="navbar-brand text-center" href="#">Categories</a>
        @if(isset($categories))
        @foreach ($categories as $cat)
            <a class="nav-link" href="#">{{ $cat->name }}</a>
        @endforeach
        @endif

    </nav>

    {{-- slider --}}
    <div class="ism-slider" id="my-slider">
        <ol>
            @if(isset($collection['slider']))
            @foreach ($collection['slider'] as $k => $v)
                <li>
                    <img src="{{ asset('/' . $v->image) }}">
                    <div class="ism-caption ism-caption-0">{{ $v->name }}</div>
                </li>
            @endforeach
            @else
            <li>
                <img src="..">
                <div class="ism-caption ism-caption-0">add product with img and config slider </div>
            </li>
            @endif
            </div>

        </ol>
    </div>

    <h4>Special Offer</h4><br>
    <div class="card-group row overflow-auto" style="width: 100%;">
        @if(isset($collection['special_offer']))
        @foreach ($collection['special_offer'] as $k => $v)
            <div class="card col-md-3">
                <img class="card-img-top" src="{{ asset('/' . $v->image) }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $v->name }}</h5>
                    <p class="card-text">{{ $v->description }}</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        @endforeach
        @else
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
        @endif
    </div>
    <br>



    <h4>Brands</h4><br>
    <div class="row">
        @if(isset($collection['brands']))
        @foreach ($collection['brands'] as $k => $v)
            <div class="card text-left col-md-3">
                <img class="card-img-top" src="{{ asset('/' . $v->image) }}">
                <div class="card-body">
                    <h4 class="card-title">{{ $v->name }}</h4>
                    <p class="card-text">{{ $v->description }}</p>
                </div>
            </div>
        @endforeach
        @else
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
        @endif

    </div>


    <h4>The Most Viewed Products</h4><br>
    <div class="row">
        @if(isset($collection['most_view']))
        @foreach ($collection['most_view'] as $k => $v)
            <div class="card text-left col-md-3">
                <img class="card-img-top" src="{{ asset('/' . $v->image) }}">
                <div class="card-body">
                    <h4 class="card-title">{{ $v->name }}</h4>
                    <p class="card-text">{{ $v->description }}</p>
                </div>
            </div>
        @endforeach
        @else
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
        @endif
    </div>

    <h4>Products that just arrived</h4><br>
    <div class="row">
        @if(isset($collection['just_arrive']))
        @foreach ($collection['just_arrive'] as $k => $v)
            <div class="card text-left col-md-3">
                <img class="card-img-top" src="{{ asset('/' . $v->image) }}">
                <div class="card-body">
                    <h4 class="card-title">{{ $v->name }}</h4>
                    <p class="card-text">{{ $v->description }}</p>
                </div>
            </div>
        @endforeach
        @else
            <div class="card">
                <img class="card-img-top" src="holder.js/100x180/" alt="">
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                </div>
            </div>
        @endif

    </div>
    <footer class="text-center">
        @ CopyRight Reserved
    </footer>
@endsection
