@extends('layouts.admin')
@section('title')
<title>Thêm sản phẩm</title>
@endsection

@section('css')
<link href="{{asset('venders/select2/select2.min.css')}}" rel="stylesheet" />
<script src="{{asset('admins/product/add/add.css')}}"></script>

<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #0c0e0d !important;
    }
</style>
@endsection

@section( 'content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Sản phẩm', 'key' =>'thêm'])

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <form role="form" method ="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="Tên sản phẩm">
                  </div>

                 <div class="form-group">
                    <label for="">Giá sản phẩm</label>
                    <input type="text" class="form-control" name="price" id="" placeholder="Giá sản phẩm">
                 </div>

                 <div class="form-group">
                    <label for="">Chọn ảnh đại diện</label>
                    <input type="file" name="feature_image_path" class="form-control-file" id="" >
                 </div>

                 <div class="form-group">
                    <label for="">Chọn ảnh chi tiết</label>
                    <input type="file" multiple name="image_path[]" class="form-control-file" id="" >
                 </div>


                 <div class="form-group">
                    <label for="">Chọn tag</label>

                    <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">
                        <option style="background-color: rgb(29, 25, 25); color:white" selected="selected">orange</option>
                        <option>white</option>
                        {{-- <option selected="selected">purple</option> --}}
                      </select>
                 </div>

                  <div class="form-group">
                    <label>Chọn danh mục </label>
                    <select name ="category_id" class="form-control select_category" >
                        <option value=""> Danh mục</option>
                        {!! $htmlOption !!}
                    </select>
                  </div>

                  <div class="col-md-12">
                <div class="form-group">
                   <label for=""> Nội dung</label>
                   <textarea class="form-control my-editor" name="content" id="" rows="8"></textarea>
                 </div>

                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
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

@section('js')

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{{asset('venders/select2/select2.min.js')}}"></script>
<script src="{{asset('admins/product/add/add.js')}}"></script>
<script>
    $(function () {
    $(".tags_select_choose").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })

    $('.select_category').select2({
        placeholder: "Chọn danh mục",
        allowClear: true
    });

    let editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback: function (field_name, url, type, win) {
            let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            let y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            let cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
});

</script>
@endsection
