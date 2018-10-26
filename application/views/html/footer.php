	
		
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/select2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/moment.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/plugins/morris/morris.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/plugins/raphael/raphael-min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/js/app.js"></script>
		<script>
				var data = [
			  { y: '2014', a: 50, b: 90},
			  { y: '2015', a: 65,  b: 75},
			  { y: '2016', a: 50,  b: 50},
			  { y: '2017', a: 75,  b: 60},
			  { y: '2018', a: 80,  b: 65},
			  { y: '2019', a: 90,  b: 70},
			  { y: '2020', a: 100, b: 75},
			  { y: '2021', a: 115, b: 75},
			  { y: '2022', a: 120, b: 85},
			  { y: '2023', a: 145, b: 85},
			  { y: '2024', a: 160, b: 95}
			],
			config = {
			  data: data,
			  xkey: 'y',
			  ykeys: ['a', 'b'],
			  labels: ['Total Income', 'Total Outcome'],
			  fillOpacity: 0.6,
			  hideHover: 'auto',
			  behaveLikeLine: true,
			  resize: true,
			  pointFillColors:['#ffffff'],
			  pointStrokeColors: ['black'],
				gridLineColor: '#eef0f2',
			  lineColors:['gray','#00c5fb']
		  };
		config.element = 'area-chart';
		Morris.Area(config);
		config.element = 'line-chart';
		Morris.Line(config);
		config.element = 'bar-chart';
		Morris.Bar(config);
		config.element = 'stacked';
		config.stacked = true;
		Morris.Bar(config);
		Morris.Donut({
		  element: 'pie-chart',
		  data: [
			{label: "Employees", value: 30},
			{label: "Clients", value: 15},
			{label: "Projects", value: 45},
			{label: "Tasks", value: 10}
		  ]
		});
		</script>
		<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstName: {
              
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    }
                }
            },
            lastName: {
               
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                }
            },
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    },
                    remote: {
                        type: 'POST',
                        url: 'remote.php',
                        message: 'The username is not available'
                    },
                    different: {
                        field: 'password,confirmPassword',
                        message: 'The username and password cannot be the same as each other'
                    }
                }
            },
            email: {
                validators: {
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            birthday: {
                validators: {
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'The birthday is not valid'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
            'languages[]': {
                validators: {
                    notEmpty: {
                        message: 'Please specify at least one language you can speak'
                    }
                }
            },
            'programs[]': {
                validators: {
                    choice: {
                        min: 2,
                        max: 4,
                        message: 'Please choose 2 - 4 programming languages you are good at'
                    }
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
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