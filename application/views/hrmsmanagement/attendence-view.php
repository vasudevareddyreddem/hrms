<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
            <div class="page-wrapper">
                <div class="content container-fluid">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title"> Attendance Details</h4>
						</div>
						<div class="col-xs-8 text-right m-b-30">
							&nbsp;
						
						</div>
					</div>
					<form>
					
					<div class="row">
				
						<div class="col-md-12 bg-white">
						<div class="clearfix">&nbsp;</div>
							<table  class="table table-bordered  col-md-6">
								<thead>
									<tr>
										<th>Name</th>
										<th>Employee ID</th>
										<th>Month</th>	
										<th>No of Working</th>
										<th>No of Leaves</th>
										<th>Total Working Days</th>
										
									</tr>
									<tbody>
									<tr>
										<td>User1</td>
										<td>FA-001</td>
										<td>Jan</td>
										<td>24</td>
										<td>3</td>
										<td>27</td>
									</tr>
									</tbody>
								</thead>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 bg-white">
						<div class="clearfix">&nbsp;</div>
							<div class="table-responsive">
									<table  class="table table-bordered table-striped">
									
									<thead>
										<tr>
											<th>Month</th>
										
											<th>1</th>
											<th>2</th>
											<th>3</th>
											<th>4</th>
											<th>5</th>
											<th>6</th>
											<th>7</th>
											<th>8</th>
											<th>9</th>
											<th>10</th>
											<th>11</th>
											<th>12</th>
											<th>13</th>
											<th>14</th>
											<th>15</th>
											<th>16</th>
											<th>17</th>
											<th>18</th>
											<th>19</th>
											<th>20</th>
											<th>22</th>
											<th>23</th>
											<th>24</th>
											<th>25</th>
											<th>26</th>
											<th>27</th>
											<th>28</th>
											<th>29</th>
											<th>30</th>
											<th>31</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Jan</td>
											
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><div class="half-day"><span class="first-off"><i class="fa fa-check text-success"></i></span> <span class="first-off"><i class="fa fa-close text-danger"></i></span></div></td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-close text-danger"></i> </td>
											<td><i class="fa fa-close text-danger"></i> </td>
											<td><i class="fa fa-close text-danger"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-close text-danger"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><div class="half-day"><span class="first-off"><i class="fa fa-close text-danger"></i></span> <span class="first-off"><i class="fa fa-check text-success"></i></span></div></td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-close text-danger"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-close text-danger"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
											<td><i class="fa fa-check text-success"></i> </td>
										</tr>
										
									</tbody>
								</table>
							</div>
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


