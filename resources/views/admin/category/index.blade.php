@extends('layouts.admin')
@section('title')
  <title>Danh sách danh mục</title>
@endsection

@section( 'content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  @include('partials.content-header', ['name'=>'Category', 'key' =>'list'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12" align='right'>
            <a href="{{ route('categories.create') }}" class ='btn btn-success'> Thêm danh mục</a>
        </div>
        <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover responsive  dataTable dtr-inline" role="grid" aria-describedby="example2_info">
            <thead>
             <th>STT</th>
             <th>Tên danh mục</th>
             <th>Thao tác</th>
            </thead>
            <tbody>
             @php
                 $i = 1;
             @endphp
            @foreach($category as $data)
            <tr role="row" class="odd">
              <td>{{$i++}}</td>
              <td>{{$data->name}}</td>
              <td>
                  <a href="{{route('categories.edit' , ['id' => $data->id])}}" class="btn btn-info">Sửa</a>
                  <a href="{{route('categories.delete', ['id' => $data->id])}}" class="btn btn-danger ">Xóa</a>
              </td>

            </tr>
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>
          </table></div>
      </div>
      {{$category->links()}}
  </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
