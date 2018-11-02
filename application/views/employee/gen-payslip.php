       

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
						<form action='<?php echo base_url('payroll/payslippage')?>' method='post' >
					   <div class="col-sm-3 col-md-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label"></label>
								<!-- <div class="cal-icon"> -->
									<select id='ename' class="select" name='ename'>
									<option value='nnnx3'>Select</option> 
												<?php foreach($name as $row):?>
												
												<option value='<?php echo $row->e_f_name ?>'><?php echo $row->e_f_name ?></option>
											<?php endforeach ?>
											</select>
								<!-- </div> -->
							</div>
					   </div>  
						<div class="col-sm-3 col-md-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label"></label>
								<!-- <div class="cal-icon"> -->
									<select id='eid' class="select" name='eid'> 
												
											
											</select>
								<!-- </div> -->
							</div>
					   </div>
					
					 
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
						<div class="row">
						<div class="col-sm-3 pull-right">  
							<button type='submit' class="btn btn-success "> Genarate Payslip </button>  
						</div>     
						</div>     
                    </div>

                    <script type="text/javascript">
                    	$(document).ready(function() {
                    		

                    	$("#ename").change(function () {
                    		val=$('#ename').val();
                    		newval='http://localhost/hrms/payroll/empids/'+val;
                    		alert(newval);
                    		    $.ajax({
                    type: "GET",    //GET or POST or PUT or DELETE verb
                    url: 'http://localhost/hrms/payroll/empids/'+val,     // Location of the service
                    data: "",     //Data sent to server
                   
                    dataType: "json",   //Expected data format from server
                    
                    success: function (result) {
                    	$("#eid option").remove();
                    	//alert('lk');
                    console.log(result.msg);

                    	console.log(result);
                    	if (parseInt(result.msg)==1){
                    		
                    	$.each(result.list, function () {
                    		str='<option value="'+this.e_id+'">'+this.e_id+'</option>';

                    		$("#eid").append(str);
        // console.log("ID: " + this.e_id);
        // console.log("First Name: " + this.e_f_name);
        // console.log("Last Name: " + this.status);
        
     });
                  }  	
                  else{

                      str='<option value=""> NO data foundr</option>';
                      $("#eid").append(str);

                  }
                         
                         
                         
                         
                         }
                    ,
                    error: function() { 
                    	//console.log('error from server side');
                    	//console.log(result)

                    } 
                });
       
    });
});

                    </script>
	
           
			
			

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