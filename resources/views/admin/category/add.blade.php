@extends('master')
@section('content')
<main class="page-content">
    <h2>Thêm thể loại</h2>
{{-- <h2>Thêm</h2>
<form action="{{route('category.store')}}" method = 'post'>
    @csrf
  <label for="fname">Tên :</label><br>
  <input type="text" id="fname" name="name" ><br>
  <input type="submit" value="Thêm thể loại">
</form>
<a href="" class="w3-button w3-red"
type="submit"></a> --}}
<div class="container">

<div class="col-12 col-lg-12 d-flex">
    <div class="card border shadow-none w-100">
      <div class="card-body">
        <form class="row g-3" action="{{route('category.store')}}" method = 'post'>
            @csrf
          <div class="col-12">
            <label class="form-label">Tên</label>
            <input type="text" class="form-control" name="name" placeholder="Category name" >
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
