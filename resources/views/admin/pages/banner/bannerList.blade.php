@extends('admin.layout2')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Banner Table</h3>

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
                                    <th>Banner Title</th>
                                    <th>Banner Description</th>
                                    <th>Banner Image</th>
                                    <th>Banner Link</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banner as $row)
                                <?php
                                    $myJSON = json_encode($row);
                                ?>
                                <script>
                                    var jsonData = JSON.parse('<?= $myJSON; ?>');
                                    
                                </script>
                                <tr>
                                    <td>{{$row->title}}</td>
                                    <td>{{$row->description}}</td>
                                    <td>
                                        <img style="max-width:200px!important" src="{{asset('images')}}/{{$row->image}}" class="rounded" alt="...">
                                    </td>
                                    <td>{{$row->link}}</td>
                                    <td><a onclick="openModal({{$myJSON}})" href="#" class="btn btn-warning btn-sm" role="button" data-toggle="modal"
                                            data-target="#UpdateBannerModal">Update</a>
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
<div class="modal" id="UpdateBannerModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Banner</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="formUpdate" action="admin/custom/banner/update" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Phải thêm-->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Banner Title</label>
                            <input name="txtTitle" type="text" class="form-control" id="updateTitle" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Banner Description</label>
                            <input name="txtDescription" type="text" class="form-control" id="updateDescription" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Banner Image</label>
                            <input name="txtImage" type="file" class="form-control" id="updateImage" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Banner Link</label>
                            <input name="txtLink" type="text" class="form-control" id="updateLink" placeholder="" required>
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
                <form action="admin/custom/banner/add" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--Phải thêm-->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Banner Title</label>
                            <input name="txtTitle" type="text" class="form-control" id="addTitle" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Banner Description</label>
                            <input name="txtDescription" type="text" class="form-control" id="addDescription" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Banner Image</label>
                            <input name="txtImage" type="file" class="form-control" id="addImage" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Banner Link</label>
                            <input name="txtLink" type="text" class="form-control" id="addLink" placeholder="" required>
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

    $inputTitle = document.querySelector("#updateTitle");
    $inputDescription = document.querySelector("#updateDescription");
    //$inputImage = document.querySelector("#updateImage");
    $inputLink = document.querySelector("#updateLink");

    $formDelete = document.querySelector("#formDelete");
    $formUpdate = document.querySelector("#formUpdate");

    $formDelete.action="admin/custom/banner/delete/"+e.id;

    $formUpdate.action = "admin/custom/banner/update/"+e.id;


    $inputTitle.value=e.title;
    $inputDescription.value=e.description;
    //$inputImage.value=e.image;
    $inputLink.value=e.link;

}

</script>
@endsection
