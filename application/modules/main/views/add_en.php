<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new form export</title>
</head>

<body>

    <div class="container bg-white p-3">


        <div class="mt-3 p-3" style="border:solid #ccc 1px; background-color:#F8F8FF;">
            <form action="<?= base_url('main/savedataEX') ?>" method="POST" id="form1" enctype="multipart/form-data">

                <!-- Document Head -->
                <div class="row form-group">
                    <div align="left" class="col-md-6">
                        <h3>CREDIT REQUEST FORM FOR EXPORT</h3>
                    </div>
                    <div align="right" class="col-md-6">
                        <h5>{formcode}</h5>
                    </div>
                </div>

                <input hidden type="text" name="checkAddPage" id="checkAddPage" value="{addExPage}">
                <input hidden type="text" name="checkAreaAddEn" id="checkAreaAddEn">


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


                <div id="alert_crfex_custype"></div>
                <div class="row form-group mt-3 p-2">
                    <div class="col-md-4 form-group">
                        <div class="form-check">
                            <input id="crfex_custype" class="form-check-input" type="radio" name="crfex_custype" value="1">
                            <label for="my-input" class="form-check-label">New customer.</label>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="form-check">
                            <input id="crfex_custype" class="form-check-input" type="radio" name="crfex_custype" value="2">
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


                <div class="row form-group mt-3 p-2" id="curcustopic_addpage" style="display:none;">
                    <div class="col-md-3 form-group">
                        <div class="form-check">
                            <input class="form-check-input " type="checkbox" name="crfex_curcustopic1_add" id="crfex_curcustopic1_add" value="Change customer information">
                            <label for="my-input" class="form-check-label">Change customer information.</label>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <div class="form-check">
                            <input class="form-check-input " type="checkbox" name="crfex_curcustopic2_add" id="crfex_curcustopic2_add" value="Change credit & term">
                            <label for="my-input" class="form-check-label">Change credit & term</label>
                        </div>
                    </div>
                </div>


            <!-- Check Customer id -->
                <input hidden type="text" name="getCusid" id="getCusid">

                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Date</label>
                        <input readonly type="text" name="crfex_datecreate" id="crfex_datecreate" value="{datenow}" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-4">
                        <label for="">Customer code</label>
                        <input type="text" name="crfex_customercode" id="crfex_customercode" class="form-control form-control-sm">
                        <div id="autoCusCodeEx"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="">Sales Reps</label>
                        <input type="text" name="crfex_salesreps" id="crfex_salesreps" class="form-control form-control-sm">
                        <div id="alert_crfex_salesreps"></div>
                    </div>
                </div>


                <hr>
                <h5 align="left"><u>CUSTOMER PROFILE</u></h5>

                <div class="row form-group">
                    <div class="col-md-6 form-group">
                        <label for="">Customer name (in English) : &nbsp;</label>
                        <input type="text" name="crfex_cusnameEN" id="crfex_cusnameEN" class="form-control form-control-sm">
                        <div id="alert_crfex_cusnameEN"></div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Customer name (in Thai)</label>
                        <input type="text" name="crfex_cusnameTH" id="crfex_cusnameTH" class="form-control form-control-sm">
                        <div id="alert_crfex_cusnameTH"></div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Address for invoicing</label>
                        <textarea name="crfex_address" id="crfex_address" cols="30" rows="3" class="form-control form-control-sm"></textarea>
                        <div id="alert_crfex_address"></div>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Tel</label>
                        <input type="text" name="crfex_tel" id="crfex_tel" class="form-control form-control-sm">
                        <div id="alert_crfex_tel"></div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Fax</label>
                        <input type="text" name="crfex_fax" id="crfex_fax" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-4">
                        <label for="">Email</label>
                        <input type="text" name="crfex_email" id="crfex_email" class="form-control form-control-sm">
                        <div id="alert_crfex_email"></div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-6 crfex_newfile">
                        <label for="">File upload</label>
                        <input type="file" name="crfex_file" id="crfex_file" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-6 crfex_oldfile">
                        <label for="">File upload</label>
                        <span id="crfex_fileShow"></span>
                    </div>
                </div>


                <hr>
                <h5 align="left"><u>PROPOSE FOR CREDIT LIMIT , CREDIT TERM AND CONDITION.</u></h5>

                <div class="row form-group mt-3">
                    <div class="col-md-6">
                        <label for="">Payment</label>
                        <input type="text" name="crfex_payment" id="crfex_payment" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group mt-3">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input name="crfex_creditlimit" id="crfex_creditlimit" type="number" class="form-control" placeholder="Propose credit limit." aria-label="Propose credit limit." aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">THB</span>
                            </div>
                        </div>
                        <div id="alert_crfex_creditlimit"></div>

                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <input name="crfex_term" id="crfex_term" type="number" class="form-control" placeholder="Term" aria-label="Term" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">days</span>
                            </div>
                        </div>
                        <div id="alert_crfex_term"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <input name="crfex_discount" id="crfex_discount" type="number" class="form-control" placeholder="Discount" aria-label="Discount" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row form-group">
                    <div class="col-md-6">

                        <div class="input-group mb-3">
                            <input name="crfex_creditlimit2" id="crfex_creditlimit2" type="number" class="form-control" placeholder="Current credit limit." aria-label="Current credit limit." aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">THB</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <input name="crfex_term2" id="crfex_term2" type="number" class="form-control" placeholder="Term" aria-label="Term" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">days</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <input name="crfex_discount2" id="crfex_discount2" type="number" class="form-control" placeholder="Discount" aria-label="Discount" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="">Company background and reason for credit revision.</label>
                        <textarea name="crfex_combg" id="crfex_combg" cols="30" rows="3" class="form-control form-control-sm"></textarea>
                    </div>
                </div>


                <label for="">History sales record ( previous 3 months )</label>
                <div class="row form-group">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_his_month1" id="crfex_his_month1" type="text" class="form-control" placeholder="Month" aria-label="Month" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_his_tvolume1" id="crfex_his_tvolume1" type="text" class="form-control" placeholder="Total volume" aria-label="Total volume" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">kg.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_histsales1" id="crfex_histsales1" type="text" class="form-control" placeholder="Total sales" aria-label="Total sales" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">THB</span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_his_month2" id="crfex_his_month2" type="text" class="form-control" placeholder="Month" aria-label="Month" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_his_tvolume2" id="crfex_his_tvolume2" type="text" class="form-control" placeholder="Total volume" aria-label="Total volume" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">kg.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_histsales2" id="crfex_histsales2" type="text" class="form-control" placeholder="Total sales" aria-label="Total sales" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">THB</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_his_month3" id="crfex_his_month3" type="text" class="form-control" placeholder="Month" aria-label="Month" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_his_tvolume3" id="crfex_his_tvolume3" type="text" class="form-control" placeholder="Total volume" aria-label="Total volume" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">kg.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input name="crfex_histsales3" id="crfex_histsales3" type="text" class="form-control" placeholder="Total sales" aria-label="Total sales" aria-describedby="basic-addon2">
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
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><button type="submit" name="usercrfex_submit" id="usercrfex_submit" class="btn btn-info btn-block">Submit</button></div>
                </div>






            </form>
        </div>
        <!-- กรอบฟอร์ม -->

    </div>




</body>

</html>