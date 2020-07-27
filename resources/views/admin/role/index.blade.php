@extends('layouts.admin')
@section('title')
  <title>Danh sách vai trò</title>
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('admins/user/index/index.css') }}">
@endsection

@section('js')
    <script src="{{ asset('/venders/sweetAlert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('/admins/user/index/index.js') }}"></script>
    <script src="{{ asset('admins/js/main.js') }}"></script>
@endsection

@section( 'content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  @include('partials.content-header', ['name'=>'Role', 'key' =>'list'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12" align='right'>
            <a href="{{ route('role.create') }}" class ='btn btn-success'><i class="fa fa-plus"></i> Thêm vai trò</a>
        </div>
        <br><br>
        <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover responsive  dataTable dtr-inline" role="grid" aria-describedby="example2_info">
            <thead>
             <th>STT</th>
             <th>Tên vai trò</th>
             <th>Mô tả</th>
             <th>Thao tác</th>
            </thead>
            <tbody>
             @php
                 $i = 1;
             @endphp
            @foreach($roles as $data)
            <tr role="row" class="odd">
              <td>{{$i++}}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->display_name }}</td>

              <td>
                  <a href="" class="btn btn-info"><i class="fa fa-pen"> </i> Sửa</a>
                  <a href="" data-url="" class="btn btn-danger action_delete"><i class="fa fa-trash"></i> Xóa</a>
              </td>


            </tr>
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>
          </table></div>
      </div>
      {{$roles->links()}}
  </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
