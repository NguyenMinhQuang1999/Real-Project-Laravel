@extends('layouts.admin')
@section('title')
  <title>Danh sách nhân viên</title>
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

  @include('partials.content-header', ['name'=>'User', 'key' =>'list'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12" align='right'>
            <a href="{{ route('user.create') }}" class ='btn btn-success'><i class="fa fa-plus"></i> Thêm nhân viên</a>
        </div>
        <br><br>
        <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover responsive  dataTable dtr-inline" role="grid" aria-describedby="example2_info">
            <thead>
             <th>STT</th>
             <th>Tên nhân viên</th>
             <th>Email</th>
             <th>Thao tác</th>
            </thead>
            <tbody>
             @php
                 $i = 1;
             @endphp
            @foreach($users as $data)
            <tr role="row" class="odd">
              <td>{{$i++}}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->email }}</td>

              <td>
                  <a href="{{ route('user.edit', ['id' => $data->id]) }}" class="btn btn-info"><i class="fa fa-pen"> </i> Sửa</a>
                  <a href="" data-url="{{ route('user.delete', ['id' => $data->id]) }}" class="btn btn-danger action_delete"><i class="fa fa-trash"></i> Xóa</a>
              </td>


            </tr>
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>
          </table></div>
      </div>
      {{$users->links()}}
  </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
