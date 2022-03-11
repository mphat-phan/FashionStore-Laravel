@extends('admin.layout2')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            @foreach($products as $product)
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                    <!-- MAP & BOX PANE -->
                    <div class="card">
                        <div class="card-header">
                            <h2>{{$product->name}}</h2>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="d-md-flex">
                                <div class="p-1 flex-fill" style="overflow: hidden">
                                    <!-- Map will be created here -->
                                    <div id="world-map-markers"
                                        style="height: 325px; overflow: scroll; display:flex;background-color:beige;">
                                        <div class="col-5">
                                            <div class="row">
                                                <img style="object-fit: cover; overflow: hidden;max-width:400px;"
                                                    src="{{asset('images')}}/{{$product->image}}" alt="">
                                            </div>

                                        </div>
                                        <div class="col-7">
                                            <div class="row">
                                                @foreach($subImage as $row)
                                                <div class="col-6" style="margin:0 auto;">
                                                    <img style="max-width:200px;"
                                                        src="{{asset('images')}}/{{$row->link}}" alt="">
                                                </div>
                                                
                                                @endforeach
                                            </div>


                                        </div>


                                    </div>
                                </div>
                            </div><!-- /.d-md-flex -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- TABLE: LATEST ORDERS -->
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Products Detail</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Quantity</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($productDetail as $row)
                                        <?php
                                            $myJSON = json_encode($row);
                                        ?>
                                        <tr>
                                            <td>{{$row->color->name}}</td>
                                            <td>{{$row->size->name}}</td>
                                            <td>{{$row->quantity}}</td>
                                            <td>
                                                {{-- <a onclick="openModal({{$myJSON}})" href="#" class="btn btn-warning
                                                btn-sm" role="button" data-toggle="modal"
                                                data-target="#UpdateProductDetailModal">Update</a> --}}
                                                <a onclick="openModal({{$myJSON}})" href="#"
                                                    class="btn btn-danger btn-sm" role="button" data-toggle="modal"
                                                    data-target="#DeleteModal">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left" data-toggle="modal"
                                data-target="#AddModal">Add</a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Delete all</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-info">

                        <div class="info-box-content">
                            <span class="info-box-text">Category</span>
                            <span class="info-box-number">{{$product->category->name}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-info">

                        <div class="info-box-content">
                            <span class="info-box-text">Brand</span>
                            <span class="info-box-number">{{$product->brand->name}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-info">

                        <div class="info-box-content">
                            <span class="info-box-text">Price</span>
                            <span class="info-box-number">{{$product->price}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-info">

                        <div class="info-box-content">
                            <span class="info-box-text">Sold</span>
                            <span class="info-box-number">{{$product->sold}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-info">

                        <div class="info-box-content">
                            <span class="info-box-text">Views</span>
                            <span class="info-box-number">{{$product->views}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-info">

                        <div class="info-box-content">
                            <span class="info-box-text">Quantity</span>
                            <span class="info-box-number">{{$product->quantity}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <!-- /.info-box -->
                    <div class="info-box mb-3 
                        <?php 
                        if($product->status==1){
                            echo 'bg-success';
                        }else {
                            echo 'bg-danger';
                        }
                        ?>
                    ">

                        <div class="info-box-content">
                            <span class="info-box-text">Status</span>
                            <span class="info-box-number"><?php 
                                if($product->status==1){
                                    echo 'On';
                                }else {
                                    echo 'Off';
                                }
                                ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->

                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            @endforeach
        </div>
        <!--/. container-fluid -->
    </section>
</div>
<div class="modal" id="UpdateProductDetailModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="formUpdate" action="" method="POST">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <!--Phải thêm-->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="sel1">Color</label>
                            <select class="form-control" id="ColorOption" name="ColorOption">
                                @foreach($color as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Size</label>
                            <select class="form-control" id="SizeOption" name="SizeOption">
                                @foreach($size as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image</label>
                            <input name="txtImage[]" type="file" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter price" multiple required>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="modal" id="DeleteModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Delete!!!</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="formDelete" action="" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <!--Phải thêm-->
                    <div class="card-body">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="modal" id="AddModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @foreach($products as $product)
                <form action="admin/form/product/detail/add/{{$product->id}}" method="POST"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <!--Phải thêm-->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="sel1">Color</label>
                            <select class="form-control" id="sel1" name="ColorOption">
                                @foreach($color as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Size</label>
                            <select class="form-control" id="sel1" name="SizeOption">
                                @foreach($size as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image</label>
                            <input name="txtImage[]" type="file" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter price" multiple required>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>

        </div>
    </div>
</div>
<script>
    function openModal(e) {
        $txtColor = document.querySelector("#ColorOption");
        $txtSize = document.querySelector("#SizeOption");

        $formDelete = document.querySelector("#formDelete");
        $formUpdate = document.querySelector("#formUpdate");

        $formDelete.action = "admin/form/product/detail/delete/" + e.id;
        $formUpdate.action = "admin/form/product/detail/update/" + e.id;

        $txtSize.value = e.sizeID;
        $txtColor.value = e.colorID;
    }

</script>
@endsection
