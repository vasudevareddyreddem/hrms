<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
            <div class="page-wrapper">
                <div class="content container-fluid bg-white">	
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Employee</h4>
						</div>
						<div class="col-xs-8 text-right m-b-30">
							<a href="employees-list.php" class="btn btn-primary pull-right rounded"> Employees Lists</a>
						
						</div>
					</div>
					<form id="defaultForm" method="post" class="m-b-30" action="addemployee.php">
							<h2 class="text-primary">Basic Details</h2>
							<hr>
								<div class="row">
									<div class="col-sm-6">  
										<div class="form-group">
											<label class="control-label">Employee ID </label>
											<input value="SSB12XX" type="text" class="form-control" readonly>
										</div>
									</div>
										<div class="col-sm-6">  
											<div class="form-group">
												<label class="control-label">Joining Date </label>
												<input value="10/10/2018" type="text" class="form-control" readonly>
											</div>
										</div>
									</div>
									<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">First Name <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="firstName">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Last Name</label>
											<input class="form-control" type="text"  name="lastName">
										</div>
									</div>
									</div>
									<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Login Name </label>
											<input class="form-control" type="text"  name="username">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">Email Personal </label>
											<input class="form-control" type="email">
										</div>
									</div>	
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">Email Work</label>
											<input class="form-control" type="email">
										</div>
									</div>
									</div>
									<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Password</label>
											<input class="form-control" type="password">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Confirm Password</label>
											<input class="form-control" type="password">
										</div>
									</div>
									</div>
									
									<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Phone Personal </label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Phone Work </label>
											<input class="form-control" type="text">
										</div>
									</div>
								
									
									</div>	
									<div class="row">
										<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">Designation</label>
											<select class="select">
													<option value="">Select Designation</option>
													<option value="">General Manager</option>
													<option value="">Assistant General Manager</option>
													<option value="">Production Manager</option>
													<option value="">Assistant Production Manager</option>
													<option value="1">Shift Incharge</option>
													<option value="1">Senior Trainee</option>
													<option value="1">Junior  Trainee</option>
											</select>
										</div>
									</div>
										<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">Supervisor</label>
											<select class="select">
													<option value="">Select Supervisor</option>
													<option value="">A</option>
													<option value="">B</option>
													<option value="">C</option>
													
											</select>
										</div>
									</div>	
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">Department</label>
											<select class="select">
													<option value="">Select Department</option>
													<option value="">A</option>
													<option value="">B</option>
													<option value="">C</option>
													
											</select>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label class="control-label">Sub Department</label>
											<select class="select">
													<option value="">Select Sub Department</option>
													<option value="">A</option>
													<option value="">B</option>
													<option value="">C</option>
													
											</select>
										</div>
									</div>
								</div>
								<div class="clearfix">&nbsp;</div>
								<div class="row">
								<h4 class="col-md-6 text-primary">Current Address</h4>
								<h4 class="col-md-6 text-primary">Permanent Address</h4>
								</div>
								<div class="row">
								
									<div class="col-sm-6 ">
										<div class="form-group">
											<label class="control-label">Address 1 </label>
											<textarea class="form-control" placeholder="Enter Address1"></textarea>
										</div>
										<div class="form-group">
											<label class="control-label">City </label>
											<input class="form-control" type="text" placeholder="Enter City">
										</div>
										<div class="form-group">
											<label class="control-label">District </label>
											<input class="form-control" type="text" placeholder="Enter City">
										</div>
										<div class="form-group">
											<label class="control-label">State </label>
												<select class="form-control" id="state" name="state">
												<option value="">N/A</option>
												<option value="AK">Alaska</option>
												<option value="AL">Alabama</option>
												<option value="AR">Arkansas</option>
												<option value="AZ">Arizona</option>
												<option value="CA">California</option>
												<option value="CO">Colorado</option>
												<option value="CT">Connecticut</option>
												<option value="DC">District of Columbia</option>
												<option value="DE">Delaware</option>
												<option value="FL">Florida</option>
												<option value="GA">Georgia</option>
												<option value="HI">Hawaii</option>
												<option value="IA">Iowa</option>
												<option value="ID">Idaho</option>
												<option value="IL">Illinois</option>
												<option value="IN">Indiana</option>
												<option value="KS">Kansas</option>
												<option value="KY">Kentucky</option>
												<option value="LA">Louisiana</option>
												<option value="MA">Massachusetts</option>
												<option value="MD">Maryland</option>
												<option value="ME">Maine</option>
												<option value="MI">Michigan</option>
												<option value="MN">Minnesota</option>
												<option value="MO">Missouri</option>
												<option value="MS">Mississippi</option>
												<option value="MT">Montana</option>
												<option value="NC">North Carolina</option>
												<option value="ND">North Dakota</option>
												<option value="NE">Nebraska</option>
												<option value="NH">New Hampshire</option>
												<option value="NJ">New Jersey</option>
												<option value="NM">New Mexico</option>
												<option value="NV">Nevada</option>
												<option value="NY">New York</option>
												<option value="OH">Ohio</option>
												<option value="OK">Oklahoma</option>
												<option value="OR">Oregon</option>
												<option value="PA">Pennsylvania</option>
												<option value="PR">Puerto Rico</option>
												<option value="RI">Rhode Island</option>
												<option value="SC">South Carolina</option>
												<option value="SD">South Dakota</option>
												<option value="TN">Tennessee</option>
												<option value="TX">Texas</option>
												<option value="UT">Utah</option>
												<option value="VA">Virginia</option>
												<option value="VT">Vermont</option>
												<option value="WA">Washington</option>
												<option value="WI">Wisconsin</option>
												<option value="WV">West Virginia</option>
												<option value="WY">Wyoming</option>
											</select>
										</div>
										<div class="checkbox">
										  <label><input type="checkbox" value="">Click here if Currrent Address is Same as Permanent</label>
										</div>
									</div>
									<div class="col-sm-6 ">
										<div class="form-group">
											<label class="control-label">Address 1 </label>
											<textarea class="form-control" placeholder="Enter Address1"></textarea>
										</div>
										<div class="form-group">
											<label class="control-label">City </label>
											<input class="form-control" type="text" placeholder="Enter City">
										</div>
										<div class="form-group">
											<label class="control-label">District </label>
											<input class="form-control" type="text" placeholder="Enter City">
										</div>
										<div class="form-group">
											<label class="control-label">State </label>
												<select class="form-control" id="state" name="state">
												<option value="">N/A</option>
												<option value="AK">Alaska</option>
												<option value="AL">Alabama</option>
												<option value="AR">Arkansas</option>
												<option value="AZ">Arizona</option>
												<option value="CA">California</option>
												<option value="CO">Colorado</option>
												<option value="CT">Connecticut</option>
												<option value="DC">District of Columbia</option>
												<option value="DE">Delaware</option>
												<option value="FL">Florida</option>
												<option value="GA">Georgia</option>
												<option value="HI">Hawaii</option>
												<option value="IA">Iowa</option>
												<option value="ID">Idaho</option>
												<option value="IL">Illinois</option>
												<option value="IN">Indiana</option>
												<option value="KS">Kansas</option>
												<option value="KY">Kentucky</option>
												<option value="LA">Louisiana</option>
												<option value="MA">Massachusetts</option>
												<option value="MD">Maryland</option>
												<option value="ME">Maine</option>
												<option value="MI">Michigan</option>
												<option value="MN">Minnesota</option>
												<option value="MO">Missouri</option>
												<option value="MS">Mississippi</option>
												<option value="MT">Montana</option>
												<option value="NC">North Carolina</option>
												<option value="ND">North Dakota</option>
												<option value="NE">Nebraska</option>
												<option value="NH">New Hampshire</option>
												<option value="NJ">New Jersey</option>
												<option value="NM">New Mexico</option>
												<option value="NV">Nevada</option>
												<option value="NY">New York</option>
												<option value="OH">Ohio</option>
												<option value="OK">Oklahoma</option>
												<option value="OR">Oregon</option>
												<option value="PA">Pennsylvania</option>
												<option value="PR">Puerto Rico</option>
												<option value="RI">Rhode Island</option>
												<option value="SC">South Carolina</option>
												<option value="SD">South Dakota</option>
												<option value="TN">Tennessee</option>
												<option value="TX">Texas</option>
												<option value="UT">Utah</option>
												<option value="VA">Virginia</option>
												<option value="VT">Vermont</option>
												<option value="WA">Washington</option>
												<option value="WI">Wisconsin</option>
												<option value="WV">West Virginia</option>
												<option value="WY">Wyoming</option>
											</select>
										</div>
									</div>
									
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Upload Employee Photo </label>
											<input class="form-control" type="file">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Upload Documents</label>
											<input class="form-control" type="file" multiple>
										</div>
									</div>
								</div>
								<div class="clearfix">&nbsp;</div>
								<h2 class="text-primary">Bank Account Details</h2>
							<hr>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Bank Name </label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Account Number </label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>	
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Account Holder Name </label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">IFSC Code</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="clearfix">&nbsp;</div>
								<h2 class="text-primary">Contact Person Details</h2>
							<hr>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label"> Name </label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Mobile Number </label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>	
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Email </label>
											<input class="form-control" type="email">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Relationship</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
											<div class="form-group">
											<label class="control-label">Address 1 </label>
											<textarea class="form-control" placeholder="Enter Address1"></textarea>
										</div>
									</div>
									
								</div>
							
								
								<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Create Employee</button>
									
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			
<?php include("footer.php"); ?>



