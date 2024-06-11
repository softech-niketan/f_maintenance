<div class="wrapper">
    <!-- Navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <!-- <h3 class="card-title">DataTable with default features</h3> -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                    Add row
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Asset Number<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Asset Description<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Purchased Date<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Purchased Date">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">% Depreciation<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Depreciation">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Current Value<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Current Value">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Range/Resolution<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Range/Resolution">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Location<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Location">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Make<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Make">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Frequency(days)<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Frequency(days)">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Calibration Date<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Calibration Date">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Remark<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Remark">

                                                            </div>
                                                        </div>

                                                        <!-- <div class="form-group">
    <label for="exampleInputPassword1">Password<span class="text-danger">*</span>
    <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div> -->



                                                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                                    </div>
                                                    <div class="modal-footer ">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary ">Add</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Rendering engine</th>
                                                <th>Browser</th>
                                                <th>Platform(s)</th>
                                                <th>Engine version</th>
                                                <th>CSS grade</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet
                                                    Explorer 4.0
                                                </td>
                                                <td>Win 95+</td>
                                                <td> 4</td>
                                                <td>X</td>
                                                <td><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal1">
                                                       
                                                        <i class="fas fa-edit"></i> </button>
                                                    <button type="button" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target="#exampleModal1">
                                                       
                                                    <i class="far fa-trash-alt"></i> </button>
                                                    <button type="button" class="btn btn-sm btn-primary ml-2" data-toggle="modal" data-target="#exampleModal1">
                                                       
                                                    <i class="fas fa-eye"></i> </button><div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Asset Number<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Asset Number">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Asset Description<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Description">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Purchased Date<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Purchased Date">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">% Depreciation<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Depreciation">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Current Value<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Current Value">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Range/Resolution<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Range/Resolution">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Location<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Location">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Make<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Make">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Frequency(days)<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Frequency(days)">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Calibration Date<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Calibration Date">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Remark<span class="text-danger">*</span>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Remark">

                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div class="modal-footer ">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary ">Add</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div></td>
                                            </tr>


                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    