<style>
    .work_details tbody tr td{
        border-top: 0px;
        width: 50%;
    }
</style>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xs-4">
                <h4 class="page-title">Work Details</h4>
            </div>
        </div>
        <div class="row bg-white">
            <div class="col-md-6">  
                <table id="" class="table table-borderless work_details">
                    <tbody>
                        <tr>
                            <td class="text-right"><strong>Employee Id :</strong></td>
                            <td class="text-left">Bayapu</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Mobile Number :</strong></td>
                            <td class="text-left">8500050944</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Allocated Area :</strong></td>
                            <td class="text-left">kurnool</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Date :</strong></td>
                            <td class="text-left">2018-11-13</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Status :</strong></td>
                            <td class="text-left">Active</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Work Status :</strong></td>
                            <td class="text-left">Initiate</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="col-md-6">
                <form id="defaultForm" method="" action="">
                    <div class="form-group m-t-10">
                        <label>Text Area<span class="text-danger">*</span></label>
                        <textarea class="form-control" id="" name="" placeholder="Enter here.."></textarea>
                    </div>
                    <div class="m-t-20 text-center">
                        <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Submit</button>
                    </div>
                </form>
            </div>
            
        </div>
        
        <div class="row bg-white">
            <div class="col-md-12">
            <p>The evolution of technology has made the communication process much easier for humans. In the past decade one has to go physically to the hospital to book a doctor appointment, but now through the expeditious expansion in software one can book the doctor’s appointment through mobile app, all you need is a smart phone with an internet connection.</p>
            </div>
        </div>
        
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#defaultForm').bootstrapValidator({
            fields: {
                emp_id: {
                    validators: {
                        notEmpty: {
                            message: 'This field cannot be empty'
                        }
                    }
                },
                mobile: {
                    validators: {
                        notEmpty: {
                            message: 'This field cannot be empty'
                        }
                    }
                }
            }
        });

        // Validate the form manually
        $('#validateBtn').click(function() {
            $('#defaultForm').bootstrapValidator('validate');
        });
    });
</script>