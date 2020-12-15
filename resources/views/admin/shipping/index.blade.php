@EXTENDS('admin.layouts.master')
@section('content')
<style type="text/css">
    .projects .table-avatar img, .projects img.table-avatar {
    border-radius: 2%;
    width: 5rem;
}
</style>
 <script>
  function addshipping() {
    window.location.replace("{{route('shipping.new')}}");
  }
</script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if (Session::has('flash_message'))
      <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Sản Phẩm / Nhóm Sản Phẩm
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn btn-primary" onclick="addshipping()">Tạo nhóm sản phẩm</button>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
              </div>
            <div class="card-body">
                  <div class="tab-content" id="custom-tabs-four-tabContent">
                      <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <div class="card-body p-0">
                              <table class="table table-striped projects">
                        <thead>
                              <tr>
                                  <th style="width: 20%">
                                      ID
                                  </th>
                                  <th style="width: 30%">
                                      Địa Chỉ Vận Chuyển
                                  <th style="width: 30%">
                                      Phí Vận Chuyển
                                  </th>
                                  <th style="width: 10%">
                                    Tình Trạng
                                  </th>
                                  <th style="width: 10%" class="text-center">
                                     Người Tạo
                                  </th>
                              </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $shipping)
                              <tr>
                                  <td>
                                    {{ $shipping->id }}
                                  </td>
                                  <td>
                                    <a href="{{ 
                                      route('shipping.edit',['id'=>$shipping->id]) 
                                  }}">
                                      {{ $shipping->district_name }}
                                    </a>
                                  </td>
                                  <td>
                                    {{ $shipping->money}}
                                  </td>
                                  <td>

                                  </td>
                                  <td class="project_progress" style="text-align: center;">
                                    admin   
                                  </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div><!-- /.card-body -->
                </div>
              </div>
               </div>
              <!-- /.card -->
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection