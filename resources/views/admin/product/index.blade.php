@extends('master')
@section('content')

    <main class="page-content">
        <h1>Danh sách sản phẩm</h1>

        <div class="container">
            @include('sweetalert::alert')

            <table class="table">
                <div class="col-6">
                    <form class="navbar-form navbar-left" action="{{route('product.search')}}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-default">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                    </form>
                </div>
                <thead>
                    <tr>
                        <th scope="col">Số thứ tự</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Số lượng</th>
                        {{-- <th scope="col">Màu</th>
                        <th scope="col">Size</th>
                        <th scope="col">Giá</th> --}}
                        <th scope="col">Hiển thị</th>
                        <th adta-breakpoints="xs">Quản lí</th>
                    </tr>
                </thead>
                <tbody id="myTable">

                    @foreach ($products as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->categories->name }}</td>
                            <td>{{ $team->amount }}</td>
                            {{-- <td>{{ $team->color }}</td>
                            <td>{{ $team->Size }}</td>
                            <td>{{ $team->price }}</td> --}}
                            <td>
                                <img src="{{ asset('public/uploads/product/' . $team->image) }}" alt=""
                                    style="width: 50px">
                            </td>

                            <td>
                                <form action="{{ route('product.destroy', [$team->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có chắc chắn xóa không?');"
                                        class="btn btn-danger">Xóa</button>
                                    <a href="{{ route('product.edit', [$team->id]) }}" class="btn btn-primary">Sửa</a>
                                    <a href="{{ route('product.show', [$team->id]) }}" class="btn btn-primary">Xem chi tiết</a>
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
