@extends('layouts.admin')
@section('title')
  <title>Danh sách setting</title>
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('admins/slider/index/index.css') }}">
@endsection

@section('js')
    <script src="{{ asset('/venders/sweetAlert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('admins/js/main.js') }}"></script>
@endsection

@section( 'content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  @include('partials.content-header', ['name'=>'Setting', 'key' =>'list'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12" align='right' >
            <!-- Example single danger button -->
        <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Thêm setting
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('setting.create'). '?type=text' }}">Input</a>
            <a class="dropdown-item" href="{{ route('setting.create'). '?type=textarea' }}">Textarea</a>
        </div>
        </div>

        </div>
        <br><br>
        <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover responsive  dataTable dtr-inline" role="grid" aria-describedby="example2_info">
            <thead>
             <th>STT</th>
             <th>Config key</th>
             <th>Config value</th>
             <th>Thao tác</th>
            </thead>
            <tbody>
             @php
                 $i = 1;
             @endphp
            @foreach($settings as $data)
            <tr role="row" class="odd">
              <td>{{$i++}}</td>
              <td>{{ $data->config_key }}</td>
              <td>{{ $data->config_value}}</td>
              <td>
                  <a href="{{ route('setting.edit', ['id' => $data->id]). '?type=' ."$data->type" }}" class="btn btn-info"><i class="fa fa-pen"> </i> Sửa</a>
                  <a href="" data-url="{{ route('setting.delete', ['id' => $data->id]) }}" class="btn btn-danger action_delete"><i class="fa fa-trash"></i> Xóa</a>
              </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            </tfoot>
          </table></div>
      </div>
      {{$settings->links()}}
  </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
