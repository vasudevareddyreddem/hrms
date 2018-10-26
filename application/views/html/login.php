<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/vendor/img/favicon.png">
        <title>Login</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css/bootstrapValidator.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css/style.css">
		
    </head>
<body>
        <div class="main-wrapper">
			<div class="account-page">
				<div class="container">
					<h3 class="account-title">HRMS Login</h3>
					<div class="account-box">
						<div class="account-wrapper">
							<div class="account-logo">
								<a href=""><img src="<?php echo base_url(); ?>assets/vendor/img/logo2.png" alt="Focus Technologies"></a>
							</div>
							<form id="defaultForm" name="defaultForm"action="" method="post" >
								<div class="form-group form-focus">
									<label class="control-label">Username or Email</label>
									<input class="form-control floating" type="text" name="email_id" id="email_id">
								</div>
								<div class="form-group form-focus">
									<label class="control-label">Password</label>
									<input class="form-control floating" type="password" name="password" password="password" >
								</div>
								<div class="form-group text-center">
<button type="submit" class="btn btn-primary btn-block account-btn" style="color:#fff;" id="validateBtn" name="validateBtn" value="check">Login</button>								</div>
								<div class="text-center">
									<a href="forget-password.php">Forgot your password?</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
	<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/bootstrapValidator.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/app.js"></script>
		
		
	<script type="text/javascript">
$(document).ready(function() {
   
    $('#defaultForm').bootstrapValidator({
//      
        fields: {
           email_id: {
              validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
            password: {
               validators: {
					notEmpty: {
						message: 'Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Password wont allow <>[]'
					}
				}
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
</script>
</body>
</html>