<style type="text/css">
  .user-panel img {
    height: 50px;
    width: 50px;
}
</style>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset($user->url_avatar) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ $user->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{ route('admin') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản Lý Chung
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>
                Đơn Hàng 
                @if(count($neworder) > 0)
                    <span class="badge badge-pill badge-danger">{{ count($neworder)}}</span>
                @endif
              </p>
                <i class="right fas fa-angle-left"></i>
             
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('order.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Tất Cả Đơn Hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('order.unpaid')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Đơn Hàng Chưa Thanh Toán</p>
                </a>
              </li>
            </ul>
          </li>
           @can('isAdmin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-pen-square"></i>
              <p>
                Sản Phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Tất Cả Sản Phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Nhóm Sản Phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Tài Khoản
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               @can('isAdmin')
                <li class="nav-item">
                  <a href="{{ route('show_employee') }}" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Nhân Viên</p>
                  </a>
                </li>
              @endcan
                <li class="nav-item">
                  <a href="{{ route('show_customer') }}" class="nav-link">
                    <i class="far fa-circle nav-icon text-warning"></i>
                    <p>Khách Hàng</p>
                  </a>
                </li>
            </ul>
          </li>
           @can('isAdmin')
           <li class="nav-item">
            <a href="{{ route('coupon.index') }}" class="nav-link">
              <i class="nav-icon fas fa-percentage"></i>
              <p>
                Khuyến Mãi
              </p>
            </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('blog.index') }}" class="nav-link">
                  <i class="nav-icon far fa-newspaper"></i>
                  <p>
                    Blog
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('shipping.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>
                   Phí Vận Chuyển
                  </p>
                </a>
            </li>
            @endcan
            <li class="nav-item">
            <a href="{{ route('contact.index') }}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
                <p>
                  Phản Hồi
                  @if( count($contact) > 0)
                    <span class="badge badge-pill badge-danger">
                        {{ count($contact) }}
                    </span>
                  @endif
               </p>
            </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>