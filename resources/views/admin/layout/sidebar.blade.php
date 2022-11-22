
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      <div>
        <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
      </div>
      <div>
        <h4 class="logo-text">Jordan Shop</h4>
      </div>
      <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
      </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
      <li>
        <li class="parent-icon" > <a href="{{ Route('dasboar') }}"><i class="bi bi-house-door"></i>Trang chủ</a></li>

      </li>
      <li>
        <a href="javascript:;" class="has-arrow">
          <div class="parent-icon"><i class="bi bi-grid"></i>
          </div>
          <div class="menu-title">Thể loại</div>
        </a>
        <ul>
          <li> <a href="{{ Route('category.create') }}"><i class="bi bi-arrow-right-short"></i>Thêm thể loại</a>
          </li>
          <li> <a href="{{Route('category.index')}}"><i class="bi bi-arrow-right-short"></i>Thể loại</a>
          </li>

        </ul>
      </li>
      <li>
        <a href="javascript:;" class="has-arrow">
          <div class="parent-icon"><i class="bi bi-award"></i>
          </div>
          <div class="menu-title">Sản Phẩm</div>
        </a>
        <ul>
          <li> <a href="{{ Route('product.create') }}"><i class="bi bi-arrow-right-short"></i>Thêm Sản phẩm</a>
          </li>
          <li> <a href="{{Route('product.index')}}"><i class="bi bi-arrow-right-short"></i>Sản phẩm</a>
          </li>
        </ul>
      </li>

    </ul>
 </aside>
