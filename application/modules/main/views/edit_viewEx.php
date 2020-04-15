<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Export</title>
</head>

<body>

    <div class="container  p-3" style="background-color:#FF9900">


        <div class="mt-3 p-3" style="border:solid #ccc 1px; background-color:#F8F8FF;">
            <form action="<?= base_url('main/saveEditdataEx/') ?>" method="POST" id="form1" enctype="multipart/form-data">

                <!-- Document Head -->
                <div class="row form-group">
                    <div align="left" class="col-md-6">
                        <h3>CREDIT REQUEST FORM FOR EXPORT</h3>
                    </div>
                    <div align="right" class="col-md-6">
                        <h5>{formcode}</h5>
                    </div>
                </div>


                <!-- Get data for check -->
                <input hidden type="text" name="checkEdit_crfex_company" id="checkEdit_crfex_company" value="{checkEdit-crfex_company}">
                <input hidden type="text" name="checkEditFormNo" id="checkEditFormNo" value="{checkEdit-crfex_formno}">
                <input hidden type="text" name="checkEditFormId" id="checkEditFormId" value="{checkEdit-crfex_id}">
                <input hidden type="text" name="checkEditPage" id="checkEditPage" value="{checkEditPage}">

                <div id="alert_crfex_company"></div>
                <div class="row form-group mt-3 p-2">
                    <div class="col-md-4 form-group">
                        <div class="form-check">
                            <input id="crf_company_sln" class="form-check-input" type="radio" name="crfex_company" value="sln">
                            <label for="my-input" class="form-check-label">Salee Colour Public Company Limited.</label>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check">
                            <input id="crf_company_poly" class="form-check-input" type="radio" name="crfex_company" value="poly">
                            <label for="my-input" class="form-check-label">Poly Meritasia Co.,Ltd.</label>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check">
                            <input id="crf_company_ca" class="form-check-input" type="radio" name="crfex_company" value="ca">
                            <label for="my-input" class="form-check-label">Composite Asia Co.,Ltd</label>
                        </div>
                    </div>
                </div>


                <!-- Check Edit data crfex_custype -->
                <input hidden type="text" name="checkEdit_crfex_custype" id="checkEdit_crfex_custype" value="{checkEdit-crfex_custype}">

                <div id="alert_crfex_custype"></div>
                <div class="row form-group mt-3 p-2">
                    <div class="col-md-4 form-group">
                        <div class="form-check">
                            <input id="crfex_custype1" class="form-check-input custype1e" type="radio" name="crfex_custype" value="1">
                            <label for="my-input" class="form-check-label">New customer.</label>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check">
                            <input id="crfex_custype2" class="form-check-input custype2e" type="radio" name="crfex_custype" value="2">
                            <label for="my-input" class="form-check-label">Current customer.</label>
                        </div>
                    </div>
                    <!-- <div class="col-md-4 form-group crfex_topic" style="display:none;">
                        <select name="crfex_curcustopic" id="crfex_curcustopic" class="form-control form-control-sm">
                            <option value="">Select Topic</option>
                            <option value="11">Change customer information</option>
                            <option value="12">Change credit & term</option>
                        </select>
                        <div id="alert_crfex_topic"></div>
                    </div> -->
                </div>


                <!-- Check Edit crfex_curcustopic1 , crfex_curcustopic2 -->
                <input hidden type="text" name="checkEdit_crfex_curcustopic1" id="checkEdit_crfex_curcustopic1" value="{checkEdit-crfex_curcustopic1}">
                <input hidden type="text" name="checkEdit_crfex_curcustopic2" id="checkEdit_crfex_curcustopic2" value="{checkEdit-crfex_curcustopic2}">

                <div class="row form-group mt-3 p-2">
                    <div class="col-md-3 form-group">
                        <div class="form-check">
                            <input class="form-check-input " type="checkbox" name="crfex_curcustopic1" id="crfex_curcustopic1" value="Change customer information.">
                            <label for="my-input" class="form-check-label">Change customer information.</label>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <div class="form-check">
                            <input class="form-check-input " type="checkbox" name="crfex_curcustopic2" id="crfex_curcustopic2" value="Change credit & term.">
                            <label for="my-input" class="form-check-label">Change credit & term</label>
                        </div>
                    </div>
                </div>


                <!-- Check Customer id -->

                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Date</label>
                        <input readonly type="text" name="crfex_datecreate" id="crfex_datecreate" value="{edit-crfex_datecreate}" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-4">
                        <label for="">Customer code</label>
                        <input readonly type="text" name="crfex_customercode" id="crfex_customercode" class="form-control form-control-sm" value="{edit-crfex_customercode}">
                        <div id="autoCusCodeEx"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="">Sales Reps</label>
                        <input type="text" name="crfex_salesreps" id="crfex_salesreps" class="form-control form-control-sm" value="{edit-crfex_salesreps}">
                        <div id="alert_crfex_salesreps"></div>
                    </div>
                </div>


                <hr>
                <h5 align="left"><u>CUSTOMER PROFILE</u></h5>

                <div class="row form-group">
                    <div class="col-md-6 form-group">
                        <label for="">Customer name (in English) : &nbsp;</label>
                        <input type="text" name="crfex_cusnameEN" id="crfex_cusnameEN" class="form-control form-control-sm" value="{edit-crfex_cusnameEN}">
                        <div id="alert_crfex_cusnameEN"></div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Customer name (in Thai)</label>
                        <input type="text" name="crfex_cusnameTH" id="crfex_cusnameTH" class="form-control form-control-sm" value="{edit-crfex_cusnameTH}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Address for invoicing</label>
                        <textarea name="crfex_address" id="crfex_address" cols="30" rows="3" class="form-control form-control-sm">{edit-crfex_address}</textarea>
                        <div id="alert_crfex_address"></div>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Tel</label>
                        <input type="text" name="crfex_tel" id="crfex_tel" class="form-control form-control-sm" value="{edit-crfex_tel}">
                        <div id="alert_crfex_tel"></div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Fax</label>
                        <input type="text" name="crfex_fax" id="crfex_fax" class="form-control form-control-sm" value="{edit-crfex_fax}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Email</label>
                        <input type="text" name="crfex_email" id="crfex_email" class="form-control form-control-sm" value="{edit-crfex_email}">
                        <div id="alert_crfex_email"></div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-6 crfex_newfile">
                        <label for="">File upload</label>
                        <input type="file" name="crfex_file" id="crfex_file" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-6 crfex_oldfile">
                        <label for="">File upload</label><br>
                        <a href="{edit-crfex_fileAdd}" target="_blank"><span id="crfex_fileShow">{edit-crfex_file}</span></a>
                        <input type="text" name="crfex_fileShowOld" id="crfex_fileShowOld" value="{edit-crfex_file}">
                    </div>
                </div>


                <hr>
                <h5 align="left"><u>PROPOSE FOR CREDIT LIMIT , CREDIT TERM AND CONDITION.</u></h5>

                <div class="row form-group mt-3">
                    <div class="col-md-6">
                        <label for="">Payment</label>
                        <input type="text" name="crfex_payment" id="crfex_payment" class="form-control" value="{edit-crfex_payment}">
                    </div>
                </div>
                <div class="row form-group mt-3">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input name="crfex_creditlimit" id="crfex_creditlimit" type="number" class="form-control" placeholder="Propose credit limit." aria-label="Propose credit limit." aria-describedby="basic-addon2" value="{edit-crfex_creditlimit}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">THB</span>
                            </div>
                        </div>
                        <div id="alert_crfex_creditlimit"></div>

                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <input name="crfex_term" id="crfex_term" type="number" class="form-control" placeholder="Term" aria-label="Term" aria-describedby="basic-addon2" value="{edit-crfex_term}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">days</span>
                            </div>
                        </div>
                        <div id="alert_crfex_term"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <input name="crfex_discount" id="crfex_discount" type="number" class="form-control" placeholder="Discount" aria-label="Discount" aria-describedby="basic-addon2" value="{edit-crfex_discount}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row form-group">
                    <div class="col-md-6">

                        <div class="input-group mb-3">
                            <input name="crfex_creditlimit2" id="crfex_creditlimit2" type="number" class="form-control" placeholder="Current credit limit." aria-label="Current credit limit." aria-describedby="basic-addon2" value="{edit-crfex_creditlimit2}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">THB</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <input name="crfex_term2" id="crfex_term2" type="number" class="form-control" placeholder="Term" aria-label="Term" aria-describedby="basic-addon2">
                            <div class="input-group-append" value="{edit-crfex_term2}">
                                <span class="input-group-text" id="basic-addon2">days</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <input name="crfex_discount2" id="crfex_discount2" type="number" class="form-control" placeholder="Discount" aria-label="Discount" aria-describedby="basic-addon2" value="{edit-crfex_discount2}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Company background and reason for credit revision.</label>
                        <textarea name="crfex_combg" id="crfex_combg" cols="30" rows="3" class="form-control form-control-sm">{edit-crfex_combg}</textarea>
                    </div>
                </div>


                <label for="">History sales record ( previous 3 months )</label>
                <div class="row form-group">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_his_month1" id="crfex_his_month1" type="text" class="form-control cusHistory" placeholder="Month" aria-label="Month" aria-describedby="basic-addon2" value="{edit-crfex_his_month1}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_his_tvolume1" id="crfex_his_tvolume1" type="text" class="form-control cusHistory" placeholder="Total volume" aria-label="Total volume" aria-describedby="basic-addon2" value="{edit-crfex_his_tvolume1}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">kg.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_histsales1" id="crfex_histsales1" type="text" class="form-control cusHistory" placeholder="Total sales" aria-label="Total sales" aria-describedby="basic-addon2" value="{edit-crfex_histsales1}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">THB</span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_his_month2" id="crfex_his_month2" type="text" class="form-control cusHistory" placeholder="Month" aria-label="Month" aria-describedby="basic-addon2" value="{edit-crfex_his_month2}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_his_tvolume2" id="crfex_his_tvolume2" type="text" class="form-control cusHistory" placeholder="Total volume" aria-label="Total volume" aria-describedby="basic-addon2" value="{edit-crfex_his_tvolume2}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">kg.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_histsales2" id="crfex_histsales2" type="text" class="form-control cusHistory" placeholder="Total sales" aria-label="Total sales" aria-describedby="basic-addon2" value="{edit-crfex_histsales2}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">THB</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_his_month3" id="crfex_his_month3" type="text" class="form-control cusHistory" placeholder="Month" aria-label="Month" aria-describedby="basic-addon2" value="{edit-crfex_his_month3}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_his_tvolume3" id="crfex_his_tvolume3" type="text" class="form-control cusHistory" placeholder="Total volume" aria-label="Total volume" aria-describedby="basic-addon2" value="{edit-crfex_his_tvolume3}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">kg.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_histsales3" id="crfex_histsales3" type="text" class="form-control cusHistory" placeholder="Total sales" aria-label="Total sales" aria-describedby="basic-addon2" value="{edit-crfex_histsales3}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">THB</span>
                            </div>
                        </div>
                    </div>
                </div>


                <hr>
                <h5><u>FOR USER POST</u></h5>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">User post</label>
                        <input readonly type="text" name="crfex_usercreate" id="crfex_usercreate" class="form-control form-control-sm" value="{username}">
                        <input hidden type="text" name="crfex_userecode" id="crfex_userecode" value="{ecode}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Dept.</label>
                        <input readonly type="text" name="" id="" class="form-control form-control-sm" value="{deptname}">
                        <input hidden type="text" name="crfex_userdeptcode" id="crfex_userdeptcode" value="{deptcode}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Datetime</label>
                        <input readonly type="text" name="crfex_userdatetime" id="crfex_userdatetime" class="form-control form-control-sm" value="{datenow}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><button type="reset" class="btn btn-warning btn-block" id="usercrfex_reset" name="usercrfex_reset" onclick="return location.reload()">Reset</button></div>
                    <div class="col-md-4"><button type="submit" name="usercrfex_edit" id="usercrfex_edit" class="btn btn-info btn-block">Edit</button></div>
                </div>






            </form>
        </div>
        <!-- กรอบฟอร์ม -->

    </div>




</body>

</html>