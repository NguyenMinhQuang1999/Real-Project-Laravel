@extends('layouts.admin')
@section('title')
  <title>Danh sách sản phẩm</title>
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('/admins/product/index/list.css') }}">
@endsection

@section('js')
    <script src="{{ asset('/venders/sweetAlert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('/admins/product/index/list.js') }}"></script>

@endsection


@section( 'content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  @include('partials.content-header', ['name'=>'Sản phẩm', 'key' =>'Danh sách'])
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12" align='right'>
            <a href="{{ route('product.create') }}" class ='btn btn-success'> Thêm sản phẩm</a>

        </div>
            <br><br>
        <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover responsive  dataTable dtr-inline" role="grid" aria-describedby="example2_info">
            <thead>
             <th>STT</th>
             <th>Tên sản phẩm</th>
             <th>Giá</th>
             <th>Hình ảnh</th>
             <th>Nội dung</th>
             <th>Danh mục</th>
             <th>Thao tác </th>

            </thead>
            <tbody>
             @php
                 $i = 1;
             @endphp
            @foreach($products as $data)
            <tr role="row" class="odd">
              <td>{{$i++}}</td>
              <td>{{$data->name}}</td>
              <td>{{ number_format($data->price)}}</td>
              <td> <img style="width: 150px; height: 100px" class="product_image_150_100" src="{{$data->feature_image_path}}"></td>
              <td>{{$data->content}}</td>
              <td>{{optional($data->category)->name}}</td>

              <td>
                  <a href="{{route('product.edit' , ['id' => $data->id])}}" class="btn btn-info"><i class="fa fa-pen"></i> Sửa</a>
                  <a data-url="{{ route('product.delete', ['id' => $data->id]) }}" class="btn btn-danger action_delete"><i class="fa fa-trash"> </i> Xóa</a>
              </td>

            </tr>
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>
          </table></div>
      </div>
      {{$products->links()}}
  </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
