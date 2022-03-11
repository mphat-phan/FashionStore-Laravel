@extends('admin.layout2')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content-wrapper">
    <section class="content">
        @foreach($product as $product)
        <form id="formUpdate" action="admin/form/product/update/{{$product->id}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Phải thêm-->
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input value="{{$product->name}}" name="txtName" type="text" class="form-control" id="txtName" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Summary</label>
                    <textarea name="txtSummary" class="form-control" id="txtSummary">
                        {{$product->summary}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Detail</label>
                    <textarea name="txtDetail" id="summernote2" class="txtDetail">
                        {{$product->detail}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Price</label>
                    <input value="{{$product->price}}" name="txtPrice" type="number" class="form-control" id="txtPrice" placeholder="Enter price" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input value="{{$product->image}}" name="txtImage" type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter price">
                </div>
                <img 
                    style="max-width:200px!important" 
                    src="{{asset('images')}}/{{$product->image}}"
                    class="rounded" alt="..."
                    id="imageDisplay"
                >
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Sub Image</label>
                    <input name="txtSubImage[]" type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter price" multiple>
                </div>
                <div class="row">
                    @foreach($subImage as $row)
                    <div class="col-3">
                        <div class="img-wrap" style="position: relative;max-width:200px!important">
                            <span value={{$row->id}} class="deleteSubImage" class="close" style="position: absolute;top:2px;right:2px;z-index: 100;">&times;</span>
                            <img src="{{asset('images')}}/{{$row->link}}" style="max-width:200px!important">
                        </div>
                    </div>
                    @endforeach
                </div>
                
                
                <div class="form-group">
                    <label for="sel1">Brand</label>
                    <select class="form-control" id="sel1" name="BrandOption">
                        @foreach($brand as $row)
                        @if($product->brandID == $row->id)
                            {{"selected"}}
                        @endif
                        <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sel1">Category</label>
                    <select class="form-control" id="sel2" id="CategoryOption" name="CategoryOption">
                        @foreach($category as $row)
                        <option  
                        @if($product->categoryID == $row->id)
                            {{"selected"}}
                        @endif
                        value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sel1">Status</label>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="chkStatus" name="chkStatus" value="1"
                        <?php 
                            if($product->status==1){
                                echo 'checked';

                            }else{
                                echo '';
                            }
                        ?>
                        >
                        <label class="custom-control-label" for="chkStatus">Cho phép công khai sản phẩm</label>
                      </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        @endforeach
    </section>
</div>
<script src="{{asset('public/assetAdmin/plugins/jquery/jquery.min.js')}}"></script>
<script>
    $(function () {
        $('#summernote2').summernote()
    });
</script>
@endsection