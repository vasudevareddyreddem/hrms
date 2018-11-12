<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-4">
                <h4 class="page-title">Notifications</h4>
            </div>
        </div>
        <form>

            <div class="row">
                <div class="col-md-12 bg-white">
                    <div class="clearfix">&nbsp;</div>
                    <div class="table-responsive">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
<<<<<<< HEAD
                                     <td>
											<a href="#" class="avatar"><?php echo substr($list['e_login_name'],0,1);?></a>
											<h2><a href="#"><span><?php echo $list['e_login_name'];?></span></a></h2>
											</td>
                                    <td>Applied For <?php echo $list['leave_type_name']; ?></td>
                                    <td><?php echo $list['created_at']; ?></td>
=======
                                    <td>XXXXXXX</td>
                                    <td>xxxxxxxxxxxxxxxx</td>
                                    <td>Nov 6</td>
>>>>>>> a4efb4f39a9374456b42d80b5bca797e72d12390
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="#" data-toggle="tooltip" title="Edit"><i class="fa fa-reply"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>XXXXXXX</td>
                                    <td>xxxxxxxxxxxxxxxx</td>
                                    <td>Nov 6</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="#" data-toggle="tooltip" title="Edit"><i class="fa fa-reply"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>XXXXXXX</td>
                                    <td>xxxxxxxxxxxxxxxx</td>
                                    <td>Nov 6</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="#" data-toggle="tooltip" title="Edit"><i class="fa fa-reply"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </form>
    </div>


    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>