<html>

<head></head>

<body>
    <div style="width: 100%;">
        <h2 style="text-align: center; text-decoration-line: underline; text-transform: uppercase;"><?php if($sal_type==1){?>
                        Payslip for the month of

                        <?php echo $pslip_det->e_salary_month.' '.$pslip_det->e_salary_year;}?>
                        <?php if($sal_type==2){?>payslip for the week from
                        <?php echo $startdate;?> to
                        <?php echo $enddate;}?>
                        <?php if($sal_type==3){?> payslip for the day of
                        <?php echo $pslip_det->daily_date;}?></h2>
        <table border="0" width="100%" align="left" cellspacing="0" cellpadding="5" style="font-size: 19px; margin-bottom: 30px;">
            <tr>
                <td>
                    <span>Focus Technologies</span>
                    <br>
                    <span>Focus Technologies</span>
                    <br>
                    <span>Focus Technologies</span>
                </td>
                <td style="text-align: right;">
                    <p style="font-size: 30px; text-transform: uppercase; margin-bottom: 0px;">Payslip  <?php echo $pslip_det->e_s_p_id;?></p>
                    <?php if($sal_type==1){?>
                                    Salary Month: <span>
                                            <?php echo $pslip_det->e_salary_month.','.$pslip_det->e_salary_year?>
                                            </span>
                                    <?php }?>
                                    <?php if($sal_type==2){?>
                                    Salary Week: <span>
                                            <?php echo 'From:'.$startdate.'To'.$enddate?>
                                            </span>
                                    <?php }?>
                                    <?php if($sal_type==3){?>
                                    Salary Day: <span>
                                            <?php echo $pslip_det->daily_date ;?>
                                            </span>
                                    <?php }?>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size: 19px;">
            <tr>
                <td>
                    <strong><?php echo $pslip_det->e_f_name ?></strong>
                    <br>
                    <span>Employee Id :  <?php echo $pslip_det->e_emplouee_id ?></span>
                    <br>
                    <span><?php echo $pslip_det->role ?></span>
                    <br>
                    <span>Joining Date : <?php $day=explode("-",$pslip_det->e_join_date);
                                            echo $day[2]?$day[2]:'';
                                         $date = date('F, Y', strtotime($pslip_det->e_join_date));
                                        echo $date;  ?></span>
                </td>
            </tr>
        </table>

        <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <tr>
                <?php if($sal_type==1 or $sal_type==2){?>
                <td>
                    <table width="106%" cellspacing="0" cellpadding="5" style="margin-top: 30px;">
                        <tr>
                            <td style="border: none;">
                                <h3 style="text-transform: uppercase; margin-bottom: 0px;">Leaves</h3>
                            </td>
                        </tr>
                        <tbody>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none;"><strong>Pay Leave Days</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none;"><span><?php echo $pslip_det->payleave_days ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>General Leave Days</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->genleave_days  ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Medical Leave Days</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->medleave_days ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                        <?php }?>
                <td>
                    <table border="0" width="90%" align="right" cellspacing="0" cellpadding="5">
                        <tr>
                            <td style="border: none;">
                                <h3 style="text-transform: uppercase; margin-bottom: 0px;">Salary</h3>
                            </td>
                        </tr>
                        <tbody>
                            <?php if($sal_type==1){?>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none;"><strong> Monthly Salary</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none;"><span><?php echo $pslip_det->e_net_salary ?></span></td>
                            </tr>
                               <?php }?>
                               <?php if($sal_type==2){?>
                                <tr>
                                <td style="border: 1px solid #bbb; border-right: none;"><strong> Weekly Salary</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none;"><span><?php $sal= $pslip_det->e_net_salary/(float)30;
                                                    echo (int)$sal*7 ?></span></td>
                            </tr>
                               <?php }?>
                               <?php if($sal_type==3){?>
                                <tr>
                                <td style="border: 1px solid #bbb; border-right: none;"><strong> Daily Salary</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none;"><span></span></td>
                            </tr>
                               <?php }?>
                               <?php if($sal_type==1){?>
                                <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Take Home Monthly salary</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->monthly_sal ?></span></td>
                            </tr>
                        <?php }?>
                        <?php if($sal_type==2){?>
                                <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Take Home Weekly salary</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->weekly_sal ?></span></td>
                            </tr>
                        <?php }?>
                        <?php if($sal_type==3){?>
                                <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Take Home Daily salary</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->day_sal ?></span></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>

        <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <tr>
                <td>
                    <table width="98%" cellspacing="0" cellpadding="5">
                        <tr>
                            <td style="border: none;">
                                <h3 style="text-transform: uppercase; margin-bottom: 0px;">Earnings</h3>
                            </td>
                        </tr>
                        <tbody>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none;"><strong>Basic Salary</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none;"><span><?php echo $pslip_det->e_basic ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>DA</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span> <?php echo $pslip_det->e_da ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>House Rent Allowance (HRA)</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->e_hra ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Conveyance</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->e_conveyance ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Allowance</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span> <?php echo $pslip_det->e_allowance ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Medical Allowance</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->e_medical_allowance ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Other Allowance</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->e_others ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Total Earnings</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><strong><?php echo $pslip_det->e_net_salary ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <table border="0" width="97%" align="right" cellspacing="0" cellpadding="5" style="margin-top: 25px;">
                        <tr>
                            <td style="border: none;">
                                <h3 style="text-transform: uppercase; margin-bottom: 0px;">Deductions</h3>
                            </td>
                        </tr>
                        <tbody>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none;"><strong>Tax Deducted at Source (T.D.S)</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none;"><span><?php echo $pslip_det->e_d_tds ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Provident Fund</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->e_d_pf ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>ESI</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->e_d_esi ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Professional Tax</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->e_d_Prof_tax ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Fund</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->e_d_fund ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Leaves</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->e_leaves_deduction ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Labour Welfare Fund</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->e_d_labour_welfare ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Others</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><span><?php echo $pslip_det->e_d_others ?></span></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid #bbb; border-right: none; border-top: none;"><strong>Total Deductions</strong></td>
                                <td style="text-align: right; border: 1px solid #bbb; border-left: none; border-top: none;"><strong> <?php echo $pslip_det->e_salary_deduction ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>

        <table border="0" width="100%" cellspacing="0" cellpadding="5" style="margin: 30px 0px;">
            <tr>
                <td style="border: none;">
                    <h3 style="text-transform: uppercase; margin-bottom: 0px;">
                        Net Salary : <?php echo $pslip_det->e_net_salary ?></strong>
                                <?php echo $this->numbertowords->convert_number($pslip_det->e_net_salary).'Rupees'; ?> (<span style="text-transform: capitalize; font-weight: 100;">Nine Thousand Rupees Only</span>)
                    </h3>
                </td>
            </tr>
        </table>


    </div>
</body>

</html>