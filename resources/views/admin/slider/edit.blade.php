@extends('layouts.admin')
@section('title')
<title>Sửa slider </title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admins/slider/add/add.css') }}">
@endsection

@section( 'content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Slider', 'key' =>'edit'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <form role="form" method ="post" enctype="multipart/form-data" action="{{ route('slider.update', ['id' => $slider->id]) }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Tên slider</label>
                    <input type="text" name="name" value="{{ $slider->name }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Tên slider">
                    @error('name')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea  name="description" rows="5" class="form-control @error('description') is-invalid @enderror" >{{ $slider->description }}</textarea>
                    @error('description')
                        <span class="text text-danger"> {{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Hình ảnh</label>
                    <input type="file" name="image_path" value="{{old('image_path')}}" class="form-control-file">
                    <div class="col-md-4">
                    <div class="row">
                        <img src="{{ $slider->image_path }}"class="image_slider"  alt="">
                    </div>

                    </div>
                    @error('image_path')
                        <span class="text text-danger"> {{ $message }}</span>
                    @enderror
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                </div>
              </form>

        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

</div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
