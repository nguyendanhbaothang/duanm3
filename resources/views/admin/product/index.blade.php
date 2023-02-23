@extends('master')
@section('content')
    <main class="page-content">
        <h1>Danh sách sản phẩm</h1>
        <div class="container">
                @include('sweetalert::alert')
            <table class="table">
                <div class="col-6">
                    <form>
                    <a class="btn btn-warning" type="button" name="key" value="{{ $f_key }}" data-bs-toggle="modal" data-bs-target="#basicModal">Tìm nâng cao</a>
                        @include('admin.product.modals.modalproductcolumns')
                    </form>
                    <a class="btn btn-warning" href="{{route('product.xuat')}}">Xuất</a>
                </div>
                <thead>
                    <tr>
                        <th scope="col">Số thứ tự</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Hiển thị</th>
                        <th adta-breakpoints="xs">Quản lí</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($products as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->category->name }}</td>
                            <td>{{ $team->amount }}</td>
                            <td>
                                <img src="{{ asset('public/uploads/product/' . $team->image) }}" alt=""
                                    style="width: 50px">
                            </td>
                            <td>
                                <form action="{{ route('product.softdeletes', $team->id) }}" method="POST">
                                    @if (Auth::user()->hasPermission('Product_view'))
                                    <a class="btn btn-info" href="{{ route('product.show', $team->id) }}">Xem</a>
                                    @endif
                                    @if (Auth::user()->hasPermission('Product_update'))
                                    <a href="{{ route('product.edit', $team->id) }}"
                                        class="btn btn-primary">Sửa</a>
                                    @endif
                                    @csrf
                                    @method('PUT')
                                    @if (Auth::user()->hasPermission('Product_delete'))
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Chuyên vào thùng rác')">Xóa</button>
                                        @endif
                                        <p class="text-success">
                                        <div > <i class="fa fa-check"
                                                aria-hidden="true"></i>
                                          </div>
                                        </p>
                                        <p class="text-danger">
                                        <div > <i
                                                aria-hidden="true"></i>
                                        </p>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-6">
                <div class="pagination float-right">
                    {{ $products->appends(request()->query()) }}
                </div>
            </div>
    </main>
@endsection
