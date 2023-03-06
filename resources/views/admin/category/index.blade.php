@extends('master')
@section('content')
    <main class="page-content">
        <h1>Danh sách thể loại</h1>
        @include('sweetalert::alert')
        <div class="container">
            <table class="table">
                <div class="col-6">
                    <form class="navbar-form navbar-left" action="{{route('categories.search')}}" method="GET">
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
                        <th adta-breakpoints="xs">Quản lí</th>
                    </tr>
                </thead>
                <tbody id="myTable">

                    @foreach ($categories as $key => $team)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $team->name }}</td>

                            <td>
                                <form  action="{{ route('category.softdeletes', $team->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    @if (Auth::user()->hasPermission('Category_delete'))
                                     <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Chuyên vào thùng rác')">Xóa</button>
                                    @endif
                                    @if (Auth::user()->hasPermission('Category_update'))
                                    <a href="{{ route('category.edit', [$team->id]) }}" class="btn btn-primary">Sửa</a>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $categories->appends(request()->query()) }}
        </div>
    </main>
@endsection
