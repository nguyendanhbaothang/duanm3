@extends('master')
@section('content')

    <main class="page-content">
        <h1>Danh sách sản phẩm</h1>

        <div class="container">
            @include('sweetalert::alert')

            <table class="table">
                <div class="col-6">
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
                            <td>{{ $team->category->name }}</td>
                            <td>{{ $team->amount }}</td>
                            {{-- <td>{{ $team->color }}</td>
                            <td>{{ $team->Size }}</td>
                            <td>{{ $team->price }}</td> --}}
                            <td>
                                <img src="{{ asset('public/uploads/product/' . $team->image) }}" alt=""
                                    style="width: 50px">
                            </td>

                            <td>
                                <form action="{{ route('product.softdeletes', $team->id) }}" method="POST">

                                    <a class="w3-button w3-white" href="{{ route('product.show', $team->id) }}">Xem</a>

                                    <a href="{{ route('product.edit', $team->id) }}"
                                        class="w3-button w3-blue">Sửa</a>

                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="w3-button w3-red"
                                        onclick="return confirm('Chuyên vào thùng rác')">Xóa</button>
                                        <p class="text-success">
                                        <div > <i class="fa fa-check"
                                                aria-hidden="true"></i>
                                          </div>
                                        </p>
                                        <p class="text-danger">
                                        <div class="alert alert-danger"> <i
                                                class="bi bi-x-circle"aria-hidden="true"></i>
                                        </p>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            <div class="col-6">
                <div class="pagination float-right">
                </div>
            </div>


    </main>


@endsection
