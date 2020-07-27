@extends('layouts.admin')
@section('title')
<title>Thêm slider </title>
@endsection

@section( 'content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Slider', 'key' =>'add'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <form role="form" method ="post" enctype="multipart/form-data" action="{{ route('slider.store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Tên slider</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Tên slider">
                    @error('name')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea  name="description" rows="5" class="form-control @error('description') is-invalid @enderror" >{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text text-danger"> {{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Hình ảnh</label>
                    <input type="file" name="image_path" value="{{old('image_path')}}" class="form-control-file">
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
