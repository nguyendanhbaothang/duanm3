@extends('master')
@section('content')
<main class="page-content">
    <h1>Chi tiết sách sản phẩm</h1>
    <div class="container">
<section class="wrapper">
</section>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-description">
        </p>
        <div class="table-responsive pt-3">
          <table  >
            <thead>
                <tr> <th> {{$productshow->id}} </th></tr>
                <tr> <th>Tên sản phẩm : {{$productshow->name}} </th></tr>
                <tr> <th>Giá :{{$productshow->price}} </th></tr>
                <tr> <th>Số lượng :{{$productshow->amount}} </th></tr>
                <tr> <th>Mô tả :{{$productshow->description}} </th></tr>
                <tr> <th>Thể loại :{{$productshow->category->name}} </th></tr>
                <tr> <th>Size :{{$productshow->size}} </th></tr>
                <tr> <th>Màu :{{$productshow->color}} </th></tr>
                <tr> <th>Ảnh  :<img src="{{ asset('public/uploads/product/' . $productshow->image) }}" alt=""
                    style="width: 550px"> </th></tr>
            </thead>
        </table>
        <a class="btn btn-primary px-4" href="{{ route('product.index') }}" class="w3-button w3-red">Quay Lại</a>
        </div>
      </div>
    </div>
  </div>























    </div>
</main>
@endsection
