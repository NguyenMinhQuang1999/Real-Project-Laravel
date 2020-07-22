@extends('layouts.admin')
@section('title')
<title>Thêm menu </title>
@endsection

@section( 'content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Menu', 'key' =>'add'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <form role="form" method ="post" action="{{route('menus.store')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Tên menu</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Chọn menu cha</label>
                    <select name ="parent_id"class="form-control">
                        <option value="0"> Menu cha</option>
                        {!! $test !!}



                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Lưu</button>
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
