@extends('admin.layout2')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product Table</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="modal"
                                data-target="#AddModal">Add</a>
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 580px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr class="text-center align-middle">
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Sold</th>
                                    <th>Product Views</th>
                                    <th>Product Image</th>
                                    <th>Product Quantity</th>
                                    <th>Product Category</th>
                                    <th>Product Brand</th>
                                    <th>Product Status</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $row)
                                <?php
                                    $myJSON = json_encode($row);
                                ?>
                                <script>
                                    var jsonData = JSON.parse('<?= $myJSON; ?>');
                                    
                                </script>
                                <tr class="align-middle">
                                    <td class="text-center align-middle">
                                        <a href="admin/form/product/detail/{{$row->id}}" class="link-primary">{{$row->name}}</a>
                                    </td>
                                    <td class="text-center align-middle">{{$row->price}}</td>
                                    <td class="text-center align-middle">{{$row->sold}}</td>
                                    <td class="text-center align-middle">{{$row->views}}</td>
                                    <td class="text-center align-middle">
                                        <?php
                                            if(!isset($row->image)){
                                                $row->image = 'Logo.png';
                                            }    
                                        ?>
                                        <img 
                                            style="max-width:100px!important" 
                                            src="{{asset('images')}}/{{$row->image}}" 
                                            class="rounded" alt="..."
                                        >
                                    </td>
                                    <td class="text-center align-middle">{{$row->quantity}}</td>
                                    <td class="text-center align-middle"><?php
                                        if(isset($row->category->name)){
                                            echo $row->category->name;
                                        }
                                        else{
                                            echo 'Null';
                                        }
                                    ?></td>
                                    <td class="text-center align-middle"><?php
                                        if(isset($row->brand->name)){
                                            echo $row->brand->name;
                                        }
                                        else{
                                            echo 'Null';
                                        }
                                    ?></td>
                                    <td class="text-center align-middle">
                                        <div class='form-group'> 
                                            <div class='form-check'> 
                                                <form action="" method="post">
                                                    <input type='checkbox' class='form-check-input' data_id='' value="" 
                                                        <?php 
                                                            if($row->status==1){
                                                                echo 'checked';

                                                            }else{
                                                                echo '';
                                                            }
                                                        ?>
                                                    >
                                                </form>
                                                    
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <a onclick="" href="admin/form/product/update/{{$row->id}}" class="btn btn-warning btn-sm" role="button">Update</a>
                                        <a onclick="openModal({{$myJSON}})" href="#" class="btn btn-danger btn-sm" role="button" data-toggle="modal"
                                            data-target="#DeleteModal">Delete</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>


    </section>
</div>
<div class="modal" id="UpdateCategoryModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="formUpdate" action="" method="POST">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Phải thêm-->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input name="txtName" type="text" class="form-control" id="txtName" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Summary</label>
                            <textarea name="txtSummary" class="form-control" id="txtSummary" placeholder="Enter name">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Detail</label>
                            <textarea name="txtDetail" id="summernote2" class="txtDetail">
                                
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Price</label>
                            <input name="txtPrice" type="number" class="form-control" id="txtPrice" placeholder="Enter price" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image</label>
                            <input name="txtImage" type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter price">
                        </div>
                        <img 
                            style="max-width:200px!important" 
                            src="{{asset('images')}}/"
                            class="rounded" alt="..."
                            id="imageDisplay"
                        >
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Sub Image</label>
                            <input name="txtSubImage[]" type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter price" multiple>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="img-wrap" style="position: relative;max-width:200px!important">
                                    <span class="close" style="position: absolute;top:2px;right:2px;z-index: 100;">&times;</span>
                                    <img src="{{asset('images')}}/Logo.png" style="max-width:200px!important">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="img-wrap" style="position: relative;max-width:200px!important">
                                    <span class="close" style="position: absolute;top:2px;right:2px;z-index: 100;">&times;</span>
                                    <img src="{{asset('images')}}/Logo.png" style="max-width:200px!important">
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="sel1">Brand</label>
                            <select class="form-control" id="sel1" name="BrandOption">
                                @foreach($brand as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Category</label>
                            <select class="form-control" id="sel2" id="CategoryOption" name="CategoryOption">
                                @foreach($category as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Status</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="chkStatus" name="chkStatus" value="1">
                                <label class="custom-control-label" for="chkStatus">Cho phép công khai sản phẩm</label>
                              </div>
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
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Phải thêm-->
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
                <form action="admin/form/product/add" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Phải thêm-->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input name="txtName" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Summary</label>
                            <textarea name="txtSummary" class="form-control">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Detail</label>
                            <textarea name="txtDetail" id="summernote">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Price</label>
                            <input name="txtPrice" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter price" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image</label>
                            <input name="txtImage" type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter price" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Sub Image</label>
                            <input name="txtSubImage[]" type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter price" multiple>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Brand</label>
                            <select class="form-control" id="sel1" name="BrandOption">
                                @foreach($brand as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sel1">Category</label>
                            <select class="form-control" id="sel1" name="CategoryOption">
                                @foreach($category as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Status</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="chkStatus" name="chkStatus" value="1">
                            </div>
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

</section>

</div>
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<script src="{{asset('public/assetAdmin/plugins/jquery/jquery.min.js')}}"></script>
<script>
    
    $(function () {
        $('#summernote').summernote()
        $('#summernote2').summernote()
    })
    function openModal(e){
        console.log(e);
        $txtName = document.querySelector("#txtName");
        $txtPrice = document.querySelector("#txtPrice");
        $txtDetail = document.querySelector(".txtDetail");
        $txtQuantity = document.querySelector("#txtQuantity");
        $txtSummary = document.querySelector("#txtSummary");
        $CategoryOption = document.querySelector("#sel1");
        $chkStatus = document.querySelector("#chkStatus");
        $BrandOption = document.querySelector("#sel2");
        $imageDisplay = document.querySelector('#imageDisplay')
        $formDelete = document.querySelector("#formDelete");
        $formUpdate = document.querySelector("#formUpdate");

        $formDelete.action="admin/form/product/delete/"+e.id;

        $formUpdate.action = "admin/form/product/update/"+e.id;
        $imageDisplay.src = $imageDisplay.src+e.image;
        $txtName.value = e.name;
        $txtPrice.value = e.price;
        $txtSummary.value = e.summary;
        $("#summernote2").summernote("code",e.detail);
        $CategoryOption.value = e.categoryID;
        $BrandOption.value = e.brandID;
        if(e.status=='1'){
            $chkStatus.checked = true;
        }

    }
</script>
@endsection

