@extends('master')
@section('content')
    <main class="page-content">
        <h1>Danh sách thể loại</h1>
        @include('sweetalert::alert')

        <div class="container">
            <table class="table">
                {{-- <div class="col-6">
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
                </div> --}}
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
                                <form action="{{ route('category.restoredelete', $team->id) }}" method="POST">
                                            @csrf
                                            @method('put')

                                                <button type="submit" class="btn btn-success">Khôi Phục</button>

                                                <button   data-href="{{ route('category.destroy', $team->id) }}"
                                            id="{{ $team->id }}" class="btn btn-danger deleteIcon">Xóa</button>
                                        </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            {{-- {{ $categories->appends(request()->query()) }} --}}
        </div>
    </main>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click', '.deleteIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let href = $(this).data('href');
            let csrf = '{{ csrf_token() }}';
            console.log(id);
            Swal.fire({
                title: 'Bạn có chắc không?',
                text: "Bạn sẽ không thể hoàn nguyên điều này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: href,
                        method: 'delete',
                        data: {
                            _token: csrf
                        },
                        success: function(res) {
                            Swal.fire(
                                'Deleted!',
                                'Tệp của bạn đã bị xóa!',
                                'success',
                                window.location.reload(true);
                            )
                            $('.item-' + id).remove();
                        },
                    });
                    Swal.fire({
                        icon: 'error',
                        title: 'lỗi rồi...',
                        text: 'Đã xảy ra lỗi!',
                    })
                }
            })
        });
    </script>
@endsection
