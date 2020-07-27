@extends('layouts.admin')
@section('title')
<title>Thêm nhân viên </title>
@endsection

@section( 'content')

@section('css')

<link href="{{asset('admins/user/add/add.css')}}" rel="stylesheet" />
<link href="{{asset('venders/select2/select2.min.css')}}" rel="stylesheet" />
@endsection

@section('js')
<script src="{{asset('venders/select2/select2.min.js')}}"></script>
<script src="{{asset('admins/user/add/add.js') }}"></script>
@endsection
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Nhân viên', 'key' =>'thêm'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <form role="form" method ="post" enctype="multipart/form-data" action="{{ route('user.store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Tên nhân viên</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Tên nhân viên">
                    @error('name')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="text"  name="email" placeholder="Nhập email" class="form-control @error('email') is-invalid @enderror" value="{{ old('description') }}">
                    @error('email')
                        <span class="text text-danger"> {{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="password" value="{{old('password')}}" placeholder="Nhập mật khẩu" class="form-control">
                    @error('password')
                        <span class="text text-danger"> {{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label  for="">Chọn vai trò</label>
                   <select  class="form-control select_role" name="role_id[]" id="" multiple class="">
                       <option value=""></option>
                       @foreach($role as $key => $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                       @endforeach

                   </select>
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
