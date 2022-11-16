@extends('master')
@section('content')
<main class="page-content">
    <div class="container">
<section class="wrapper">

    <h1>id {{$productshow->id}}</h1>
    <h1>Tên sản phẩm {{$productshow->name}}</h1>
    <h1>Giá {{$productshow->price}}</h1>
    <h1>Số lượng {{$productshow->amount}}</h1>
    <h1>Mô tả {{$productshow->description}}</h1>
    <h1>Thể loại {{$productshow->categories->name}}</h1>
    <h1>Size {{$productshow->size}}</h1>
    <h1>Màu {{$productshow->color}}</h1>
    <h1>Anh  <img src="{{ asset('images/product/' . $productshow->image) }}" alt=""
        style="width: 150px"></h1>

</section>
    </div>
</main>
@endsection
