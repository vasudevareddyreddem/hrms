       

       <div class="page-wrapper">
                <div class="content container-fluid bg-white">
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Genarate Payslips</h4>
						</div>
						<div class="col-xs-8 text-right m-b-30">
							&nbsp;
						</div>
					</div>
					<hr>
					<div class="row filter-row">
						<form action='<?php if($data->salary_type==1) {echo base_url('payroll/payslippage');}if($data->salary_type==2) {echo base_url('payroll/weeklypayslip');}if($data->salary_type==3) {echo base_url('payroll/daypayslip');}
						?>' method='post' >
					   <div class="col-sm-3 col-md-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">Employee Name</label>
								<input type="text" name='ename' value='<?php echo $data->e_f_name ;?>'class="form-control floating"  readonly/>
							</div>
							<input  name='eid' type='hidden' value='<?php echo $data->e_id ;?>' class="form-control floating" />
					   </div>  
						<div class="col-sm-3 col-md-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">Employee Id</label>
								<input type="text" name='' value='<?php echo $data->e_emplouee_id ;?>' class="form-control floating" />
							</div>
					   </div>
					
					<?php if($data->salary_type==1){?>
					   <div class="col-sm-3 col-md-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label"></label>
								<!-- <div class="cal-icon"> -->
									<select class="select" name='month'> 
											<?php foreach($mon as $row):?>	
												<option value='<?php echo $row->m_id?>'><?php echo $row->month_name ?></option> 
											<?php endforeach?> 
												<!-- <option>Richard Miles</option> -->
											</select>
						<!-- 	</div> -->
						</div>
					</div>
					   <div class="col-sm-3 col-md-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label"></label>
								<!-- <div class="cal-icon"> -->
									<select class="select" name='year'> 
												<?php foreach($year as $row):?>
												<option><?php echo $row->year?></option>
												<?php endforeach?> 
												<!-- <option>Richard Miles</option> -->
											</select>
								<!-- </div> -->
							</div>
						</div>
					<?php }?>
					<?php if($data->salary_type==2){?>

					<div class="row colors " id="weekly"  >
					   <div class="col-sm-4 col-md-4 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label"></label>
								<!-- <div class="cal-icon"> -->
									<select class="select" name='week'> 
											<option>Select Week</option>
											<option value='1'>Present Week</option>
											<option value='0'>Last Week</option>
											</select>
						<!-- 	</div> -->
						</div>
					</div>
					</div>
					<?php }?>
					<?php if($data->salary_type==3){?>
					<div class="row colors " id="daily" style="display:none" >
					   <div class="col-sm-4 col-md-4 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label"></label>
								<!-- <div class="cal-icon"> -->
									<select class="select" name='day'> 
											<option>Select Day</option>
											<option value='1'>Present Day</option>
											<option value='0'>Last Day</option>
											</select>
						<!-- 	</div> -->
						</div>
					</div>
					
					</div>
					<?php }?>
						<div class="row">
						<div class="col-sm-3 pull-right">  
							<button type='submit' class="btn btn-success "> Genarate Payslip </button>  
						</div>     
						</div>     
                    </div>
	
           
			
			

<script>
  $(function () {
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