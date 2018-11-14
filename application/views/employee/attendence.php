<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h4 class="page-title">Employee Attendance</h4>
            </div>
            <div class="col-md-8">
               
            </div>
        </div>
        <form>
            <div class="row">
                <div class="col-md-12 bg-white">
                    <div class="clearfix">&nbsp;</div>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:30%;">Name</th>
                                    <th>Employee ID</th>
                                    <th>Role</th>
                                    <th>Mobile</th>
                                    <th>Month</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php  if($flag==1){
										foreach($emp_data as $row):?>


                                <tr>
                                    <td>
                                        <a href="#" class="avatar">
                                            <?php echo substr($row->e_f_name,0,1)?> </a>
                                        <h2><a href="#">
                                                <?php echo $row->e_f_name ;?><span>
                                                    <?php echo $row->e_designation ;?></span></a></h2>
                                    </td>
                                    <td>
                                        <?php echo $row->e_emplouee_id ;?>
                                    </td>
                                    <td>
                                        <?php echo $row->e_designation ;?>
                                    </td>
                                    <td>
                                        <?php echo $row->e_mobile_work  ;?>
                                    </td>
                                    <td>
                                        <select id='' class="form-control month" name='month'>
                                            <option value='select'>Select</option>
                                            <option value='1'>Jan</option>
                                            <option value='2'>Feb</option>
                                            <option value='3'>Mar</option>
                                            <option value='4'>Apr</option>
                                            <option value='5'>May</option>
                                            <option value='6'>Jun</option>
                                            <option value='7'>Jul</option>
                                            <option value='8'>Aug</option>
                                            <option value='9'>Sep</option>
                                            <option value='10'>Oct</option>
                                            <option value='11'>Nov</option>
                                            <option value='12'>Dec</option>
                                        </select>
                                    </td>


                                    <td class="text-center">
                                        <a class='urlchange' href="<?php echo base_url('empmanagment/viewattendance/'.$row->e_id); ?>"><span class="btn btn-sm btn-primary">
                                                <i class="fa fa-eye m-r-5"></i> View
                                            </span></a>
											<a class='urlchange_aatnece' href="<?php echo base_url('export/attendance/'.$row->e_id); ?>"><span class="btn btn-sm btn-primary">
                                               <i class="fas fa-file-export"></i> export
                                            </span></a>
                                    </td>
                                </tr>
                                <?php endforeach;} else{?>
                                <tr>
                                    NO data found
                                </tr>
                                <?php  }?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    
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
<script>
    $(document).ready(function() {
        $(".urlchange").click(function() {
            var lastObj = $(this);
            var parent = lastObj.parent();
            var previousObject = parent.closest(":has(select)").find('select');
            //$('#selection').text(previousObject.text());
            //$("h2").siblings("p");
            //ss=var link = $("this").closest("select").prev();
            //alert(previousObject.val());
            month = previousObject.val();
            //return false;
            if (month == 'select') {
				alert('Please select month then click on view');
                return false;
            }
            val = $(this).attr("href");
            newurl = val + '/' + month;
            $(this).attr("href", newurl);
        });
    }); 
	$(document).ready(function() {
        $(".urlchange_aatnece").click(function() {
            var lastObj = $(this);
            var parent = lastObj.parent();
            var previousObject = parent.closest(":has(select)").find('select');
            
            month = previousObject.val();
            if (month == 'select') {

                alert('Please select month then click on export');return false;
            }
            val = $(this).attr("href");
            newurl = val + '/' + month;
            $(this).attr("href", newurl);
        });
    });
</script>