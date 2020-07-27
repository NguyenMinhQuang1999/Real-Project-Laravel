@extends('layouts.admin')
@section('title')
<title>Thêm setting</title>
@endsection

@section( 'content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Setting', 'key' =>'add'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <form role="form" method ="post" action="{{route('setting.store') .'?type=' .request()->type}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Config key</label>
                    <input type="text" name="config_key" class="form-control @error('config_key') is-invalid @enderror" >
                    @error('config_key')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  @if(request()->type ==='text')
                  <div class="form-group">
                    <label for="">Config value</label>
                    <input type="text" name="config_value" class="form-control @error('config_value') is-invalid @enderror">
                    @error('config_value')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  @else
                    <div class="form-group">
                    <label for="">Config value</label>
                   <textarea name="config_value" class="form-control @error('config_value') is-invalid @enderror" rows="5"></textarea>
                   @error('config_value')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  @endif

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
