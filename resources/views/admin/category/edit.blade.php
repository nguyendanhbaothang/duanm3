@extends('master')
@section('content')
<main class="page-content">
<h2>Sửa</h2>


<div class="container">
    <a class="btn btn-primary" href="{{ route('category.index') }}">Quay lại</a>
    <div class="col-12 col-lg-12 d-flex">
        <div class="card border shadow-none w-100">
          <div class="card-body">
            <form class="row g-3" action="{{route('category.update',[$categories->id])}}" method="POST">
                @method('put')
                @csrf
              <div class="col-12">
                <label class="form-label">Tên</label>
                <input type="text" class="form-control" value="{{$categories->name}}" name="name" >
                @error('name')
                        <div style="color: red">{{$message}}</div>
                @enderror
              </div >



             <div class="col-12">
               <div class="d-grid">
                 <button class="btn btn-primary" type="submit">Add Category</button>
               </div>
             </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</main>
@endsection
