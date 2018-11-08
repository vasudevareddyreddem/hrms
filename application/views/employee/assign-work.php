<div class="page-wrapper">
    <div class="content container-fluid bg-white">
        <div class="row">
            <div class="col-xs-4">
                <h4 class="page-title">Assign Work</h4>
            </div>
        </div>
        <form id="workAssignForm" method="post" class="m-b-30" action="<?php echo base_url('payroll/addsal');?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Employee</label>
                        <select class="form-control" name='waf_empname'>
                            <option selected disabled>Select</option>
                            <option value="1">Employee 1</option>
                            <option value="2">Employee 2</option>
                            <option value="3">Employee 3</option>
                            <option value="4">Employee 4</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Allocated Area</label>
                        <select class="form-control" name='waf_area'>
                            <option selected disabled>Select</option>
                            <option value="1">Area 1</option>
                            <option value="2">Area 2</option>
                            <option value="3">Area 3</option>
                            <option value="4">Area 4</option>
                            <option value="5">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input class="form-control" type="text" name='waf_number' id='waf_number'>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Other Area</label>
                        <input class="form-control" type="text" name='' id=''>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Work</label>
                        <textarea class="form-control" type="text" name='waf_work' id='waf_work' rows="3" placeholder="Enter here...."></textarea>
                    </div>
                </div>
            </div>
            <div class="m-t-20 text-center">
                <button type="submit" class="btn btn-primary">Assign Work</button>
            </div>
        </form>

    </div>
</div>

<script>
    $(document).ready(function() {
        $('#workAssignForm').bootstrapValidator({
            fields: {
                waf_empname: {
                    validators: {
                        notEmpty: {
                            message: 'employee name is required'
                        }
                    }
                },
                waf_number: {
                    validators: {
                        notEmpty: {
                            message: 'mobile number is required'
                        }
                    }
                },
                waf_area: {
                    validators: {
                        notEmpty: {
                            message: 'allocation area is required'
                        }
                    }
                },
                waf_work: {
                    validators: {
                        notEmpty: {
                            message: 'assigning work is required'
                        }
                    }
                }
            }

        });

        // Validate the form manually
        $('#workAssignForm').on('submit', function() {

            $('#workAssignForm').bootstrapValidator('validate');
        });

    });
</script>