@extends('layouts.admin')
@section('title')
  <title>Danh sách slider</title>
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('admins/slider/index/index.css') }}">
@endsection

@section('js')
    <script src="{{ asset('/venders/sweetAlert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('/admins/slider/index/index.js') }}"></script>
@endsection

@section( 'content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  @include('partials.content-header', ['name'=>'Slider', 'key' =>'list'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12" align='right'>
            <a href="{{ route('slider.create') }}" class ='btn btn-success'><i class="fa fa-plus"></i> Thêm slider</a>
        </div>
        <br><br>
        <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover responsive  dataTable dtr-inline" role="grid" aria-describedby="example2_info">
            <thead>
             <th>STT</th>
             <th>Tên slider</th>
             <th>Mô tả</th>
             <th>Hình ảnh</th>
             <th>Thao tác</th>
            </thead>
            <tbody>
             @php
                 $i = 1;
             @endphp
            @foreach($sliders as $data)
            <tr role="row" class="odd">
              <td>{{$i++}}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->description }}</td>
              <td><img src="{{ $data->image_path }}"class="image_slider_150_100" alt=""></td>
              <td>
                  <a href="{{ route('slider.edit', ['id' => $data->id]) }}" class="btn btn-info"><i class="fa fa-pen"> </i> Sửa</a>
                  <a href="" data-url="{{ route('slider.delete', ['id' => $data->id]) }}" class="btn btn-danger action_delete"><i class="fa fa-trash"></i> Xóa</a>
              </td>


            </tr>
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>
          </table></div>
      </div>
      {{$sliders->links()}}
  </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
