@extends('admin.layout2')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Category Table</h3>

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
                    <div class="card-body table-responsive p-0" style="height: 500px;" id="example1">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Category Detail</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $row)
                                <?php
                                    $myJSON = json_encode($row);
                                ?>
                                <script>
                                    var jsonData = JSON.parse('<?= $myJSON; ?>');
                                    
                                </script>
                                <tr>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->detail}}</td>
                                    <td><a onclick="openModal({{$myJSON}})" href="#" class="btn btn-warning btn-sm" role="button" data-toggle="modal"
                                            data-target="#UpdateCategoryModal">Update</a>
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
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="formUpdate" action="admin/form/category/update" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Phải thêm-->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input name="txtName" type="text" class="form-control" id="updateName" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category Detail</label>
                            <input name="txtDetail" type="text" class="form-control" id="updateDetail" placeholder="">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
                <form id="formDelete" action="" method="POST">
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
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="admin/form/category/add" method="POST">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Phải thêm-->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input name="txtName" type="text" class="form-control" id="" placeholder="Enter ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Detail</label>
                            <input name='txtDetail' type="text" class="form-control" id="" placeholder="Enter ">
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
<!-- /.content-wrapper -->
<script>
function openModal(e){

    $inputName = document.querySelector("#updateName");
    $inputemail = document.querySelector("#updateDetail");
    $formDelete = document.querySelector("#formDelete");
    $formUpdate = document.querySelector("#formUpdate");

    $formDelete.action="admin/form/category/delete/"+e.id;

    $formUpdate.action = "admin/form/category/update/"+e.id;


    $inputName.value=e.name;
    $inputemail.value=e.detail;
}

</script>
@endsection
