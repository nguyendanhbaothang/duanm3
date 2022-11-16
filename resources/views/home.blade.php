@extends('master')
@section('content')


<main class="page-content">

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
      <div class="col">
        <div class="card radius-10">
          <div class="card-body">
              <div class="d-flex align-items-center">
                  <div>
                      <p class="mb-0 text-secondary">Tổng số đơn đặt hàng</p>
                      <h4 class="my-1">4805</h4>
                      <p class="mb-0 font-13 text-success"><i class="bi bi-caret-up-fill"></i> 5% Từ tuần trước</p>
                  </div>
                  <div class="widget-icon-large bg-gradient-purple text-white ms-auto"><i class="bi bi-basket2-fill"></i>
                  </div>
              </div>
          </div>
        </div>
       </div>
       <div class="col">
          <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Tổng doanh thu</p>
                        <h4 class="my-1">$24K</h4>
                        <p class="mb-0 font-13 text-success"><i class="bi bi-caret-up-fill"></i> 4.6 Từ tuần trước</p>
                    </div>
                    <div class="widget-icon-large bg-gradient-success text-white ms-auto"><i class="bi bi-currency-exchange"></i>
                    </div>
                </div>
            </div>
        </div>
       </div>
       <div class="col">
        <div class="card radius-10">
          <div class="card-body">
              <div class="d-flex align-items-center">
                  <div>
                      <p class="mb-0 text-secondary">Tổng số khách hàng</p>
                      <h4 class="my-1">5.8K</h4>
                      <p class="mb-0 font-13 text-danger"><i class="bi bi-caret-down-fill"></i> 2.7 Từ tuần trước
                      </p>
                  </div>
                  <div class="widget-icon-large bg-gradient-danger text-white ms-auto"><i class="bi bi-people-fill"></i>
                  </div>
              </div>
          </div>
       </div>
       </div>
       <div class="col">
        <div class="card radius-10">
          <div class="card-body">
              <div class="d-flex align-items-center">
                  <div>
                      <p class="mb-0 text-secondary">Tỷ lệ thoát</p>
                      <h4 class="my-1">38.15%</h4>
                      <p class="mb-0 font-13 text-success"><i class="bi bi-caret-up-fill"></i> 12.2% Từ tuần trước
                      </p>
                  </div>
                  <div class="widget-icon-large bg-gradient-info text-white ms-auto"><i class="bi bi-bar-chart-line-fill"></i>
                  </div>
              </div>
          </div>
        </div>
       </div>
    </div><!--end row-->


    <div class="row">
      <div class="col-12 col-lg-8 col-xl-8 d-flex">
        <div class="card radius-10 w-100">
          <div class="card-body">
             <div class="row row-cols-1 row-cols-lg-2 g-3 align-items-center">
                <div class="col">
                  <h5 class="mb-0">Số liệu bán hàng</h5>
                </div>
                <div class="col">
                  <div class="d-flex align-items-center justify-content-sm-end gap-3 cursor-pointer">
                     <div class="font-13"><i class="bi bi-circle-fill text-primary"></i><span class="ms-2">Việc bán hàng</span></div>
                     <div class="font-13"><i class="bi bi-circle-fill text-success"></i><span class="ms-2">Đơn đặt hàng</span></div>
                  </div>
                </div>
             </div>
             <div id="chart1"></div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4 col-xl-4 d-flex">
        <div class="card radius-10 w-100">
          <div class="card-header bg-transparent">
            <div class="row g-3 align-items-center">
              <div class="col">
                <h5 class="mb-0"> Số liệu thống kê</h5>
              </div>
              <div class="col">
                <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                  <div class="dropdown">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">  Hoạt động</a>
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Hành động khác</a>
                      </li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="javascript:;"> Một cái gì đó khác ở đây</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
             </div>
          </div>
          <div class="card-body">
            <div id="chart2"></div>
          </div>
          <ul class="list-group list-group-flush mb-0">
            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Đơn hàng mới<span class="badge bg-primary badge-pill">25%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Hoàn thành<span class="badge bg-orange badge-pill">65%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Chưa giải quyết<span class="badge bg-success badge-pill">10%</span>
            </li>
          </ul>
        </div>
      </div>
    </div><!--end row-->

    <div class="row">
       <div class="col-12 col-lg-6 col-xl-6 d-flex">
        <div class="card radius-10 w-100">
          <div class="card-header bg-transparent">
            <div class="row g-3 align-items-center">
              <div class="col">
                <h5 class="mb-0">  Số liệu thống kê</h5>
              </div>
              <div class="col">
                <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                  <div class="dropdown">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Hoạt động</a>
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Hành động khác</a>
                      </li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="javascript:;">Một cái gì đó khác ở đây</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
             </div>
          </div>
          <div class="card-body">
            <div class="d-lg-flex align-items-center justify-content-center gap-4">
              <div id="chart3"></div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="bi bi-circle-fill text-purple me-1"></i> Khách: <span class="me-1">89</span></li>
                <li class="list-group-item"><i class="bi bi-circle-fill text-info me-1"></i> Người đăng ký: <span class="me-1">45</span></li>
                <li class="list-group-item"><i class="bi bi-circle-fill text-pink me-1"></i> Người đóng góp: <span class="me-1">35</span></li>
                <li class="list-group-item"><i class="bi bi-circle-fill text-success me-1"></i>Tác giả: <span class="me-1">62</span></li>
              </ul>
            </div>
          </div>
        </div>
       </div>
       <div class="col-12 col-lg-6 col-xl-6 d-flex">
        <div class="card radius-10 w-100">
          <div class="card-body">
            <div class="row row-cols-1 row-cols-lg-2 g-3 align-items-center">
              <div class="col">
                <h5 class="mb-0">Hành động sản phẩm</h5>
              </div>
              <div class="col">
                <div class="d-flex align-items-center justify-content-sm-end gap-3 cursor-pointer">
                   <div class="font-13"><i class="bi bi-circle-fill text-primary"></i><span class="ms-2">Lượt xem</span></div>
                   <div class="font-13"><i class="bi bi-circle-fill text-pink"></i><span class="ms-2">Số lần click</span></div>
                </div>
              </div>
             </div>
              <div id="chart4"></div>
            </div>
          </div>
       </div>
    </div><!--end row-->
  </main>
  @endsection
