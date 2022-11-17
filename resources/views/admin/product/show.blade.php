@extends('master')
@section('content')
<main class="page-content">
    <div class="container">
<section class="wrapper">
</section>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-description">
        </p>
        <div class="table-responsive pt-3">
          <table class="table table-info" >
            <thead>
                <tr> <th> {{$productshow->id}} </th></tr>
                <tr> <th>Tên sản phẩm : {{$productshow->name}} </th></tr>
                <tr> <th>Giá :{{$productshow->price}} </th></tr>
                <tr> <th>Số lượng :{{$productshow->amount}} </th></tr>
                <tr> <th>Mô tả :{{$productshow->description}} </th></tr>
                <tr> <th>Thể loại :{{$productshow->categories->name}} </th></tr>
                <tr> <th>Size :{{$productshow->size}} </th></tr>
                <tr> <th>Màu :{{$productshow->color}} </th></tr>
                <tr> <th>Ảnh  :<img src="{{ asset('images/product/' . $productshow->image) }}" alt=""
                    style="width: 150px"> </th></tr>

            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>























    </div>
</main>
@endsection
