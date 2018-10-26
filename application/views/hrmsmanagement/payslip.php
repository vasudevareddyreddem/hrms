<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
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
					   <div class="col-sm-3 col-md-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">Employee Name</label>
								<input type="text" class="form-control floating" />
							</div>
					   </div>  
						<div class="col-sm-3 col-md-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">Employee Id</label>
								<input type="text" class="form-control floating" />
							</div>
					   </div>
					
					 
					   <div class="col-sm-3 col-md-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">From</label>
								<div class="cal-icon"><input class="form-control floating datetimepicker" type="text"></div>
							</div>
						</div>
					   <div class="col-sm-3 col-md-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">To</label>
								<div class="cal-icon"><input class="form-control floating datetimepicker" type="text"></div>
							</div>
						</div>
						<div class="row">
						<div class="col-sm-3 pull-right">  
							<a href="payslip-view.php" class="btn btn-success "> Genarate Payslip </a>  
						</div>     
						</div>     
                    </div>
				
				
           
			
			

<?php include("footer.php"); ?>
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
