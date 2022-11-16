@extends('master')
@section('content')
    <main class="page-content">
        <h1>Danh sách Sản phẩm</h1>

        <div class="container">

            <a class="btn btn-primary" href="{{ route('product.create') }}">Thêm </a>
            <table class="table">
                <div class="col-6">

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

                    @foreach ($categories as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
                            <td>{{ $team->categories }}</td>
                            <td>{{ $team->amount }}</td>
                            {{-- <td>{{ $team->color }}</td>
                            <td>{{ $team->Size }}</td>
                            <td>{{ $team->price }}</td> --}}
                            <td>{{ $team->image }}</td>

                            <td>
                                <form action="{{ route('product.destroy', [$team->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Bạn có chắc chắn xóa không?');"
                                        class="btn btn-danger">Xóa</button>
                                    <a href="{{ route('product.edit', [$team->id]) }}" class="btn btn-primary">Sửa</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            {{-- {{ $users->appends(request()->query()) }} --}}
        </div>
    </main>
@endsection
