@extends('layouts.admin')
@section('title')
  <title>Danh sách menu</title>
@endsection

@section( 'content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  @include('partials.content-header', ['name'=>'Menu', 'key' =>'list'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12" align='right'>
            <a href="{{ route('menus.create') }}" class ='btn btn-success'> Thêm menu</a>
        </div>
        <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover responsive  dataTable dtr-inline" role="grid" aria-describedby="example2_info">
            <thead>
             <th>STT</th>
             <th>Tên menu</th>
             <th>Thao tác</th>
            </thead>
            <tbody>
             @php
                 $i = 1;
             @endphp
            @foreach($menus as $data)
            <tr role="row" class="odd">
              <td>{{$i++}}</td>
              <td>{{$data->name}}</td>
              <td>
                  <a href="{{route('menus.edit' , ['id' => $data->id])}}" class="btn btn-info">Sửa</a>
                  <a onclick="confirm('Bạn có chắc muốn xóa không!')" href="{{route('menus.delete', ['id' => $data->id])}}" class="btn btn-danger ">Xóa</a>
              </td>

            </tr>
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>
          </table></div>
      </div>
      {{$menus->links()}}
  </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
