@extends('admin/master')
@section('title',"Thêm mới sản phẩm")


@section('main')

<div class="box-body">
    <form action="{{ route('product.store') }}" method="POST" role="form" enctype= "multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="">Tên Sản Phẩm</label>
                    <input type="text" class="form-control" name="name" id="name" >
                    @if($errors->has('name'))
                             {{ $errors->first('name') }}
                     @endif
                </div>
                <div class="form-group">
                    <label for="">Đường dẫn</label>
                    <input type="text" class="form-control" name="slug" id="slug">
                    @if($errors->has('slug'))
                    {{ $errors->first('slug') }}
                @endif
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label>
                        <textarea name="content" id="content" class="form-control" ></textarea>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Danh mục sản phẩm</label>
                    <select name="category_id" class="form-control">
                        <option value="">Chọn một</option>
                        @foreach ($cats as $cat)
                        <option value="{{ $cat -> id }}">{{ $cat->name }}</option>

                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="">Giá sản phẩm</label>
                    <input type="text" class="form-control" name="price" >
                    @if($errors->has('price'))
                    {{ $errors->first('price') }}
            @endif
                </div>
                <div class="form-group">
                    <label for="">Giá khuyến mãi</label>
                    <input type="text" class="form-control" name="sale_price" >
                    @if($errors->has('sale_price'))
                    {{ $errors->first('sale_price') }}
            @endif
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="radio">
                        <label for="">
                            <input type="radio" name="status"  value="1" checked>
                            Hiển thị
                        </label>
                    </div>
                    <div class="radio">
                        <label for="">
                            <input type="radio" name="status"  value="0" >
                            Ẩn
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    {{-- <input type="file" class="form-control" name="image" required> --}}
                    <input type="file" name="image" required="true">
                </div>
                {{-- <section class="body">
                    <div class="inner-wrapper">
                        <section role="main" class="content-body" style="padding: 20px;">
                            <div class="images_layout">
                                <div class="images_chk">
                                    <div class="images_chk_list">
                                    </div>
                                </div>
                                <div class="images_dropbox" id="dragAndDropFiles">
                                    Drag and Drop Images Here
                                </div>
                            </div>
                        </section>
                    </div>
                </section> --}}


                <!-- Modal -->
                {{-- <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content modal-dialog-center">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form name="formImageUpload" id="formImageUpload" enctype="multipart/form-data">
                                <div class="modal-body ">
                                    <div class="modal_body_inner" style="text-align: center">
                                        Are you sure you want to submit this form?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="spinner" id="img_spin"></div>
                                    <div>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" id="submitHandler">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
                </div>

                <button type="submit"class="btn btn-primary">Submit</button>
            </div>

        </div>
    </form>
</div>


@stop


@section('js')
<script src="{{ url('admin/slug.js') }}"></script>
<script src="{{ url('admin/ tinymce/tinymce.min.js') }}"></script>
<script src="{{ url('admin/ tinymce/config.js') }}"></script>


@stop
