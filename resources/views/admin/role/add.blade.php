@extends('layouts.admin')
@section('title')
<title>Thêm vai trò </title>
@endsection

@section( 'content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Vai trò', 'key' =>'thêm'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <form role="form" method ="post" enctype="multipart/form-data" action="" style="width:100%">
        <div class="col-md-8">
          <div class="card">

                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Tên vai trò</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Tên vai trò">
                    @error('name')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Mô tả vai trò</label>
                    <textarea  name="display_name" rows="5" class="form-control @error('display_name') is-invalid @enderror" >{{ old('display_name') }}</textarea>
                    @error('description')
                        <span class="text text-danger"> {{ $message }}</span>
                    @enderror
                  </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                </div>


        </div>

      </div>
      <div class="col-md-12">
        <div class="row">
         <div class="card bg-light mb-3 col-md-12" >
            <div class="card-header bg-info text-ưhite">
                <label for="">
                    <input type="checkbox" value="">
                </label>
                Module sản phẩm
            </div>
            <div class="row">
            @for($i = 1; $i <= 4; $i++)
             <div class="card-body col-md-3">
                <label for="">
                    <input type="checkbox" value="">
                </label>
                Thêm sản phẩm
            </div>
            @endfor
            </div>

        </div>
      </div>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
      </div>





      </form>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

</div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
