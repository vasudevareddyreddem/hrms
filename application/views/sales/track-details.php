<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <h4 class="page-title">Salesman Track</h4>
            </div>
        </div>
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <?php if($sale_man_details['e_profile_pic']!=''){ ?>
                                <img class="inline-block img-circle" src="<?php echo base_url('assets/adminprofilepic/'.$sale_man_details['e_profile_pic']); ?>" alt="user">
                                <?php }else{ ?>
                                <img src="<?php echo base_url();?>assets/vendor/img/user-06.jpg" class="img-circle" alt="User Image" />
                                <?php } ?>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 m-b-0">
                                            <?php echo $sale_man_details['e_login_name'];?>
                                        </h3>

                                        <div class="staff-id">Employee ID :
                                            <?php echo $sale_man_details['e_emplouee_id'];?>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Phone:</span>
                                            <span class="text"><a href="#">
                                                    <?php echo $sale_man_details['e_mobile_personal'];?></a></span>
                                        </li>
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="#">
                                                    <?php echo $sale_man_details['e_email_work'];?></a></span>
                                        </li>

                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text">
                                                <?php echo $sale_man_details['e_c_adress'];?> &nbsp;
                                                <?php echo $sale_man_details['e_c_city'];?>&nbsp;
                                                <?php echo $sale_man_details['e_c_district'];?>&nbsp;
                                                <?php echo $sale_man_details['e_c_state'];?> </span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
			<form action "<?php echo base_url('sales/trackdetails'); ?>" method="post">

                <div class="row">
                    <div class="col-md-7">
                        <input  type="hidden" name="sales_emp_id" id="sales_emp_id" value="<?php echo isset($sale_man_details['sales_emp_id'])?$sale_man_details['sales_emp_id']:''; ?>">
                    </div>
                    <div class="col-md-3">
                        <div class="cal-icon">
                            <input class="form-control datetimepicker" type="text"  name="work_date" id="work_date" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
                <div>
                    <div class="col-md-6 h3">
                        <?php echo isset($current_work_location)?$current_work_location:'';?>
                    </div>
                    <div class="col-md-6 h3">
                        <?php echo isset($previous_work_location)?$previous_work_location:'';?>
                    </div>
                </div>
			</form>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card-box">


                    <div class="col-md-6">

                        <div class="card-title">Today (
                            <?php echo isset($today_date)?$today_date:''; ?>)</div>

                        <div class="experience-box">
                            <ul class="experience-list">
                                <?php foreach($current_date as $list){?>
                                <li>

                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">
                                                <?php  echo $list['time'];?></a>
                                            <div>
                                                <?php  echo $list['area_location'];?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php }?>




                            </ul>
                        </div>


                    </div>


                    <div class="col-md-6">

                        <h3 class="card-title">Yesterday (
                            <?php echo isset($prevoiu_date)?$prevoiu_date:''; ?>)</h3>
                        <div class="experience-box">
                            <ul class="experience-list">

                                <?php foreach($prevoius_date as $list){?>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">
                                                <?php echo $list['time']; ?></a>
                                            <div>
                                                <?php echo $list['area_location']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php }?>


                            </ul>
                        </div>



                    </div>

                    <div class="clearfix">&nbsp;</div>
                </div>

            </div>
        </div>






    </div>

</div>
<script>
    function get_date(work_date) {
        if (work_date != '') {
            jQuery.ajax({
                url: "<?php echo base_url('sales/date_wise_area');?>",
                data: {
                    work_date: work_date,
                },
                type: "POST",
                format: "Json",
                success: function(data) {

                    if (data.msg = 1) {
                        var parsedData = JSON.parse(data);
                        //alert(parsedData.list.length);
                        $('#area_location').empty();
                        $('#area_location').append("<option>select</option>");
                        for (i = 0; i < parsedData.list.length; i++) {
                            //console.log(parsedData.list);
                            $('#area_location').append("<option value=" + parsedData.list[i].s_t_id + ">" + parsedData.list[i].area_location + "</option>");



                        }
                    }

                }
            });
        }
    }
</script>