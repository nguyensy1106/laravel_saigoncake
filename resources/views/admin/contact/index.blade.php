@EXTENDS('admin.layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Phản Hồi
            </h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
        <div class="row mb2">
          <div class="col-sm-12">
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
                    @if( count($data) > 0 )
                      <div class="card-body p-0">
                          <table class="table table-striped projects">
                              <thead>
                                  <tr>
                                      <th width="20%">
                                          Email
                                      </th>

                                      <th  width="20%">
                                         Họ Tên
                                      </th>
                                      <th  width="20%">
                                         Ngày Gửi
                                      </th>
                                      <th  width="20%">
                                         Subject
                                      </th>
                                      <th  width="10%">
                                         Tình Trạng
                                      </th>
                                      <th width="10%">
                                        Chi Tiết
                                      </th>

                                  </tr>
                              </thead>
                              <tbody>
                                <!-- foreach -->
                                @foreach($data as $contact)
                                  <tr>
                                      <td>
                                          {{ $contact->email }}
                                      </td>
                                      <td>
                                         {{ $contact->name }}
                                      </td>
                                      <td class="project_progress">
                                           {{ $contact->created_at }}
                                      </td>
                                      <td>
                                         {{ $contact->subject }}
                                      </td>
                                      <td>
                                          <span class="badge badge-danger">Chưa Phản Hồi</span>
                                      </td>
                                      <td>
                                        <a href="{{ route('contact.edit', ['id' => $contact->id]) }}"><button class="btn btn-primary" type="submit"><i class="fas fa-eye bg-primary"></i> Xem</button></a>
                                      </td>
                                  </tr>
                                @endforeach
                                <!-- endforeach -->
                                
                                 <!--  <tr>
                                    <div class=" text-center">
                                        <i class="far fa-envelope" style="font-size :100px"></i> 
                                        <h2 class="note-title-empty mt-4">Không tìm thấy bất kỳ phản hồi nào</h2>
                                    </div>
                                  </tr> -->
                              </tbody>
                           </table>
                     </div>
                    @else
                      <h1 style="text-align: center;">Hiện Tại Không Có Phản Hồi Nào</h1>
                    @endif
                  </div> 
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection