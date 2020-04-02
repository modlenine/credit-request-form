<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new form export</title>
</head>

<body>

    <div class="container bg-white p-3">


        <h2 align="center">Credit Request Form Export</h2>
        <h4 align="center">{formcode}&nbsp;Status :<span>&nbsp;{status}</span></h4>

        <!-- Check all data for control page -->
        <input hidden type="text" name="checkStatusView" id="checkStatusView" value="{status}">
        <input type="text" name="checkUserDeptView" id="checkUserDeptView" value="{deptcode}">
        <input type="text" name="checkCusType" id="checkCusType" value="{customertype}">
        <input type="text" name="checkCusPosi" id="checkCusPosi" value="{posi}">

        <hr>

        <div class="mt-3 p-3" style="border:solid #ccc 1px; background-color:#F8F8FF;">

            <!-- Document Head -->
            <div class="row form-group">
                <div align="left" class="col-md-6">
                    <h3>CREDIT REQUEST FORM FOR EXPORT</h3>
                </div>
                <div align="right" class="col-md-6">
                    <h5>{formcode}</h5>
                </div>
            </div>


            <input style="display:none;" type="text" name="checkPage" id="checkPage" value="{checkpage}">
            <input style="display:none;" type="text" name="check_crf_company" id="check_crf_company" value="{company}">
            <div class="row form-group mt-3 p-2">
                <div class="col-md-4 form-group">
                    <div class="form-check">
                        <input id="crf_company_sln_view" class="form-check-input" type="radio" name="crf_company_sln_view" value="sln">
                        <label for="my-input" class="form-check-label">Salee Colour Public Company Limited.</label>
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <div class="form-check">
                        <input id="crf_company_poly_view" class="form-check-input" type="radio" name="crf_company_poly_view" value="poly">
                        <label for="my-input" class="form-check-label">Poly Meritasia Co.,Ltd.</label>
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <div class="form-check">
                        <input id="crf_company_ca_view" class="form-check-input" type="radio" name="crf_company_ca_view" value="ca">
                        <label for="my-input" class="form-check-label">Composite Asia Co.,Ltd</label>
                    </div>
                </div>
            </div>



            <!-- check customer type -->
            <input style="display:none;" type="text" name="check_crfex_custype" id="check_crfex_custype" value="{customertype}">
            <div class="row form-group mt-3 p-2">
                <div class="col-md-4 form-group">
                    <div class="form-check">
                        <input id="crfex_custype1" class="form-check-input" type="radio" name="crfex_custype1" value="newcustomer">
                        <label for="my-input" class="form-check-label">New customer.</label>
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <div class="form-check">
                        <input id="crfex_custype2" class="form-check-input" type="radio" name="crfex_custype2" value="currentcustomer">
                        <label for="my-input" class="form-check-label">Current customer.</label>
                    </div>
                </div>
            </div>


            <div class="row form-group">
                <div class="col-md-4">
                    <label for="">Date</label>
                    <input readonly type="text" name="crfex_datecreate_view" id="crfex_datecreate_view" value="{datecreate}" class="form-control form-control-sm">
                </div>
                <div class="col-md-4">
                    <label for="">Customer code</label>
                    <input readonly type="text" name="crfex_customercode_view" id="crfex_customercode_view" class="form-control form-control-sm" value="{customercode}">
                </div>
                <div class="col-md-4">
                    <label for="">Sales Reps</label>
                    <input readonly type="text" name="crfex_salesreps_view" id="crfex_salesreps_view" class="form-control form-control-sm" value="{salesreps}">
                </div>
            </div>


            <hr>
            <h5 align="left"><u>CUSTOMER PROFILE</u></h5>

            <div class="row form-group">
                <div class="col-md-6 form-group">
                    <label for="">Customer name (in English) : &nbsp;</label>
                    <input readonly type="text" name="crfex_cusnameEN" id="crfex_cusnameEN" class="form-control form-control-sm" value="{customernameEN}">
                </div>
                <div class="col-md-6 form-group">
                    <label for="">Customer name (in Thai)</label>
                    <input readonly type="text" name="crfex_cusnameTH" id="crfex_cusnameTH" class="form-control form-control-sm" value="{customernameTH}">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12">
                    <label for="">Address for invoicing</label>
                    <textarea readonly name="crfex_address" id="crfex_address" cols="30" rows="3" class="form-control form-control-sm">{cusaddress}</textarea>
                </div>
            </div>


            <div class="row form-group">
                <div class="col-md-4">
                    <label for="">Tel</label>
                    <input readonly type="text" name="crfex_tel" id="crfex_tel" class="form-control form-control-sm" value="{tel}">
                </div>
                <div class="col-md-4">
                    <label for="">Fax</label>
                    <input readonly type="text" name="crfex_fax" id="crfex_fax" class="form-control form-control-sm" value="{fax}">
                </div>
                <div class="col-md-4">
                    <label for="">Email</label>
                    <input readonly type="text" name="crfex_email" id="crfex_email" class="form-control form-control-sm" value="{email}">
                </div>
            </div>


            <hr>
            <h5 align="left"><u>PROPOSE FOR CREDIT LIMIT , CREDIT TERM AND CONDITION.</u></h5>
            <div class="row form-group mt-3">
                <div class="col-md-6">

                    <div class="input-group mb-3">
                        <input readonly name="crfex_creditlimit" id="crfex_creditlimit" type="text" class="form-control" placeholder="Propose credit limit." aria-label="Propose credit limit." aria-describedby="basic-addon2" value="{pcreditlimit}">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">THB</span>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <input readonly name="crfex_term" id="crfex_term" type="text" class="form-control" placeholder="Term" aria-label="Term" aria-describedby="basic-addon2" value="{pterm}">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">days</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <input readonly name="crfex_discount" id="crfex_discount" type="text" class="form-control" placeholder="Discount" aria-label="Discount" aria-describedby="basic-addon2" value="{pdiscount}">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row form-group">
                <div class="col-md-6">

                    <div class="input-group mb-3">
                        <input readonly name="crfex_creditlimit2" id="crfex_creditlimit2" type="text" class="form-control" placeholder="Current credit limit." aria-label="Current credit limit." aria-describedby="basic-addon2" value="{ccreditlimit}">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">THB</span>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <input readonly name="crfex_term2" id="crfex_term2" type="text" class="form-control" placeholder="Term" aria-label="Term" aria-describedby="basic-addon2" value="{cterm}">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">days</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <input readonly name="crfex_discount2" id="crfex_discount2" type="text" class="form-control" placeholder="Discount" aria-label="Discount" aria-describedby="basic-addon2" value="{cdiscount}">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row form-group">
                <div class="col-md-12">
                    <label for="">Company background and reason for credit revision.</label>
                    <textarea readonly name="crfex_combg" id="crfex_combg" cols="30" rows="3" class="form-control form-control-sm">{crfex_bg}</textarea>
                </div>
            </div>


            <label for="">History sales record ( previous 3 months )</label>
            <div class="row form-group">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input readonly name="crfex_month1" id="crfex_month1" type="text" class="form-control" placeholder="Month" aria-label="Month" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input readonly name="crfex_totalvolume1" id="crfex_totalvolume1" type="text" class="form-control" placeholder="Total volume" aria-label="Total volume" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">kg.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input readonly name="crfex_totalsales1" id="crfex_totalsales1" type="text" class="form-control" placeholder="Total sales" aria-label="Total sales" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">THB</span>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input readonly name="crfex_month2" id="crfex_month2" type="text" class="form-control" placeholder="Month" aria-label="Month" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input readonly name="crfex_totalvolume2" id="crfex_totalvolume2" type="text" class="form-control" placeholder="Total volume" aria-label="Total volume" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">kg.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input readonly name="crfex_totalsales2" id="crfex_totalsales2" type="text" class="form-control" placeholder="Total sales" aria-label="Total sales" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">THB</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input readonly name="crfex_month3" id="crfex_month3" type="text" class="form-control" placeholder="Month" aria-label="Month" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input readonly name="crfex_totalvolume3" id="crfex_totalvolume3" type="text" class="form-control" placeholder="Total volume" aria-label="Total volume" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">kg.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input readonly name="crfex_totalsales3" id="crfex_totalsales3" type="text" class="form-control" placeholder="Total sales" aria-label="Total sales" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">THB</span>
                        </div>
                    </div>
                </div>
            </div>


            <hr>
            <h6><b><u>FOR USER POST</u></b></h6>
            <div class="row form-group">
                <div class="col-md-4">
                    <label for="">User post</label>
                    <input readonly type="text" name="crfex_userpost" id="crfex_userpost" class="form-control form-control-sm" value="{userpost}">
                </div>
                <div class="col-md-4">
                    <label for="">Dept.</label>
                    <input readonly type="text" name="crfex_userdept" id="crfex_userdept" class="form-control form-control-sm" value="{userdept}">
                </div>
                <div class="col-md-4">
                    <label for="">Datetime</label>
                    <input readonly type="text" name="crfex_usercredatetime" id="crfex_usercredatetime" class="form-control form-control-sm" value="{userdatetime}">
                </div>
            </div>



            <!-- Sale manager & CS manager Section -->
            <form action="{exManagerApprove}" method="POST" name="" class="managerSection" style="display:none;">
                <hr>
                <h6><b><u>FOR SALES OR CS MANAGER APPROVE</u></b></h6>
                <div class="row form-group">
                    <div class="col-md-12 form-group">
                        <input type="radio" name="ex_mgrApprove" id="ex_mgrApprove" value="Approve">&nbsp;<label for="">Approve</label>&nbsp;&nbsp;
                        <input type="radio" name="ex_mgrApprove" id="ex_mgrApprove" value="Notapprove">&nbsp;<label for="">Not approve</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="">Reasons for approval.</label>
                        <textarea name="ex_mgrApproveDetail" id="ex_mgrApproveDetail" cols="30" rows="3" class="form-control form-control-sm"></textarea>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Approver.</label>
                        <input readonly type="text" name="ex_mgrApproveName" id="ex_mgrApproveName" class="form-control form-control-sm" value="{username}">
                        <input readonly type="text" name="ex_mgrApproveDateTime" id="ex_mgrApproveDateTime" class="form-control form-control-sm mt-1" value="{datenow}">
                    </div>
                </div>
                <div class="row form-group ">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><button type="submit" class="btn btn-info btn-block" id="ex_mgrSubmit" name="ex_mgrSubmit">Submit</button></div>
                </div>
            </form>

            <form method="POST" name="" class="managerSection1" style="display:none;">
                <hr>
                <h6><b><u>FOR SALES OR CS MANAGER APPROVE</u></b></h6>
                <div class="row form-group">
                    <!-- check status after action -->
                <input hidden type="text" name="show_crfex_mgrapp_status" id="show_crfex_mgrapp_status" value="{show_crfex_mgrapp_status}">

                    <div class="col-md-12 form-group">
                        <input type="radio" name="ex_mgrApprove1" id="ex_mgrApprove1" value="Approve">&nbsp;<label for="">Approve</label>&nbsp;&nbsp;
                        <input type="radio" name="ex_mgrApprove2" id="ex_mgrApprove2" value="Notapprove">&nbsp;<label for="">Not approve</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="">Reasons for approval.</label>
                        <textarea readonly name="ex_mgrApproveDetail" id="ex_mgrApproveDetail" cols="30" rows="3" class="form-control form-control-sm">{show_crfex_mgrapp_detail}</textarea>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Approver.</label>
                        <input readonly type="text" name="ex_mgrApproveName" id="ex_mgrApproveName" class="form-control form-control-sm" value="{show_crfex_mgrapp_username}">
                        <input readonly type="text" name="ex_mgrApproveDateTime" id="ex_mgrApproveDateTime" class="form-control form-control-sm mt-1" value="{show_crfex_mgrapp_datetime}">
                    </div>
                </div>
            </form>
            <!-- Sale manager & CS manager Section -->






            <!-- CS get br for account convert to customer code -->
            <form action="{exCsAddBr}" method="POST" name="" class="csAddBrDection" style="display:none;">
                <hr>
                <h6><b><u>FOR CS ADD BR CODE</u></b></h6>
                <div class="row form-group">
                    <div class="col-md-8 form-group">
                        <label for="">BR CODE</label>
                        <input type="text" name="ex_csBrCode" id="ex_csBrCode" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="">Memo.</label>
                        <textarea name="ex_csBrMemo" id="ex_csBrMemo" cols="30" rows="3" class="form-control form-control-sm"></textarea>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">CS Sign.</label>
                        <input readonly type="text" name="ex_csBrName" id="ex_csBrName" class="form-control form-control-sm" value="{username}">
                        <input readonly type="text" name="excsBrDateTime" id="excsBrDateTime" class="form-control form-control-sm mt-1" value="{datenow}">
                    </div>
                </div>
                <div class="row form-group ">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><button type="submit" class="btn btn-info btn-block" id="ex_csSubmit" name="ex_csSubmit">Submit</button></div>
                </div>
            </form>


            <form method="POST" name="" class="csAddBrDection1" style="display:none;">
                <hr>
                <h6><b><u>FOR CS ADD BR CODE</u></b></h6>
                <div class="row form-group">
                    <div class="col-md-8 form-group">
                        <label for="">BR CODE</label>
                        <input readonly type="text" name="ex_csBrCode" id="ex_csBrCode" class="form-control form-control-sm" value="{brcode}">
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="">Memo.</label>
                        <textarea readonly name="ex_csBrMemo" id="ex_csBrMemo" cols="30" rows="3" class="form-control form-control-sm">{crfex_csmemo}</textarea>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">CS Sign.</label>
                        <input readonly type="text" name="ex_csBrName" id="ex_csBrName" class="form-control form-control-sm" value="{crfex_csuserpost}">
                        <input readonly type="text" name="excsBrDateTime" id="excsBrDateTime" class="form-control form-control-sm mt-1" value="{crfex_csdatetime}">
                    </div>
                </div>
            </form>
            <!-- CS get br for account convert to customer code -->







            <!-- account manager apparove zone -->
            <form action="{exAccMgrApprove}" method="POST" name="" class="accManagerApprove" style="display:none;">
                <hr>
                <h6><b><u>FOR ACCOUNT MANAGER</u></b></h6>
                <div class="row form-group">

                    <div class="col-md-12 form-group">
                        <input type="radio" name="ex_accMgrApprove" id="ex_accMgrApprove" value="Approve">&nbsp;<label for="">Approve</label>&nbsp;&nbsp;
                        <input type="radio" name="ex_accMgrApprove" id="ex_accMgrApprove" value="Notapprove">&nbsp;<label for="">Not approve</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="">Reasons for approval.</label>
                        <textarea name="ex_accMgrApproveDetail" id="ex_accMgrApproveDetail" cols="30" rows="3" class="form-control form-control-sm"></textarea>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Account Manager Approver.</label>
                        <input readonly type="text" name="ex_accMgrApproveName" id="ex_accMgrApproveName" class="form-control form-control-sm" value="{username}">
                        <input readonly type="text" name="ex_accMgrApproveDateTime" id="ex_accMgrApproveDateTime" class="form-control form-control-sm mt-1" value="{datenow}">
                    </div>
                </div>
                <div class="row form-group ">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><button type="submit" class="btn btn-info btn-block" id="ex_accManagerSubmit" name="ex_accManagerSubmit">Submit</button></div>
                </div>
            </form>


            <form method="POST" name="" class="accManagerApprove1" style="display:none;">
                <hr>
                <h6><b><u>FOR ACCOUNT MANAGER</u></b></h6>
                <div class="row form-group">

                <!-- For check account manager approve status -->
                <input hidden type="text" name="check_ex_accMgrApprove" id="check_ex_accMgrApprove" value="{crfex_accmgr_status}">
                    <div class="col-md-12 form-group">
                        <input type="radio" name="ex_accMgrApprove1" id="ex_accMgrApprove1" value="Approve">&nbsp;<label for="">Approve</label>&nbsp;&nbsp;
                        <input type="radio" name="ex_accMgrApprove2" id="ex_accMgrApprove2" value="Notapprove">&nbsp;<label for="">Not approve</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="">Reasons for approval.</label>
                        <textarea readonly name="ex_accMgrApproveDetail" id="ex_accMgrApproveDetail" cols="30" rows="3" class="form-control form-control-sm">{crfex_accmgr_detail}</textarea>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Account Manager Approver.</label>
                        <input readonly type="text" name="ex_accMgrApproveName" id="ex_accMgrApproveName" class="form-control form-control-sm" value="{crfex_accmgr_username}">
                        <input readonly type="text" name="ex_accMgrApproveDateTime" id="ex_accMgrApproveDateTime" class="form-control form-control-sm mt-1" value="{crfex_accmgr_datetime}">
                    </div>
                </div>
            </form>
            <!-- account manager apparove zone -->






            <!-- Director apparove zone -->
            <form action="{exDirectorApprove}" method="POST" name="" class="directorApprove" style="display:none;">
            <input type="text" name="check_custype_direc" id="check_custype_direc" value="{customertype}">
                <hr>
                <h6><b><u>FOR DIRECTOR</u></b></h6>
                <div class="row form-group">

                    <div class="col-md-12 form-group">
                        <input type="radio" name="ex_directorApprove" id="ex_directorApprove" value="Approve">&nbsp;<label for="">Approve</label>&nbsp;&nbsp;
                        <input type="radio" name="ex_directorApprove" id="ex_directorApprove" value="Notapprove">&nbsp;<label for="">Not approve</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="">Reasons for approval.</label>
                        <textarea name="ex_directorApproveDetail" id="ex_directorApproveDetail" cols="30" rows="3" class="form-control form-control-sm"></textarea>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Account Manager Approver.</label>
                        <input readonly type="text" name="ex_directorApproveName" id="ex_directorApproveName" class="form-control form-control-sm" value="{username}">
                        <input readonly type="text" name="ex_directorApproveDateTime" id="ex_directorApproveDateTime" class="form-control form-control-sm mt-1" value="{datenow}">
                    </div>
                </div>
                <div class="row form-group ">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><button type="submit" class="btn btn-info btn-block" id="ex_directorSubmit" name="ex_directorSubmit">Submit</button></div>
                </div>
            </form>


            <form method="POST" name="" class="directorApprove1" style="display:none;">
                <hr>
                <h6><b><u>FOR DIRECTOR</u></b></h6>
                <div class="row form-group">

                <!-- Check director approve status -->
                <input hidden type="text" name="check_director_status" id="check_director_status" value="{crfex_directorapp_status}">
                    <div class="col-md-12 form-group">
                        <input type="radio" name="ex_directorApprove1" id="ex_directorApprove1" value="Approve">&nbsp;<label for="">Approve</label>&nbsp;&nbsp;
                        <input type="radio" name="ex_directorApprove2" id="ex_directorApprove2" value="Notapprove">&nbsp;<label for="">Not approve</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="">Reasons for approval.</label>
                        <textarea readonly name="ex_directorApproveDetail" id="ex_directorApproveDetail" cols="30" rows="3" class="form-control form-control-sm">{crfex_directorapp_detail}</textarea>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Account Manager Approver.</label>
                        <input readonly type="text" name="ex_directorApproveName" id="ex_directorApproveName" class="form-control form-control-sm" value="{crfex_directorapp_username}">
                        <input readonly type="text" name="ex_directorApproveDateTime" id="ex_directorApproveDateTime" class="form-control form-control-sm mt-1" value="{crfex_directorapp_datetime}">
                    </div>
                </div>
            </form>
            <!-- Director apparove zone -->



            <!-- account staff zone -->
            <form action="{exAccountAddCusCode}" method="POST" name="" class="accAddCustomerCode" style="display:none;">
                <hr>
                <h6><b><u>FOR ACCOUNT ADD CUSTOMER CODE</u></b></h6>
                <div class="row form-group">
                    <div class="col-md-8 form-group">
                        <label for="">CUSTOMER CODE</label>
                        <input type="text" name="ex_accCostomerCode" id="ex_accCostomerCode" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="">Memo.</label>
                        <textarea name="ex_accMemo" id="ex_accMemo" cols="30" rows="3" class="form-control form-control-sm"></textarea>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">ACCOUNT Sign.</label>
                        <input readonly type="text" name="ex_accName" id="ex_accName" class="form-control form-control-sm" value="{username}">
                        <input readonly type="text" name="ex_accDateTime" id="ex_accDateTime" class="form-control form-control-sm mt-1" value="{datenow}">
                    </div>
                </div>
                <input type="text" name="crfex_userecodemodify" id="crfex_userecodemodify" value="{ecode}">
                <input type="text" name="crfex_userdeptcodemodify" id="crfex_userdeptcodemodify" value="{deptcode}">
                <input type="text" name="accCusCode_getCusid" id="accCusCode_getCusid" value="{crfex_customerid}">
                <div class="row form-group ">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><button type="submit" class="btn btn-info btn-block" id="ex_accSubmit" name="ex_accSubmit">Submit</button></div>
                </div>
            </form>


            <form method="POST" name="" class="accAddCustomerCode1" style="display:none;">
                <hr>
                <h6><b><u>FOR ACCOUNT ADD CUSTOMER CODE</u></b></h6>
                <div class="row form-group">
                    <div class="col-md-8 form-group">
                        <label for="">CUSTOMER CODE</label>
                        <input readonly type="text" name="ex_accCostomerCode" id="ex_accCostomerCode" class="form-control form-control-sm" value="{customercode}">
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="">Memo.</label>
                        <textarea readonly name="ex_accMemo" id="ex_accMemo" cols="30" rows="3" class="form-control form-control-sm">{crfex_accmemo}</textarea>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">ACCOUNT Sign.</label>
                        <input readonly type="text" name="ex_accName" id="ex_accName" class="form-control form-control-sm" value="{crfex_accuserpost}">
                        <input readonly type="text" name="ex_accDateTime" id="ex_accDateTime" class="form-control form-control-sm mt-1" value="{crfex_accdatetime}">
                    </div>
                </div>
            </form>
            <!-- account staff zone -->





        </div>
        <!-- กรอบฟอร์ม -->

    </div>




</body>

</html>