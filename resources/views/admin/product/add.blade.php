@extends('master')
@section('content')
<main class="page-content">
<a href="{{ route('product.index') }}" class="w3-button w3-red">Quay Lại</a>
<h2>Thêm sản phẩm</h2>
<div class="container">
<div class="row">
    <div class="col-lg-8 mx-auto">
     <div class="card">
         </div>
       <div class="card-body">
         <div class="border p-3 rounded">
         <form class="row g-3" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
           <div class="col-12">
             <label class="form-label">Tên</label>
             <input type="text" class="form-control" name="name" placeholder="Tên">
           </div>

           <div class="col-12">
            <label class="form-label">Giá</label>
            <div class="row g-3">
              <div class="col-lg-9">
                <input type="text" class="form-control" name="price" placeholder="Giá">
              </div>
              <div class="col-lg-3">
                <div class="input-group">
                </div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <label class="form-label">Số lượng</label>
            <div class="row g-3">
              <div class="col-lg-9">
                <input type="text" class="form-control" name="amount" placeholder="Số lượng">
              </div>
              <div class="col-lg-3">
                <div class="input-group">
                </div>
              </div>
            </div>
          </div>
           <div class="col-12">
             <label class="form-label">Sự mô tả</label>
             <textarea class="form-control" placeholder="Mô tả" name="description" rows="4" cols="4"></textarea>
           </div>

           <select name="category_id" id="" class="form-control">
            <option value="">--Vui lòng chọn--</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
          <div class="col-12">
            <label class="form-label">Size</label>
            <input type="text" class="form-control" name="size" placeholder="Size">
          </div>

          <div class="col-12">
            <label class="form-label">Màu</label>
            <input type="text" class="form-control" name="color" placeholder="Màu">
          </div>

           <div class="col-12">
             <label class="form-label">Images</label>
             <input class="form-control" name="image" type="file">
           </div>
           <div class="col-12">
             <button class="btn btn-primary px-4">Submit Item</button>
           </div>
         </form>
         </div>
        </div>
       </div>
    </div>
 </div>
 </div>
</main>
 @endsection
