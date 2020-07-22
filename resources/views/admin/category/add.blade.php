@extends('layouts.admin')
@section('title')
<title>Thêm sản phẩm</title>
@endsection

@section( 'content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Category', 'key' =>'add'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <form role="form" method ="post" action="{{route('categories.store')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Tên danh mục</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Chọn danh mục cha</label>
                    <select name ="parent_id"class="form-control">
                        <option value="0"> Danh mục cha</option>
                        {!! $htmlOption !!}



                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
