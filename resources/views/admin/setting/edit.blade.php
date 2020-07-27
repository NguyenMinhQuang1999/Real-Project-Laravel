@extends('layouts.admin')
@section('title')
<title>Sửa setting</title>
@endsection

@section( 'content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Setting', 'key' =>'edit'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <form role="form" method ="post" action="{{route('setting.update', ['id' => $setting->id])}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Config key</label>
                    <input type="text" value="{{$setting->config_key}}" name="config_key" class="form-control @error('config_key') is-invalid @enderror" >
                    @error('config_key')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  @if(request()->type ==='text')
                  <div class="form-group">
                    <label for="">Config value</label>
                    <input type="text" value="{{ $setting->config_value }}" name="config_value" class="form-control @error('config_value') is-invalid @enderror">
                    @error('config_value')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  @else
                    <div class="form-group">
                    <label for="">Config value</label>
                   <textarea name="config_value" class="form-control @error('config_value') is-invalid @enderror" rows="5">{{ $setting->config_value }}</textarea>
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
