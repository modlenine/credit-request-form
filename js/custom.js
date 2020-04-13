$(document).ready(function () {


    // Date pickup use 	// Date pickup use 	// Date pickup use
    // Date pickup use 	// Date pickup use 	// Date pickup use
    $('.datapicker').pickadate({
        monthsFull: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฏาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
        weekdaysShort: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
        today: 'วันนี้',
        clear: 'ล้าง',
        format: 'dd-mm-yyyy',
        formatSubmit: 'yyyy-mm-dd',
        hiddenName: true,
        editable: true
    });


    // Set Default Form  // Set Default Form 
    // Customer Code
    $('#crf_customercode').prop('readonly', true);

    // Sales Reps
    $('#crf_salesreps').prop('readonly', true);

    // ชื่อลูกค้า :
    $('#crf_customername').prop('readonly', true);

    // ที่อยู่สำหรับการเปิดใบกำกับภาษี :
    $('#crf_addressname').prop('readonly', true);

    // ผู้ติดต่อ
    $('#crf_namecontact').prop('readonly', true);

    // เบอร์โทร
    $('#crf_telcontact').prop('readonly', true);

    // เบอร์แฟกซ์
    $('#crf_faxcontact').prop('readonly', true);

    // อีเมล
    $('#crf_emailcontact').prop('readonly', true);

    // ทุนจดทะเบียน
    $('#crf_regiscost').prop('readonly', true);

    // คาดการณ์ปริมาณการขาย
    $('#crf_forecast').prop('readonly', true);

    $('#user_submit').prop('disabled', true);
    // Set Default Form    // Set Default Form 




    //Control Radio crf_type Control หัวข้อ ลูกค้าใหม่ , ลูกค้าเดิม //Control Radio crf_type Control หัวข้อ ลูกค้าใหม่ , ลูกค้าเดิม
    //Control Radio crf_type Control หัวข้อ ลูกค้าใหม่ , ลูกค้าเดิม //Control Radio crf_type Control หัวข้อ ลูกค้าใหม่ , ลูกค้าเดิม

    $('.suboldcustomer').css('display', 'none');

    $('input[name=crf_type]').click(function () {

        // Check การเลือกบริษัท หากไม่ได้เลือกจะไม่สามารถไป Step ต่อไปได้
        var crf_company = $('input[type="radio"][name=crf_company]:checked');
        if (crf_company.length < 1) {
            $('#alert_company').html('<div class="alert alert-danger" role="alert">กรุณาเลือกบริษัทด้วยค่ะ</div>');;
            $('input[name=crf_type]').prop('checked', false);
            exit;
        } else {
            $('#alert_company').fadeOut();
        }
        // Check การเลือกบริษัท หากไม่ได้เลือกจะไม่สามารถไป Step ต่อไปได้

        //Control credit term
        // Control Sub old customer กรณีลูกค้าเดิม
        // 2 = ลูกค้าเดิม
        if ($(this).val() == 2) {
            var unclick = 'return false';
            $('#alert_custype').html('');

            $('.suboldcustomer').css('display', '');

            // Set Readonly

            // Customer Code
            $('#crf_customercode').prop('readonly', false);

            // Sales Reps
            $('#crf_salesreps').prop('readonly', true);

            // ชื่อลูกค้า :
            $('#crf_customername').prop('readonly', true);

            // ที่อยู่สำหรับการเปิดใบกำกับภาษี :
            $('#crf_addressname').prop('readonly', true);

            // ผู้ติดต่อ
            $('#crf_namecontact').prop('readonly', true);

            // เบอร์โทร
            $('#crf_telcontact').prop('readonly', true);

            // เบอร์แฟกซ์
            $('#crf_faxcontact').prop('readonly', true);

            // อีเมล
            $('#crf_emailcontact').prop('readonly', true);

            // ทุนจดทะเบียน
            $('#crf_regiscost').prop('readonly', true);

            // คาดการณ์ปริมาณการขาย
            $('#crf_forecast').prop('readonly', true);

            //วันที่ก่อตั้ง
           $('#crf_cuscompanycreate').prop('readonly', true);

            //วงเงิน
            $('.finance_request_detail').css('display' , '');
            $('#crf_finance_req_number').prop('readonly', true);


            // Default upload file
            $('.crf_file1 , .crf_file2 , .crf_file3 , .crf_file4 , .crf_file5 , .crf_file6').css('display', 'none');

            // Control radio button
            $('input:radio[name="crf_addresstype"],[name="crf_companytype"],[name="crf_typeofbussi"],[name="crf_condition_bill"],[name="crf_condition_money"],[name="crf_finance"]').prop('disabled' , true);

            // Control Credit Term
            $('#crf_creditterm').prop('disabled' , true);


            // Control กรณีเลือก เปลี่ยนเขตการขาย
            $('input:checkbox[name="crf_sub_oldcus_changearea"]').click(function () {
                if ($(this).prop("checked") == true) {
                    $('#crf_salesreps').prop('readonly', false);
                    // $('.crf_file1 , .crf_file2 , .crf_file3 , .crf_file4 , .crf_file5 , .crf_file6').css('display', 'none');
                    // $('input:radio[name="crf_addresstype"],[name="crf_companytype"],[name="crf_typeofbussi"],[name="crf_condition_bill"],[name="crf_condition_money"],[name="crf_finance"]').prop('disabled' , true);
                    // $('#crf_creditterm').prop('disabled' , true);
                    $('inpur:checkbox').prop('disabled' ,true);
                    $('#crf_salesreps').keyup(function(){
                        if($(this).val() != ''){
                            $('#user_submit').prop('disabled' , false);
                        }
                    });
                } else {
                    $('#crf_salesreps').prop('readonly', false);
                    // $('.crf_file1 , .crf_file2 , .crf_file3 , .crf_file4 , .crf_file5 , .crf_file6').css('display', '');
                }
            });


            // Control กรณีเลือก เปลี่ยนที่อยู่
            $('input:checkbox[name="crf_sub_oldcus_changeaddress"]').click(function () {

                if ($(this).prop("checked") == true) {
                    $('#crf_addressname , #crf_namecontact , #crf_telcontact , #crf_faxcontact , #crf_emailcontact , #crf_regiscost').prop('readonly', false);
                    $('.crf_file1').css('display', '');
                    $('input:radio[name="crf_addresstype"]').prop('disabled' , false);

                    $('#crf_addressname').blur(function (){
                        if($(this).val() == ''){
                            $('#crf_file1').prop('disabled' , true);
                            $('#user_submit').prop('disabled' , true);
                        }else{
                            $('#crf_file1').prop('disabled' , false);
                        }
                    });
                    $('#crf_file1').change(function(){
                        if($(this).val() != ''){
                            $('#user_submit').prop('disabled' , false);
                        }else{
                            $('#user_submit').prop('disabled' , true);
                        }
                    });

                } else {
                    $('#crf_addressname').prop('readonly', false);
                    // $('.crf_file2 , .crf_file3 , .crf_file4 , .crf_file5 , .crf_file6').css('display', '');
                    $('input:radio[name="crf_addresstype"]').prop('disabled' , true);
                    $('.crf_file1').css('display', 'none');
                    $('#crf_addressname').prop('readonly', true);
                }
            });


            // Control กรณีเลือกปรับ Credit term
            $('input:checkbox[name="crf_sub_oldcus_changecredit"]').click(function () {

                if ($(this).prop("checked") == true) {
                    $('.change_credit').css('display', '');
                    $('input[name=crf_change_creditterm]').prop('checked', true);
                    $('.change_credit_detail').css('display', '');
                    $('#crf_condition_credit').attr('required','');
                    $('#crf_creditterm').prop('readonly' , true);
                } else {
                    $('.change_credit').css('display', 'none');
                    $('input[name=crf_change_creditterm]').prop('checked', false);
                    $('.change_credit_detail').css('display', 'none');
                }

                $('#crf_condition_credit').change(function(){
                    $('.showcredit2').remove();
                    var creditMethod = $(this).val();
                    var oldCredit = $('#oldCreditTerm').val();
                    filterCreditTerm(oldCredit , creditMethod);
                    if($(this).val() != ''){
                        $('#user_submit').prop('disabled' , false);
                    }else{
                        $('#user_submit').prop('disabled' , true);
                    }
                });
            });
            


            // Control กรณีเลือกปรับ ปรับวงเงิน
            $('input:checkbox[name="crf_sub_oldcus_changefinance"]').click(function () {

                if ($(this).prop("checked") == true) {
                    $('.finance_change_detail').css('display', '');
                    $('input[name=crf_finance]').prop('checked', true);

                    $('#crf_finance_change_status').change(function(){
                        $('#showChangeStatus').val($(this).val());
                    });

                    $('#value_crf_finance').val('ปรับวงเงิน');
                   
                    
                    $('#crf_finance_change_number').keyup(function(){
                        var oldmoney = parseInt($('#crf_finance_req_number_calc').val());
                        var newmoney = parseInt($(this).val())
                        if($('#showChangeStatus').val() == 'เพิ่ม'){
                            $('#crf_finance_change_total').val(oldmoney+newmoney);
                        }else if($('#showChangeStatus').val() == 'ลด'){
                            $('#crf_finance_change_total').val(oldmoney-newmoney);
                        }
                       
                        $('#crf_finance_change_total').val(function (index, value) {
                            return value
                                .replace(/\D/g, "")
                                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                                ;
                        });
                        if($(this).val() != ''){
                            $('#user_submit').prop('disabled' , false);
                        }else{
                            $('#user_submit').prop('disabled' , true);
                        }
                    });
                    
                    
                } else {
                    $('.finance_change_detail').css('display', 'none');
                    $('input[name=crf_finance]').prop('checked', false);
                }
            });

            // Check Sub old Customer ว่ามีการเลือกประเภทหรือไม่
            $('#crf_customercode').focus(function () {
                var crf_sub_oldcus = $('input[type="checkbox"][id="crf_sub_oldcus"]:checked');
                if (crf_sub_oldcus.length < 1) {
                    $('#alert_crf_sub_oldcus').html('<div class="alert alert-danger" role="alert">กรุณาเลือกประเภทการดำเนินการด้วยค่ะ</div>');
                    $('#crf_customercode').val('');
                } else {
                    $('#alert_crf_sub_oldcus').html('');
                }
            });
            $('#crf_customercode').keyup(function () {
                var crf_sub_oldcus = $('input[type="checkbox"][id="crf_sub_oldcus"]:checked');
                if (crf_sub_oldcus.length < 1) {
                    $('#alert_crf_sub_oldcus').html('<div class="alert alert-danger" role="alert">กรุณาเลือกประเภทการดำเนินการด้วยค่ะ</div>');
                    $('#crf_customercode').val('');
                } else {
                    $('#alert_crf_sub_oldcus').html('');
                }
            });
            $('#alert_crf_sub_oldcus').fadeIn();
            // Check Sub old Customer ว่ามีการเลือกประเภทหรือไม่

            $('#crf_finance').prop('checked', false);
            // $('.finance_request_detail').css('display', 'none');


            // Alert Sales Reps
            $('#alert_salesreps').html('');
            // Clear Sales Reps
            $('#crf_salesreps').val('');


            // Check ข้อมูลช่อง Sale Rep ว่ามีการกรอกข้อมูลหรือไม่
            $('#crf_salesreps').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_salesreps').html('<div class="alert alert-danger" role="alert">กรุณาระบุข้อมูล Sales Reps ด้วยค่ะ</div>');
                    $('#crf_customername').val('');
                }
            });
            $('#crf_customername').focus(function () {
                if ($('#crf_salesreps').val() == '') {
                    $('#alert_salesreps').html('<div class="alert alert-danger" role="alert">กรุณาระบุข้อมูล Sales Reps ด้วยค่ะ</div>');
                } else {
                    $('#alert_salesreps').html('');
                }
            });
            $('#crf_customername').keyup(function () {
                if ($('#crf_salesreps').val() == '') {
                    $('#alert_salesreps').html('<div class="alert alert-danger" role="alert">กรุณาระบุข้อมูล Sales Reps ด้วยค่ะ</div>');
                    $('#crf_customername').val('');
                } else {
                    $('#alert_salesreps').html('');
                    $('#alert_customername').html('');
                }
            });
            // Check ข้อมูลช่อง Sale Rep ว่ามีการกรอกข้อมูลหรือไม่


            // Check ข้อมูลช่อง ชื่อลูกค้าว่ามีการกรอกข้อมูลหรือไม่
            $('#crf_cuscompanycreate').focus(function () {
                if ($('#crf_customername').val() == '') {
                    $('#alert_customername').html('<div class="alert alert-danger" role="alert">กรุณาระบุชื่อลูกค้าด้วยค่ะ</div>');
                    $('#crf_cuscompanycreate').val('');
                } else {
                    $('#alert_customername').html('');
                }
            });
            $('#crf_customername').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_customername').html('<div class="alert alert-danger" role="alert">กรุณาระบุชื่อลูกค้าด้วยค่ะ</div>');
                } else {
                    $('#alert_customername').html();
                }
            });
            // Check ข้อมูลช่อง ชื่อลูกค้าว่ามีการกรอกข้อมูลหรือไม่


            // Check วันที่ก่อตั้งว่ามีการเลือกหรือไม่ // Check วันที่ก่อตั้งว่ามีการเลือกหรือไม่
            $('#crf_cuscompanycreate').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_cuscompanycreate').html('<div class="alert alert-danger" role="alert">กรุณาระบุวันที่ก่อตั้งด้วยค่ะ</div>');
                } else {
                    $('#alert_cuscompanycreate').html('');
                }
            });

            $('#crf_cuscompanycreate').change(function () {
                if ($(this).val() == '') {
                    $('#alert_cuscompanycreate').html('<div class="alert alert-danger" role="alert">กรุณาระบุวันที่ก่อตั้งด้วยค่ะ</div>');
                } else {
                    $('#alert_cuscompanycreate').html('');
                }
            });

            $('#crf_addressname').focus(function () {
                if ($('#crf_cuscompanycreate').val() == '') {
                    $('#alert_cuscompanycreate').html('<div class="alert alert-danger" role="alert">กรุณาระบุวันที่ก่อตั้งด้วยค่ะ</div>');
                    $('#crf_addressname').val('');
                } else {
                    $('#alert_cuscompanycreate').html('');
                }

                var crf_addresstype = $('input:radio[name="crf_addresstype"]:checked');
                if (crf_addresstype.length < 1) {
                    $('#alert_addresstype').html('<div class="alert alert-danger" role="alert">กรุณาเลือกที่อยู่สำหรับเปิดใบกำกับภาษีด้วยค่ะ</div>');
                    $('#crf_addressname').val('');
                } else {
                    $('#alert_addresstype').html('');
                }
            });

            $('#crf_addressname').keyup(function () {
                if ($('#crf_cuscompanycreate').val() == '') {
                    $('#alert_cuscompanycreate').html('<div class="alert alert-danger" role="alert">กรุณาระบุวันที่ก่อตั้งด้วยค่ะ</div>');
                    $('#crf_addressname').val('');
                }

                var crf_addresstype = $('input:radio[name="crf_addresstype"]:checked');
                if (crf_addresstype.length < 1) {
                    $('#alert_addresstype').html('<div class="alert alert-danger" role="alert">กรุณาเลือกที่อยู่สำหรับเปิดใบกำกับภาษีด้วยค่ะ</div>');
                    $('#crf_addressname').val('');
                } else {
                    $('#alert_addresstype').html('');
                }
            });
            // Check วันที่ก่อตั้งว่ามีการเลือกหรือไม่ // Check วันที่ก่อตั้งว่ามีการเลือกหรือไม่


            // Check Address Name Check Address Name Check Address Name
            $('#crf_addressname').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_addressname').html('<div class="alert alert-danger" role="alert">กรุณาระบุที่อยู่สำหรับการเปิดใบกำกับภาษีด้วยค่ะ</div>');
                } else {
                    $('#alert_addressname').html('');
                }
            });
            $('#crf_addressname').keyup(function () {
                if ($(this).val() != '') {
                    $('#alert_addressname').html('');
                }
            });
            $('#crf_namecontact').focus(function () {
                if ($('#crf_addressname').val() == '') {
                    $('#alert_addressname').html('<div class="alert alert-danger" role="alert">กรุณาระบุที่อยู่สำหรับการเปิดใบกำกับภาษีด้วยค่ะ</div>');
                    $('#crf_namecontact').val('');
                } else {
                    $('#alert_addressname').html('');
                }
            });
            $('#crf_namecontact').keyup(function () {
                if ($('#crf_addressname').val() == '') {
                    $('#alert_addressname').html('<div class="alert alert-danger" role="alert">กรุณาระบุที่อยู่สำหรับการเปิดใบกำกับภาษีด้วยค่ะ</div>');
                    $('#crf_namecontact').val('');
                } else {
                    $('#alert_addressname').html('');
                }
            });
            // Check Address Name Check Address Name Check Address Name


            // Check ช่องผู้ติดต่อว่ามีการกรอกข้อมูลเข้ามาหรือไม่
            $('#crf_namecontact').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_namecontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุชื่อผู้ติดต่อด้วยค่ะ</div>');
                } else {
                    $('#alert_namecontact').html('');
                }
            });
            $('#crf_telcontact').focus(function () {
                if ($('#crf_namecontact').val() == '') {
                    $('#alert_namecontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุชื่อผู้ติดต่อด้วยค่ะ</div>');
                    $('#crf_telcontact').val('');
                } else {
                    $('#alert_namecontact').html('');
                }
            });
            $('#crf_telcontact').keyup(function () {
                if ($('#crf_namecontact').val() == '') {
                    $('#alert_namecontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุชื่อผู้ติดต่อด้วยค่ะ</div>');
                    $('#crf_telcontact').val('');
                } else {
                    $('#alert_namecontact').html('');
                }
            });
            $('#crf_namecontact').keyup(function () {
                if ($(this).val() != '') {
                    $('#alert_namecontact').html('');
                }
            });
            // Check ช่องผู้ติดต่อว่ามีการกรอกข้อมูลเข้ามาหรือไม่



            // Check ช่องเบอร์โทรว่ามีการกรอกข้อมูลหรือไม่
            $('#crf_telcontact').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_telcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุเบอร์ผู้ติดต่อด้วยค่ะ</div>');
                } else {
                    $('#alert_telcontact').html('');
                }
            });
            $('#crf_emailcontact').focus(function () {
                if ($('#crf_telcontact').val() == '') {
                    $('#alert_telcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุเบอร์ผู้ติดต่อด้วยค่ะ</div>');
                    $('#crf_emailcontact').val('');
                } else {
                    $('#alert_telcontact').html('');
                }
            });
            $('#crf_emailcontact').keyup(function () {
                if ($('#crf_telcontact').val() == '') {
                    $('#alert_telcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุเบอร์ผู้ติดต่อด้วยค่ะ</div>');
                    $('#crf_emailcontact').val('');
                } else {
                    $('#alert_telcontact').html('');
                }
            });
            $('#crf_telcontact').keyup(function () {
                if ($(this).val() != '') {
                    $('#alert_telcontact').html('');
                }
            });
            // Check ช่องเบอร์โทรว่ามีการกรอกข้อมูลหรือไม่


            // Check ช่อง อีเมลว่ามีการกรอกข้อมูลหรือไม่
            $('#crf_emailcontact').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_emailcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุอีเมลผู้ติดต่อด้วยค่ะ</div>');
                } else {
                    $('#alert_emailcontact').html('');
                }
            });
            $('#crf_regiscost').focus(function () {
                if ($('#crf_emailcontact').val() == '') {
                    $('#alert_emailcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุอีเมลผู้ติดต่อด้วยค่ะ</div>');
                    $('#crf_regiscost').val('');
                } else {
                    $('#alert_emailcontact').html('');
                }
            });
            $('#crf_regiscost').keyup(function () {
                if ($('#crf_emailcontact').val() == '') {
                    $('#alert_emailcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุอีเมลผู้ติดต่อด้วยค่ะ</div>');
                    $('#crf_regiscost').val('');
                } else {
                    $('#alert_emailcontact').html('');
                }
            });
            $('#crf_emailcontact').keyup(function () {
                if ($(this).val() != '') {
                    $('#alert_emailcontact').html('');
                }
            });
            // Check ช่อง อีเมลว่ามีการกรอกข้อมูลหรือไม่


            // Check ช่อง ทุนจดทะเบียน
            $('#crf_regiscost').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_regiscost').html('<div class="alert alert-danger" role="alert">กรุณาระบุทุนจดทะเบียนด้วยค่ะ</div>');
                } else {
                    $('#alert_regiscost').html('');
                }
            });
            $('input:radio[name="crf_companytype"]').click(function () {
                if ($('#crf_regiscost').val() == '') {
                    $('#alert_regiscost').html('<div class="alert alert-danger" role="alert">กรุณาระบุทุนจดทะเบียนด้วยค่ะ</div>');
                    $('#crf_regiscost').val('');
                } else {
                    $('#alert_regiscost').html('');
                }

                $('#crf_companytype2 , #crf_companytype3_1_1 , #crf_companytype3_1_2 , #crf_companytype3_2_1 , #crf_companytype3_2_2').val('');
            });
            // $('#crf_regiscost').keyup(function(){
            //     if($('#crf_emailcontact').val() == ''){
            //         $('#alert_emailcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุอีเมลผู้ติดต่อด้วยค่ะ</div>');
            //         $('#user_submit').prop('disabled' , true);
            //         $('#crf_regiscost').val('');
            //     }else{
            //         $('#alert_emailcontact').html('');
            //         $('#user_submit').prop('disabled' , false);
            //     }
            // });
            $('#crf_regiscost').keyup(function () {
                if ($(this).val() != '') {
                    $('#alert_regiscost').html('');
                }
            });
            // Check ช่อง ทุนจดทะเบียน



            // Check ช่องรายชื่อบุคคลในแต่ระดับบริหารที่สำคัญ
            // $('#crf_primanage_dept , #crf_primanage_name , #crf_primanage_posi , #crf_primanage_email').blur(function () {
            //     if ($(this).val() == '') {
            //         $('#alert_primanage').html('<div class="alert alert-danger" role="alert">กรุณาระบุข้อมูลให้ครบถ้วนด้วยค่ะ</div>');
            //         // $('input:radio[name="crf_typeofbussi"]').prop('checked', false);
            //         $('#user_submit').prop('disabled' , true);
            //         exit;
            //     } else {
            //         $('#alert_primanage').html('');
            //         $('#user_submit').prop('disabled' , false);
            //     }
            // });


            $('input:radio[name="crf_typeofbussi"]').click(function () {
                if ($('#crf_primanage_dept').val() == '' || $('#crf_primanage_name').val() == '' || $('#crf_primanage_posi').val() == '' || $('#crf_primanage_email').val() == '') {
                    $('#alert_primanage').html('<div class="alert alert-danger" role="alert">กรุณาระบุข้อมูลให้ครบถ้วนด้วยค่ะ</div>');
                    // $('input:radio[name="crf_typeofbussi"]').prop('checked', false);
                    exit;
                } else {
                    $('#alert_primanage').html('');
                }
            });

            // $('#crf_regiscost').keyup(function(){
            //     if($('#crf_emailcontact').val() == ''){
            //         $('#alert_emailcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุอีเมลผู้ติดต่อด้วยค่ะ</div>');
            //         $('#user_submit').prop('disabled' , true);
            //         $('#crf_regiscost').val('');
            //     }else{
            //         $('#alert_emailcontact').html('');
            //         $('#user_submit').prop('disabled' , false);
            //     }
            // });
            $('#crf_primanage_dept , #crf_primanage_name , #crf_primanage_posi , #crf_primanage_email').keyup(function () {
                if ($(this).val() != '') {
                    $('#alert_primanage').html('');
                }

                var crf_companytype = $('input:radio[name="crf_companytype"]:checked');
                if (crf_companytype.length < 1) {
                    $(this).val('');
                    $('#alert_companytype').html('<div class="alert alert-danger" role="alert">กรุณาเลือกประเภทบริษัทด้วยค่ะ</div>');
                } else {
                    $('#alert_primanage').html('');
                    $('#alert_companytype').html('');
                }
            });
            // Check ช่องรายชื่อบุคคลในแต่ระดับบริหารที่สำคัญ




            // Check ประเภทของ ธุรกิจว่ามีการเลือกข้อมูลหรือไม่
            $(document).on('change', 'input[type="checkbox"][id="crf_process"]:checked', function () {
                var crf_typeofbussi = $('input:radio[name="crf_typeofbussi"]:checked');
                if (crf_typeofbussi.length < 1) {
                    $('#alert_typeofbussi').html('<div class="alert alert-danger" role="alert">กรุณาเลือกประเภทธุรกิจด้วยค่ะ</div>');
                    $(this).prop('checked', false);
                    exit;
                } else {
                    $('#alert_typeofbussi').html('');
                }

            });
            // Check ประเภทของ ธุรกิจว่ามีการเลือกข้อมูลหรือไม่


            // Check กระบวนการผลิตว่ามีการเลือกข้อมูลเข้ามาหรือไม่
            $('#crf_forecast').focus(function () {
                var crf_process = $('input[type="checkbox"][id="crf_process"]:checked');
                if (crf_process.length < 1) {
                    $('#alert_process').html('<div class="alert alert-danger" role="alert">กรุณาเลือกกระบวนการผลิตหลักด้วยค่ะ</div>');
                    $(this).val('');
                } else {
                    $('#alert_process').html('');
                }
            });
            $('#crf_forecast').keyup(function () {
                var crf_process = $('input[type="checkbox"][id="crf_process"]:checked');
                if (crf_process.length < 1) {
                    $('#alert_process').html('<div class="alert alert-danger" role="alert">กรุณาเลือกกระบวนการผลิตหลักด้วยค่ะ</div>');
                    $(this).val('');
                } else {
                    $('#alert_process').html('');
                }

                if ($(this).val() != '') {
                    $('#alert_forecast').html('');
                }
            });
            // Check กระบวนการผลิตว่ามีการเลือกข้อมูลเข้ามาหรือไม่


            // Check คาดการปริมาณการขายว่ามีการกรอกข้อมูลงไปหรือไม่
            $('#crf_forecast').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_forecast').html('<div class="alert alert-danger" role="alert">กรุณาระบุรายละเอียดคาดการปริมาณการขายด้วยค่ะ</div>');
                } else {
                    $('#alert_forecast').html('');
                }
            });
            // Check คาดการปริมาณการขายว่ามีการกรอกข้อมูลงไปหรือไม่



            // Check File Upload ว่ามีการอัพโหลดไฟล์หรือยังก่อ่นที่จะเลือก Credit term
            // $('#crf_creditterm').change(function () {

            //     if ($(this).val() != '') {
            //         $('#alert_creditterm').html('');
            //         $('input:radio[name="crf_condition_bill"]').prop('disabled', false);
            //     } else {
            //         $('#alert_creditterm').html('<div class="alert alert-danger" role="alert">กรุณาเลือก Credit Term ด้วยค่ะ</div>');
            //         $('input:radio[name="crf_condition_bill"]').prop('checked', false);
            //         $('input:radio[name="crf_condition_bill"]').prop('disabled', true);

            //         $('input:radio[name="crf_condition_money"]').prop('checked', false);
            //     }

            //     if ($('#crf_file1').val() == '') {
            //         $('#alert_file1').html('<div class="alert alert-danger" role="alert">กรุณาอัพโหลดไฟล์ ภพ.20 ด้วยค่ะ</div>');
            //         $('#crf_creditterm').val('');
            //     } else {
            //         $('#alert_file1').html('');
            //     }

            //     if ($('#crf_file2').val() == '') {
            //         $('#alert_file2').html('<div class="alert alert-danger" role="alert">กรุณาอัพโหลดไฟล์ หนังสือรับรอง ด้วยค่ะ</div>');
            //         $('#crf_creditterm').val('');
            //     } else {
            //         $('#alert_file2').html('');
            //     }

            //     if ($('#crf_file3').val() == '') {
            //         $('#alert_file3').html('<div class="alert alert-danger" role="alert">กรุณาอัพโหลดไฟล์ ข้อมูลทั่วไป ด้วยค่ะ</div>');
            //         $('#crf_creditterm').val('');
            //     } else {
            //         $('#alert_file3').html('');
            //     }

            //     if ($('#crf_file4').val() == '') {
            //         $('#alert_file4').html('<div class="alert alert-danger" role="alert">กรุณาอัพโหลดไฟล์ งบแสดงฐานะทางการเงิน ด้วยค่ะ</div>');
            //         $('#crf_creditterm').val('');
            //     } else {
            //         $('#alert_file4').html('');
            //     }

            //     if ($('#crf_file5').val() == '') {
            //         $('#alert_file5').html('<div class="alert alert-danger" role="alert">กรุณาอัพโหลดไฟล์ งบกำไรขาดทุน ด้วยค่ะ</div>');
            //         $('#crf_creditterm').val('');
            //     } else {
            //         $('#alert_file5').html('');
            //     }

            //     if ($('#crf_file6').val() == '') {
            //         $('#alert_file6').html('<div class="alert alert-danger" role="alert">กรุณาอัพโหลดไฟล์ อัตราส่วนสภาพคล่อง ด้วยค่ะ</div>');
            //         $('#crf_creditterm').val('');
            //     } else {
            //         $('#alert_file6').html('');
            //     }
            // });
            // Check File Upload ว่ามีการอัพโหลดไฟล์หรือยังก่อ่นที่จะเลือก Credit term


            // Check Upload File 1 - 6 Element
            $('#crf_file1').change(function () {
                if ($(this).val() != '') {
                    $('#alert_file1').html('');
                }
            });

            $('#crf_file2').change(function () {
                if ($(this).val() != '') {
                    $('#alert_file2').html('');
                }
            });

            $('#crf_file3').change(function () {
                if ($(this).val() != '') {
                    $('#alert_file3').html('');
                }
            });

            $('#crf_file4').change(function () {
                if ($(this).val() != '') {
                    $('#alert_file4').html('');
                }
            });

            $('#crf_file5').change(function () {
                if ($(this).val() != '') {
                    $('#alert_file5').html('');
                }
            });

            $('#crf_file6').change(function () {
                if ($(this).val() != '') {
                    $('#alert_file6').html('');
                }
            });
            // Check Upload File 1 - 6 Element


            // Check Credit Term ว่ามีการเลือกหรือไม่
            $('input:radio[name="crf_condition_bill"]').click(function () {
                if ($('#crf_creditterm').val() == '') {
                    $('#alert_creditterm').html('<div class="alert alert-danger" role="alert">กรุณาเลือก Credit Term ด้วยค่ะ</div>');
                    $('input:radio[name="crf_condition_bill"]').prop('checked', false);
                    $('input:radio[name="crf_condition_bill"]').prop('disabled', true);
                    exit;
                } else {
                    $('#alert_creditterm').html('');
                }


            });
            // Check Credit Term ว่ามีการเลือกหรือไม่


            // Check เงื่อนไขการวางบิล ว่าได้มีการเลือกแล้วหรือยัง
            $('input:radio[name="crf_condition_money"]').click(function () {
                var crf_condition_bill = $('input:radio[name=crf_condition_bill]:checked');
                if (crf_condition_bill.length < 1) {
                    $('#alert_condition_bill').html('<div class="alert alert-danger" role="alert">กรุณาเลือกเงื่อนไขการวางบิลด้วยค่ะ</div>');
                    $('input:radio[name="crf_condition_money"]').prop('checked', false);
                    exit;
                } else {
                    $('#alert_condition_bill').html('');
                }
            });
            // Check เงื่อนไขการวางบิล ว่าได้มีการเลือกแล้วหรือยัง


            // Check เงื่อนไขการรับชำระเงินว่ามีการเลือกข้อมูลถูกต้องหรือไม่
            $('#crf_finance_req_number').focus(function () {
                var crf_condition_money = $('input:radio[name="crf_condition_money"]:checked');
                if (crf_condition_money.length < 1) {
                    $('#alert_condition_money').html('<div class="alert alert-danger" role="alert">กรุณาเลือกเงื่อนไขการชำระเงินด้วยค่ะ</div>');
                    $('#crf_finance_req_number').val('');
                } else {
                    if (crf_condition_money.val() == 'รับเช็ค') {
                        if ($('#crf_recive_cheuqetable').val() == '') {
                            $('#alert_recive_cheuqetable').html('<div class="alert alert-danger" role="alert">กรุณา แนบตารางวางบิล / รับเช็ค ด้วยค่ะ</div>');
                            $('#crf_finance_req_number').val('');
                        } else {
                            $('#alert_recive_cheuqetable').html('');
                        }

                        if ($('#crf_recive_cheuqedetail').val() == '') {
                            $('#alert_recive_cheuqedetail').html('<div class="alert alert-danger" role="alert">กรุณา รายละเอียดเพิ่มเติม ด้วยค่ะ</div>');
                            $('#crf_finance_req_number').val('');
                        } else {
                            $('#alert_recive_cheuqedetail').html('');
                        }
                    } else {
                        $('#alert_condition_money').html('');
                    }
                }
            });

            $('#crf_finance_req_number').keyup(function () {
                var crf_condition_money = $('input:radio[name="crf_condition_money"]:checked');
                if (crf_condition_money.length < 1) {
                    $('#alert_condition_money').html('<div class="alert alert-danger" role="alert">กรุณาเลือกเงื่อนไขการชำระเงินด้วยค่ะ</div>');
                    $('#crf_finance_req_number').val('');
                } else {
                    if (crf_condition_money.val() == 'รับเช็ค') {
                        if ($('#crf_recive_cheuqetable').val() == '') {
                            $('#alert_recive_cheuqetable').html('<div class="alert alert-danger" role="alert">กรุณา แนบตารางวางบิล / รับเช็ค ด้วยค่ะ</div>');
                            $('#crf_finance_req_number').val('');
                        } else {
                            $('#alert_recive_cheuqetable').html('');
                        }

                        if ($('#crf_recive_cheuqedetail').val() == '') {
                            $('#alert_recive_cheuqedetail').html('<div class="alert alert-danger" role="alert">กรุณา รายละเอียดเพิ่มเติม ด้วยค่ะ</div>');
                            $('#crf_finance_req_number').val('');
                        } else {
                            $('#alert_recive_cheuqedetail').html('');
                        }
                    } else {
                        $('#alert_condition_money').html('');
                    }
                }
            });
            // Check เงื่อนไขการรับชำระเงินว่ามีการเลือกข้อมูลถูกต้องหรือไม่



            // Check ช่องวงเงินที่ต้องการว่ามีการกรอกข้อมูลหรือไม่
            $('#crf_finance_req_number').keyup(function () {
                if ($('#crf_finance_req_number').val() != '') {
                    // $('#user_submit').prop('disabled', false);
                }
            });

            $('#crf_finance_req_number').blur(function () {
                if ($('#crf_finance_req_number').val() != '') {
                    // $('#user_submit').prop('disabled', false);
                } else {
                    // $('#user_submit').prop('disabled', true);
                }
            });
            // Check ช่องวงเงินที่ต้องการว่ามีการกรอกข้อมูลหรือไม่



        } else if ($(this).val() == 1) {

            //
            $('#alert_crf_sub_oldcus').html('');

            $('#alert_custype').html('');
            // UnSet Readonly

            // Customer Code
            $('#crf_customercode').prop('readonly', true);

            // Sales Reps
            $('#crf_salesreps').prop('readonly', false);

            // ชื่อลูกค้า :
            $('#crf_customername').prop('readonly', false);

            // ที่อยู่สำหรับการเปิดใบกำกับภาษี :
            $('#crf_addressname').prop('readonly', false);

            // ผู้ติดต่อ
            $('#crf_namecontact').prop('readonly', false);

            // เบอร์โทร
            $('#crf_telcontact').prop('readonly', false);

            // เบอร์แฟกซ์
            $('#crf_faxcontact').prop('readonly', false);

            // อีเมล
            $('#crf_emailcontact').prop('readonly', false);

            // ทุนจดทะเบียน
            $('#crf_regiscost').prop('readonly', false);

            // คาดการณ์ปริมาณการขาย
            $('#crf_forecast').prop('readonly', false);



            $('.change_credit').css('display', 'none');
            $('.suboldcustomer').css('display', 'none');

            $('input:radio[class="crf_financev1"]').prop('checked', true);
            $('input:radio[class="crf_financev2"]').prop('disabled' , true);

            $('.finance_request_detail').css('display', '');

            // Clear ประเภทการดำเนินงาน
            $('#crf_sub_oldcus_changearea , #crf_sub_oldcus_changeaddress ,#crf_sub_oldcus_changecredit , #crf_sub_oldcus_changefinance').prop('checked', false);

            // Clear รหัสลูกค้า
            $('#crf_customercode').val('');

            // Clear Alert การเลือกประเภทการดำเนินการ
            $('#alert_crf_sub_oldcus').fadeOut();



            // Check ข้อมูลช่อง Sale Rep ว่ามีการกรอกข้อมูลหรือไม่
            $('#crf_salesreps').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_salesreps').html('<div class="alert alert-danger" role="alert">กรุณาระบุข้อมูล Sales Reps ด้วยค่ะ</div>');
                    $('#crf_customername').val('');
                }
            });
            $('#crf_customername').focus(function () {
                if ($('#crf_salesreps').val() == '') {
                    $('#alert_salesreps').html('<div class="alert alert-danger" role="alert">กรุณาระบุข้อมูล Sales Reps ด้วยค่ะ</div>');
                } else {
                    $('#alert_salesreps').html('');
                }
            });
            $('#crf_customername').keyup(function () {
                if ($('#crf_salesreps').val() == '') {
                    $('#alert_salesreps').html('<div class="alert alert-danger" role="alert">กรุณาระบุข้อมูล Sales Reps ด้วยค่ะ</div>');
                    $('#crf_customername').val('');
                } else {
                    $('#alert_salesreps').html('');
                    $('#alert_customername').html('');
                }
            });
            // Check ข้อมูลช่อง Sale Rep ว่ามีการกรอกข้อมูลหรือไม่


            // Check ข้อมูลช่อง ชื่อลูกค้าว่ามีการกรอกข้อมูลหรือไม่
            $('#crf_cuscompanycreate').focus(function () {
                if ($('#crf_customername').val() == '') {
                    $('#alert_customername').html('<div class="alert alert-danger" role="alert">กรุณาระบุชื่อลูกค้าด้วยค่ะ</div>');
                    $('#crf_cuscompanycreate').val('');
                } else {
                    $('#alert_customername').html('');
                }
            });
            $('#crf_customername').blur(function () {
                var cusname =  $('#crf_customername').val();
                if ($(this).val() == '') {
                    $('#alert_customername').html('<div class="alert alert-danger" role="alert">กรุณาระบุชื่อลูกค้าด้วยค่ะ</div>');
                } else {
                    $('#alert_customername').html('');
                    checkDuplicateNameCustomer(cusname);
                }
            });
            // Check ข้อมูลช่อง ชื่อลูกค้าว่ามีการกรอกข้อมูลหรือไม่


            // Check วันที่ก่อตั้งว่ามีการเลือกหรือไม่ // Check วันที่ก่อตั้งว่ามีการเลือกหรือไม่
            $('#crf_cuscompanycreate').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_cuscompanycreate').html('<div class="alert alert-danger" role="alert">กรุณาระบุวันที่ก่อตั้งด้วยค่ะ</div>');
                } else {
                    $('#alert_cuscompanycreate').html('');
                }
            });

            $('#crf_cuscompanycreate').change(function () {
                if ($(this).val() == '') {
                    $('#alert_cuscompanycreate').html('<div class="alert alert-danger" role="alert">กรุณาระบุวันที่ก่อตั้งด้วยค่ะ</div>');
                } else {
                    $('#alert_cuscompanycreate').html('');
                }
            });

            $('#crf_addressname').focus(function () {
                if ($('#crf_cuscompanycreate').val() == '') {
                    $('#alert_cuscompanycreate').html('<div class="alert alert-danger" role="alert">กรุณาระบุวันที่ก่อตั้งด้วยค่ะ</div>');
                    $('#crf_addressname').val('');
                } else {
                    $('#alert_cuscompanycreate').html('');
                }

                var crf_addresstype = $('input:radio[name="crf_addresstype"]:checked');
                if (crf_addresstype.length < 1) {
                    $('#alert_addresstype').html('<div class="alert alert-danger" role="alert">กรุณาเลือกที่อยู่สำหรับเปิดใบกำกับภาษีด้วยค่ะ</div>');
                    $('#crf_addressname').val('');
                } else {
                    $('#alert_addresstype').html('');
                }
            });

            $('#crf_addressname').keyup(function () {
                if ($('#crf_cuscompanycreate').val() == '') {
                    $('#alert_cuscompanycreate').html('<div class="alert alert-danger" role="alert">กรุณาระบุวันที่ก่อตั้งด้วยค่ะ</div>');
                    $('#crf_addressname').val('');
                }

                var crf_addresstype = $('input:radio[name="crf_addresstype"]:checked');
                if (crf_addresstype.length < 1) {
                    $('#alert_addresstype').html('<div class="alert alert-danger" role="alert">กรุณาเลือกที่อยู่สำหรับเปิดใบกำกับภาษีด้วยค่ะ</div>');
                    $('#crf_addressname').val('');
                } else {
                    $('#alert_addresstype').html('');
                }
            });
            // Check วันที่ก่อตั้งว่ามีการเลือกหรือไม่ // Check วันที่ก่อตั้งว่ามีการเลือกหรือไม่


            // Check Address Name Check Address Name Check Address Name
            $('#crf_addressname').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_addressname').html('<div class="alert alert-danger" role="alert">กรุณาระบุที่อยู่สำหรับการเปิดใบกำกับภาษีด้วยค่ะ</div>');
                } else {
                    $('#alert_addressname').html('');
                }
            });
            $('#crf_addressname').keyup(function () {
                if ($(this).val() != '') {
                    $('#alert_addressname').html('');
                }
            });
            $('#crf_namecontact').focus(function () {
                if ($('#crf_addressname').val() == '') {
                    $('#alert_addressname').html('<div class="alert alert-danger" role="alert">กรุณาระบุที่อยู่สำหรับการเปิดใบกำกับภาษีด้วยค่ะ</div>');
                    $('#crf_namecontact').val('');
                } else {
                    $('#alert_addressname').html('');
                }
            });
            $('#crf_namecontact').keyup(function () {
                if ($('#crf_addressname').val() == '') {
                    $('#alert_addressname').html('<div class="alert alert-danger" role="alert">กรุณาระบุที่อยู่สำหรับการเปิดใบกำกับภาษีด้วยค่ะ</div>');
                    $('#crf_namecontact').val('');
                } else {
                    $('#alert_addressname').html('');
                }
            });
            // Check Address Name Check Address Name Check Address Name


            // Check ช่องผู้ติดต่อว่ามีการกรอกข้อมูลเข้ามาหรือไม่
            $('#crf_namecontact').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_namecontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุชื่อผู้ติดต่อด้วยค่ะ</div>');
                } else {
                    $('#alert_namecontact').html('');
                }
            });
            $('#crf_telcontact').focus(function () {
                if ($('#crf_namecontact').val() == '') {
                    $('#alert_namecontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุชื่อผู้ติดต่อด้วยค่ะ</div>');
                    $('#crf_telcontact').val('');
                } else {
                    $('#alert_namecontact').html('');
                }
            });
            $('#crf_telcontact').keyup(function () {
                if ($('#crf_namecontact').val() == '') {
                    $('#alert_namecontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุชื่อผู้ติดต่อด้วยค่ะ</div>');
                    $('#crf_telcontact').val('');
                } else {
                    $('#alert_namecontact').html('');
                }
            });
            $('#crf_namecontact').keyup(function () {
                if ($(this).val() != '') {
                    $('#alert_namecontact').html('');
                }
            });
            // Check ช่องผู้ติดต่อว่ามีการกรอกข้อมูลเข้ามาหรือไม่



            // Check ช่องเบอร์โทรว่ามีการกรอกข้อมูลหรือไม่
            $('#crf_telcontact').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_telcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุเบอร์ผู้ติดต่อด้วยค่ะ</div>');
                } else {
                    $('#alert_telcontact').html('');
                }
            });
            $('#crf_emailcontact').focus(function () {
                if ($('#crf_telcontact').val() == '') {
                    $('#alert_telcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุเบอร์ผู้ติดต่อด้วยค่ะ</div>');
                    $('#crf_emailcontact').val('');
                } else {
                    $('#alert_telcontact').html('');
                }
            });
            $('#crf_emailcontact').keyup(function () {
                if ($('#crf_telcontact').val() == '') {
                    $('#alert_telcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุเบอร์ผู้ติดต่อด้วยค่ะ</div>');
                    $('#crf_emailcontact').val('');
                } else {
                    $('#alert_telcontact').html('');
                }
            });
            $('#crf_telcontact').keyup(function () {
                if ($(this).val() != '') {
                    $('#alert_telcontact').html('');
                }
            });
            // Check ช่องเบอร์โทรว่ามีการกรอกข้อมูลหรือไม่


            // Check ช่อง อีเมลว่ามีการกรอกข้อมูลหรือไม่
            $('#crf_emailcontact').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_emailcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุอีเมลผู้ติดต่อด้วยค่ะ</div>');
                } else {
                    $('#alert_emailcontact').html('');
                }
            });
            $('#crf_regiscost').focus(function () {
                if ($('#crf_emailcontact').val() == '') {
                    $('#alert_emailcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุอีเมลผู้ติดต่อด้วยค่ะ</div>');
                    $('#crf_regiscost').val('');
                } else {
                    $('#alert_emailcontact').html('');
                }
            });
            $('#crf_regiscost').keyup(function () {
                if ($('#crf_emailcontact').val() == '') {
                    $('#alert_emailcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุอีเมลผู้ติดต่อด้วยค่ะ</div>');
                    $('#crf_regiscost').val('');
                } else {
                    $('#alert_emailcontact').html('');
                }
            });
            $('#crf_emailcontact').keyup(function () {
                if ($(this).val() != '') {
                    $('#alert_emailcontact').html('');
                }
            });
            // Check ช่อง อีเมลว่ามีการกรอกข้อมูลหรือไม่


            // Check ช่อง ทุนจดทะเบียน
            $('#crf_regiscost').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_regiscost').html('<div class="alert alert-danger" role="alert">กรุณาระบุทุนจดทะเบียนด้วยค่ะ</div>');
                } else {
                    $('#alert_regiscost').html('');
                }
            });
            $('input:radio[name="crf_companytype"]').click(function () {
                if ($('#crf_regiscost').val() == '') {
                    $('#alert_regiscost').html('<div class="alert alert-danger" role="alert">กรุณาระบุทุนจดทะเบียนด้วยค่ะ</div>');
                    $('#crf_regiscost').val('');
                } else {
                    $('#alert_regiscost').html('');
                }

                $('#crf_companytype2 , #crf_companytype3_1_1 , #crf_companytype3_1_2 , #crf_companytype3_2_1 , #crf_companytype3_2_2').val('');
            });
            // $('#crf_regiscost').keyup(function(){
            //     if($('#crf_emailcontact').val() == ''){
            //         $('#alert_emailcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุอีเมลผู้ติดต่อด้วยค่ะ</div>');
            //         $('#user_submit').prop('disabled' , true);
            //         $('#crf_regiscost').val('');
            //     }else{
            //         $('#alert_emailcontact').html('');
            //         $('#user_submit').prop('disabled' , false);
            //     }
            // });
            $('#crf_regiscost').keyup(function () {
                if ($(this).val() != '') {
                    $('#alert_regiscost').html('');
                }
            });
            // Check ช่อง ทุนจดทะเบียน



            // Check ช่องรายชื่อบุคคลในแต่ระดับบริหารที่สำคัญ
            $('#crf_primanage_dept , #crf_primanage_name , #crf_primanage_posi , #crf_primanage_email').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_primanage').html('<div class="alert alert-danger" role="alert">กรุณาระบุข้อมูลให้ครบถ้วนด้วยค่ะ</div>');
                    $('input:radio[name="crf_typeofbussi"]').prop('checked', false);
                    exit;
                } else {
                    $('#alert_primanage').html('');
                }
            });

            $('input:radio[name="crf_typeofbussi"]').click(function () {
                if ($('#crf_primanage_dept').val() == '' || $('#crf_primanage_name').val() == '' || $('#crf_primanage_posi').val() == '' || $('#crf_primanage_email').val() == '') {
                    $('#alert_primanage').html('<div class="alert alert-danger" role="alert">กรุณาระบุข้อมูลให้ครบถ้วนด้วยค่ะ</div>');
                    $('input:radio[name="crf_typeofbussi"]').prop('checked', false);
                    exit;
                } else {
                    $('#alert_primanage').html('');
                }
            });

            // $('#crf_regiscost').keyup(function(){
            //     if($('#crf_emailcontact').val() == ''){
            //         $('#alert_emailcontact').html('<div class="alert alert-danger" role="alert">กรุณาระบุอีเมลผู้ติดต่อด้วยค่ะ</div>');
            //         $('#user_submit').prop('disabled' , true);
            //         $('#crf_regiscost').val('');
            //     }else{
            //         $('#alert_emailcontact').html('');
            //         $('#user_submit').prop('disabled' , false);
            //     }
            // });
            $('#crf_primanage_dept , #crf_primanage_name , #crf_primanage_posi , #crf_primanage_email').keyup(function () {
                if ($(this).val() != '') {
                    $('#alert_primanage').html('');
                }

                var crf_companytype = $('input:radio[name="crf_companytype"]:checked');
                if (crf_companytype.length < 1) {
                    $(this).val('');
                    $('#alert_companytype').html('<div class="alert alert-danger" role="alert">กรุณาเลือกประเภทบริษัทด้วยค่ะ</div>');
                } else {
                    $('#alert_primanage').html('');
                    $('#alert_companytype').html('');
                }
            });
            // Check ช่องรายชื่อบุคคลในแต่ระดับบริหารที่สำคัญ




            // Check ประเภทของ ธุรกิจว่ามีการเลือกข้อมูลหรือไม่
            $(document).on('change', 'input[type="checkbox"][id="crf_process"]:checked', function () {
                var crf_typeofbussi = $('input:radio[name="crf_typeofbussi"]:checked');
                if (crf_typeofbussi.length < 1) {
                    $('#alert_typeofbussi').html('<div class="alert alert-danger" role="alert">กรุณาเลือกประเภทธุรกิจด้วยค่ะ</div>');
                    $(this).prop('checked', false);
                    exit;
                } else {
                    $('#alert_typeofbussi').html('');
                }

            });
            // Check ประเภทของ ธุรกิจว่ามีการเลือกข้อมูลหรือไม่


            // Check กระบวนการผลิตว่ามีการเลือกข้อมูลเข้ามาหรือไม่
            $('#crf_forecast').focus(function () {
                var crf_process = $('input[type="checkbox"][id="crf_process"]:checked');
                if (crf_process.length < 1) {
                    $('#alert_process').html('<div class="alert alert-danger" role="alert">กรุณาเลือกกระบวนการผลิตหลักด้วยค่ะ</div>');
                    $(this).val('');
                } else {
                    $('#alert_process').html('');
                }
            });
            $('#crf_forecast').keyup(function () {
                var crf_process = $('input[type="checkbox"][id="crf_process"]:checked');
                if (crf_process.length < 1) {
                    $('#alert_process').html('<div class="alert alert-danger" role="alert">กรุณาเลือกกระบวนการผลิตหลักด้วยค่ะ</div>');
                    $(this).val('');
                } else {
                    $('#alert_process').html('');
                }

                if ($(this).val() != '') {
                    $('#alert_forecast').html('');
                }
            });
            // Check กระบวนการผลิตว่ามีการเลือกข้อมูลเข้ามาหรือไม่


            // Check คาดการปริมาณการขายว่ามีการกรอกข้อมูลงไปหรือไม่
            $('#crf_forecast').blur(function () {
                if ($(this).val() == '') {
                    $('#alert_forecast').html('<div class="alert alert-danger" role="alert">กรุณาระบุรายละเอียดคาดการปริมาณการขายด้วยค่ะ</div>');
                } else {
                    $('#alert_forecast').html('');
                }
            });
            // Check คาดการปริมาณการขายว่ามีการกรอกข้อมูลงไปหรือไม่



            // Check File Upload ว่ามีการอัพโหลดไฟล์หรือยังก่อ่นที่จะเลือก Credit term
            $('#crf_creditterm').change(function () {

                if ($(this).val() != '') {
                    $('#alert_creditterm').html('');
                    $('input:radio[name="crf_condition_bill"]').prop('disabled', false);
                } else {
                    $('#alert_creditterm').html('<div class="alert alert-danger" role="alert">กรุณาเลือก Credit Term ด้วยค่ะ</div>');
                    $('input:radio[name="crf_condition_bill"]').prop('checked', false);
                    $('input:radio[name="crf_condition_bill"]').prop('disabled', true);

                    $('input:radio[name="crf_condition_money"]').prop('checked', false);
                }

                if ($('#crf_file1').val() == '') {
                    $('#alert_file1').html('<div class="alert alert-danger" role="alert">กรุณาอัพโหลดไฟล์ ภพ.20 ด้วยค่ะ</div>');
                    $('#crf_creditterm').val('');
                } else {
                    $('#alert_file1').html('');
                }

                if ($('#crf_file2').val() == '') {
                    $('#alert_file2').html('<div class="alert alert-danger" role="alert">กรุณาอัพโหลดไฟล์ หนังสือรับรอง ด้วยค่ะ</div>');
                    $('#crf_creditterm').val('');
                } else {
                    $('#alert_file2').html('');
                }

                if ($('#crf_file3').val() == '') {
                    $('#alert_file3').html('<div class="alert alert-danger" role="alert">กรุณาอัพโหลดไฟล์ ข้อมูลทั่วไป ด้วยค่ะ</div>');
                    $('#crf_creditterm').val('');
                } else {
                    $('#alert_file3').html('');
                }

                if ($('#crf_file4').val() == '') {
                    $('#alert_file4').html('<div class="alert alert-danger" role="alert">กรุณาอัพโหลดไฟล์ งบแสดงฐานะทางการเงิน ด้วยค่ะ</div>');
                    $('#crf_creditterm').val('');
                } else {
                    $('#alert_file4').html('');
                }

                if ($('#crf_file5').val() == '') {
                    $('#alert_file5').html('<div class="alert alert-danger" role="alert">กรุณาอัพโหลดไฟล์ งบกำไรขาดทุน ด้วยค่ะ</div>');
                    $('#crf_creditterm').val('');
                } else {
                    $('#alert_file5').html('');
                }

                if ($('#crf_file6').val() == '') {
                    $('#alert_file6').html('<div class="alert alert-danger" role="alert">กรุณาอัพโหลดไฟล์ อัตราส่วนสภาพคล่อง ด้วยค่ะ</div>');
                    $('#crf_creditterm').val('');
                } else {
                    $('#alert_file6').html('');
                }
            });
            // Check File Upload ว่ามีการอัพโหลดไฟล์หรือยังก่อ่นที่จะเลือก Credit term


            // Check Upload File 1 - 6 Element
            $('#crf_file1').change(function () {
                if ($(this).val() != '') {
                    $('#alert_file1').html('');
                }
            });

            $('#crf_file2').change(function () {
                if ($(this).val() != '') {
                    $('#alert_file2').html('');
                }
            });

            $('#crf_file3').change(function () {
                if ($(this).val() != '') {
                    $('#alert_file3').html('');
                }
            });

            $('#crf_file4').change(function () {
                if ($(this).val() != '') {
                    $('#alert_file4').html('');
                }
            });

            $('#crf_file5').change(function () {
                if ($(this).val() != '') {
                    $('#alert_file5').html('');
                }
            });

            $('#crf_file6').change(function () {
                if ($(this).val() != '') {
                    $('#alert_file6').html('');
                }
            });
            // Check Upload File 1 - 6 Element


            // Check Credit Term ว่ามีการเลือกหรือไม่
            $('input:radio[name="crf_condition_bill"]').click(function () {
                if ($('#crf_creditterm').val() == '') {
                    $('#alert_creditterm').html('<div class="alert alert-danger" role="alert">กรุณาเลือก Credit Term ด้วยค่ะ</div>');
                    $('input:radio[name="crf_condition_bill"]').prop('checked', false);
                    $('input:radio[name="crf_condition_bill"]').prop('disabled', true);
                    exit;
                } else {
                    $('#alert_creditterm').html('');
                }


            });
            // Check Credit Term ว่ามีการเลือกหรือไม่


            // Check เงื่อนไขการวางบิล ว่าได้มีการเลือกแล้วหรือยัง
            $('input:radio[name="crf_condition_money"]').click(function () {
                var crf_condition_bill = $('input:radio[name=crf_condition_bill]:checked');
                if (crf_condition_bill.length < 1) {
                    $('#alert_condition_bill').html('<div class="alert alert-danger" role="alert">กรุณาเลือกเงื่อนไขการวางบิลด้วยค่ะ</div>');
                    $('input:radio[name="crf_condition_money"]').prop('checked', false);
                    exit;
                } else {
                    $('#alert_condition_bill').html('');
                }
            });
            // Check เงื่อนไขการวางบิล ว่าได้มีการเลือกแล้วหรือยัง


            // Check เงื่อนไขการรับชำระเงินว่ามีการเลือกข้อมูลถูกต้องหรือไม่
            $('#crf_finance_req_number').focus(function () {
                var crf_condition_money = $('input:radio[name="crf_condition_money"]:checked');
                if (crf_condition_money.length < 1) {
                    $('#alert_condition_money').html('<div class="alert alert-danger" role="alert">กรุณาเลือกเงื่อนไขการชำระเงินด้วยค่ะ</div>');
                    $('#crf_finance_req_number').val('');
                } else {
                    if (crf_condition_money.val() == 'รับเช็ค') {
                        if ($('#crf_recive_cheuqetable').val() == '') {
                            $('#alert_recive_cheuqetable').html('<div class="alert alert-danger" role="alert">กรุณา แนบตารางวางบิล / รับเช็ค ด้วยค่ะ</div>');
                            $('#crf_finance_req_number').val('');
                        } else {
                            $('#alert_recive_cheuqetable').html('');
                        }

                        if ($('#crf_recive_cheuqedetail').val() == '') {
                            $('#alert_recive_cheuqedetail').html('<div class="alert alert-danger" role="alert">กรุณา รายละเอียดเพิ่มเติม ด้วยค่ะ</div>');
                            $('#crf_finance_req_number').val('');
                        } else {
                            $('#alert_recive_cheuqedetail').html('');
                        }
                    } else {
                        $('#alert_condition_money').html('');
                    }
                }
            });

            $('#crf_finance_req_number').keyup(function () {
                var crf_condition_money = $('input:radio[name="crf_condition_money"]:checked');
                if (crf_condition_money.length < 1) {
                    $('#alert_condition_money').html('<div class="alert alert-danger" role="alert">กรุณาเลือกเงื่อนไขการชำระเงินด้วยค่ะ</div>');
                    $('#crf_finance_req_number').val('');
                } else {
                    if (crf_condition_money.val() == 'รับเช็ค') {
                        if ($('#crf_recive_cheuqetable').val() == '') {
                            $('#alert_recive_cheuqetable').html('<div class="alert alert-danger" role="alert">กรุณา แนบตารางวางบิล / รับเช็ค ด้วยค่ะ</div>');
                            $('#crf_finance_req_number').val('');
                        } else {
                            $('#alert_recive_cheuqetable').html('');
                        }

                        if ($('#crf_recive_cheuqedetail').val() == '') {
                            $('#alert_recive_cheuqedetail').html('<div class="alert alert-danger" role="alert">กรุณา รายละเอียดเพิ่มเติม ด้วยค่ะ</div>');
                            $('#crf_finance_req_number').val('');
                        } else {
                            $('#alert_recive_cheuqedetail').html('');
                        }
                    } else {
                        $('#alert_condition_money').html('');
                    }
                }
            });
            // Check เงื่อนไขการรับชำระเงินว่ามีการเลือกข้อมูลถูกต้องหรือไม่



            // Check ช่องวงเงินที่ต้องการว่ามีการกรอกข้อมูลหรือไม่
            $('#crf_finance_req_number').keyup(function () {
                if ($('#crf_finance_req_number').val() != '') {
                    $('#user_submit').prop('disabled', false);
                }
            });

            $('#crf_finance_req_number').blur(function () {
                if ($('#crf_finance_req_number').val() != '') {
                    $('#user_submit').prop('disabled', false);
                } else {
                    $('#user_submit').prop('disabled', true);
                }
            });
            // Check ช่องวงเงินที่ต้องการว่ามีการกรอกข้อมูลหรือไม่





        } else {

        }
        //Control credit term


    });

    //Control Radio crf_type Control หัวข้อ ลูกค้าใหม่ , ลูกค้าเดิม //Control Radio crf_type Control หัวข้อ ลูกค้าใหม่ , ลูกค้าเดิม
    //Control Radio crf_type Control หัวข้อ ลูกค้าใหม่ , ลูกค้าเดิม //Control Radio crf_type Control หัวข้อ ลูกค้าใหม่ , ลูกค้าเดิม




    // Remove Alert เมื่อมีการเลือกบริษัท
    $('input[type="radio"][name=crf_company]').click(function () {
        var crf_company = $('input[type="radio"][name=crf_company]:checked');
        if (crf_company.length > 0) {
            $('#alert_company').fadeOut();
        }
    });


    // Check การเลือกประเภทลูกค้า หากไม่ได้เลือกอะไรเลยจะไม่สามารถดำเนินการขั้นต่อไปได้
    $('#crf_salesreps').focus(function () {
        var crf_type = $('input[type="radio"][name=crf_type]:checked');
        if (crf_type.length < 1) {
            $('#alert_custype').html('<div class="alert alert-danger" role="alert">กรุณาเลือกประเภทลูกค้าด้วยค่ะ</div>');
            $('#crf_salesreps').val('');
        } else {
            $('#alert_custype').fadeOut();
        }
    });

    $('#crf_salesreps').keyup(function () {
        var crf_type = $('input[type="radio"][name=crf_type]:checked');
        if (crf_type.length < 1) {
            $('#alert_custype').html('<div class="alert alert-danger" role="alert">กรุณาเลือกประเภทลูกค้าด้วยค่ะ</div>');
            $('#crf_salesreps').val('');

        } else {
            $('#alert_custype').fadeOut();
        }
    });
    // Check การเลือกประเภทลูกค้า หากไม่ได้เลือกอะไรเลยจะไม่สามารถดำเนินการขั้นต่อไปได้










    // Check Element Zone Check Element Zone Check Element Zone
    // Check Element Zone Check Element Zone Check Element Zone



    // Check Element Zone Check Element Zone Check Element Zone
    // Check Element Zone Check Element Zone Check Element Zone






    //Control if change credit term is clicked
    $(document).on('click', 'input[name=crf_change_creditterm]', function () {
        $('.change_credit_detail').toggle();
    });





    //Control Form Main ประเภทบริษัท
    $(document).on('click', '#crf_companytype:checked', function () {
        if ($(this).val() == 2) {
            $('#companytype2').css('display', '');
        } else {
            $('#companytype2').css('display', 'none');
        }

        if ($(this).val() == 3) {
            $('#companytype3').css('display', '');
        } else {
            $('#companytype3').css('display', 'none');
        }

    });





    //Zone Customer Profile
    var iPri = 1;
    $('#add_more_primanage').click(function (e) {
        iPri++;
        e.preventDefault();
        $(this).before('<div id="priManage' + iPri + '" class="row form-group">' +
            '<div class="col-md-3">' +
            '<label for="">หน่วยงาน</label>' +
            '<input type="text" name="crf_primanage_dept[]" id="crf_primanage_dept" class="form-control" required>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<label for="">ชื่อ-สกุล</label>' +
            '<input type="text" name="crf_primanage_name[]" id="crf_primanage_name" class="form-control" required>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<label for="">ตำแหน่ง</label>' +
            '<input type="text" name="crf_primanage_posi[]" id="crf_primanage_posi" class="form-control" required>' +
            '</div>' +
            '<div class="col-md-2">' +
            '<label for="">อีเมล</label>' +
            '<input type="text" name="crf_primanage_email[]" id="crf_primanage_email" class="form-control" required>' +
            '</div>' +
            '<div class="col-md-1"><a href="javascript:void(0)"><i name="remove_pri" id="' + iPri + '" class="fas fa-minus-circle remove_pri"></i></a></div>' +
            '</div>');
    });

    $(document).on('click', '.remove_pri', function () {
        var buttonid = $(this).attr("id");
        $('#priManage' + buttonid + '').remove();
    });



    //Condition of bill Control
    $(document).on('click', 'input[name=crf_condition_bill]', function () {
        if ($(this).val() == 'วางบิลตามตาราง') {
            $('.crf_condition_bill2').css('display', '');
        } else {
            $('.crf_condition_bill2').css('display', 'none');
        }
        if ($(this).val() == 'วางบิลทุกวันที่') {
            $('.crf_condition_bill3').css('display', '');
        } else {
            $('.crf_condition_bill3').css('display', 'none');
        }
    });


    //Condition of recive money control (Transfer , cheuqe)
    $(document).on('click', 'input[name=crf_condition_money]', function () {

        if ($(this).val() == 'รับเช็ค') {
            $('.recive_cheuqe').css('display', '');
        } else {
            $('.recive_cheuqe').css('display', 'none');
        }
    });


    // Condition of finance type
    $(document).on('click', 'input[name=crf_finance]', function () {
        if ($(this).val() == 'ขอวงเงิน') {
            $('.finance_request_detail').css('display', '');
        } else {
            $('.finance_request_detail').css('display', 'none');
        }

        if ($(this).val() == 'ปรับวงเงิน') {
            $('.finance_change_detail').css('display', '');
        } else {
            $('.finance_change_detail').css('display', 'none');
        }
    });



    //Calculate up and down finance
    $('#finance_change_number').keyup(function () {
        var finance_change_number = $(this).val();
        var finance_change_old = $('#finance_change_old').val();
        if ($('#finance_change_status').val() == 'เพิ่ม') {
            var total = parseInt(finance_change_old) + parseInt(finance_change_number);
        } else if ($('#finance_change_status').val() == 'ลด') {
            var total = parseInt(finance_change_old) - parseInt(finance_change_number);
        }

        $('#finance_change_total').val(total);
    });




    // Convert Currency to comma
    $('input[name=crf_finance_req_number]').keyup(function (event) {/*****Comma function*******/

        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40)
            return;

        // format number
        $(this).val(function (index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                ;
        });
    });


    // format number
    $('#crf_finance_req_number_view , #crf_regiscost_view , #crf_finance_old_view , #crf_finance_change_number_view , #crf_finance_change_total_view').val(function (index, value) {
        return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            ;
    });






    //Check File Format And Size //Check File Format And Size
    //Check File Format And Size //Check File Format And Size
    $('input[type=file][name=crf_file1],[name=crf_file2],[name=crf_file3]').change(function () {
        var ext = $(this).val().split('.').pop().toLowerCase();
        //Allowed file types
        if ($.inArray(ext, ['pdf', 'jpg', 'png']) == -1) {
            alert('อัพโหลดได้เฉพาะไฟล์นามสกุล .pdf , .jpg , .png เท่านั้น !!');
            $(this).val("");
        }
        if (this.files[0].size > 10485760) {
            alert("Maximum File size is 10MB !!");
            this.value = "";
            exit;
        }
    });
    //Check File Format And Size //Check File Format And Size
    //Check File Format And Size //Check File Format And Size




    // $('input[type=file][name=crf_file2]').change(function (){
    //     var ext = $(this).val().split('.').pop().toLowerCase();
    // //Allowed file types
    // if ($.inArray(ext, ['pdf' , 'jpg' , 'png']) == -1) {
    //     alert('The file type is invalid!');
    //     $(this).val("");
    // }
    // if (this.files[0].size > 10485760) {
    //     alert("Maximum File size is 10MB !!");
    //     this.value = "";
    //     exit;
    // }
    // });



    // Control View page

    // Company Section Select
    if ($('#forcrf_company_view').val() == "sln") {
        $('input:radio[id="view_crf_company_sln"]').prop('checked', true);
    } else if ($('#forcrf_company_view').val() == "poly") {
        $('input:radio[id="view_crf_company_poly"]').prop('checked', true);
    } else if ($('#forcrf_company_view').val() == "ca") {
        $('input:radio[id="view_crf_company_ca"]').prop('checked', true);
    }


    // Customer Section Select
    if ($('#forcrf_type_view').val() == 1) {
        $('input:radio[id="crf_type1_view"]').prop('checked', true);
    } else if ($('#forcrf_type_view').val() == 2) {
        $('input:radio[id="crf_type2_view"]').prop('checked', true);
        $('.cs_br').remove();
        $('.account_staff').remove();
    }

    // Customer Old Select Section
    if ($('#forcrf_sub_oldcus_changearea_view').val() == 1) {
        $('input:checkbox[id="crf_sub_oldcus_changearea_view"]').prop('checked', true);
    }
    if ($('#forcrf_sub_oldcus_changeaddress_view').val() == 2) {
        $('input:checkbox[id="crf_sub_oldcus_changeaddress_view"]').prop('checked', true);
    }
    if ($('#forcrf_sub_oldcus_changecredit_view').val() == 3) {
        $('input:checkbox[id="crf_sub_oldcus_changecredit_view"]').prop('checked', true);
        $('.change_credit_detail , .change_credit').css('display' , '');
        // if($('#checkStatus').val() == "Complated"){
        //     $('.change_credit_detail , .change_credit').css('display' , 'none');
        // }
    }
    if ($('#forcrf_sub_oldcus_changefinance_view').val() == 4) {
        $('input:checkbox[id="crf_sub_oldcus_changefinance_view"]').prop('checked', true);
    }


    // Control ที่อยู่สำหรับการเปิดใบกำกับภาษี
    if ($('#forcrf_addresstype_view').val() == "ตาม ภ.พ.20") {
        $('input:radio[id="crf_addresstype1_view"]').prop('checked', true);
    } else if ($('#forcrf_addresstype_view').val() == "อื่นๆ") {
        $('input:radio[id="crf_addresstype2_view"]').prop('checked', true);
    }


    // Control ประเภทบริษัท
    if ($('#forcrf_companytype_view').val() == 1) {
        $('input:radio[id="crf_companytype1_view"]').prop('checked', true);
    } else if ($('#forcrf_companytype_view').val() == 2) {
        $('#companytype2_view').css('display', '');
        $('input:radio[id="crf_companytype2_view"]').prop('checked', true);
    } else if ($('#forcrf_companytype_view').val() == 3) {
        $('#companytype3_view').css('display', '');
        $('input:radio[id="crf_companytype3_view"]').prop('checked', true);
    }



    // Control ประเภทธุระกิจ
    if ($('#forcrf_typeofbussi_view').val() == "ผู้ผลิต") {
        $('input:radio[id="crf_typeofbussi1_view"]').prop('checked', true);
    } else if ($('#forcrf_typeofbussi_view').val() == "ผู้ค้า") {
        $('input:radio[id="crf_typeofbussi2_view"]').prop('checked', true);
    }


    // Controle show file upload to modal
    $('#datafile1').click(function () {
        var dataFile1 = $(this).attr('data_file1');
        var url = 'http://192.190.10.27/crf/upload/';

        $('#embedshowfile1').attr('src', url + dataFile1);
    });
    $('#datafile2').click(function () {
        var dataFile2 = $(this).attr('data_file2');
        var url = 'http://192.190.10.27/crf/upload/';

        $('#embedshowfile2').attr('src', url + dataFile2);
    });
    $('#datafile3').click(function () {
        var dataFile3 = $(this).attr('data_file3');
        var url = 'http://192.190.10.27/crf/upload/';

        $('#embedshowfile3').attr('src', url + dataFile3);
    });
    $('#datafile4').click(function () {
        var dataFile4 = $(this).attr('data_file4');
        var url = 'http://192.190.10.27/crf/upload/';

        $('#embedshowfile4').attr('src', url + dataFile4);
    });
    $('#datafile5').click(function () {
        var dataFile5 = $(this).attr('data_file5');
        var url = 'http://192.190.10.27/crf/upload/';

        $('#embedshowfile5').attr('src', url + dataFile5);
    });
    $('#datafile6').click(function () {
        var dataFile6 = $(this).attr('data_file6');
        var url = 'http://192.190.10.27/crf/upload/';

        $('#embedshowfile6').attr('src', url + dataFile6);
    });


    // Control Condition of bill เงื่อนไขการวางบิล
    if ($('#forcrf_condition_bill_view').val() == 'ส่งของพร้อมวางบิล') {
        $('input:radio[id="crf_condition_bill1_view"]').prop('checked', true);
    } else if ($('#forcrf_condition_bill_view').val() == 'วางบิลตามตาราง') {
        $('input:radio[id="crf_condition_bill2_view"]').prop('checked', true);
        $('.crf_condition_bill2').css('display', '');
    } else if ($('#forcrf_condition_bill_view').val() == 'วางบิลทุกวันที่') {
        $('input:radio[id="crf_condition_bill3_view"]').prop('checked', true);
        $('.crf_condition_bill3').css('display', '');
    }

    // Show file on modal
    $('#tablebill').click(function () {
        var tablebill = $(this).attr('data_tablebill');
        var url = 'http://192.190.10.27/crf/upload/';

        $('#embedshowfile7').attr('src', url + tablebill);
    });
    $('#mapbill').click(function () {
        var mapbill = $(this).attr('data_mapbill');
        var url = 'http://192.190.10.27/crf/upload/';

        $('#embedshowfile8').attr('src', url + mapbill);
    });
    $('#mapbill2').click(function () {
        var mapbill2 = $(this).attr('data_mapbill2');
        var url = 'http://192.190.10.27/crf/upload/';

        $('#embedshowfile9').attr('src', url + mapbill2);
    });



    // Control เงื่อนไขการรับชำระเงิน
    if ($('#forcrf_condition_money_view').val() == "โอนเงิน") {
        $('input:radio[id="crf_condition_money1_view"]').prop('checked', true);
    } else if ($('#forcrf_condition_money_view').val() == "รับเช็ค") {
        $('input:radio[id="crf_condition_money2_view"]').prop('checked', true);
        $('.recive_cheuqe').css('display', '');
    }
    $('#recive_cheuqetable').click(function () {
        var recive_cheuqetable = $(this).attr('data_recive_cheuqetable');
        var url = 'http://192.190.10.27/crf/upload/';

        $('#embedshowfile10').attr('src', url + recive_cheuqetable);
    });




    // Control หัวข้อของวงเงินการค้า
    if ($('#forcrf_finance_view').val() == "ขอวงเงิน") {
        $('input:radio[id="crf_finance1_view"]').prop('checked', true);
        $('.finance_request_detail').css('display', '');
        $('#crf_finance_old_view').css('display' , 'none');
    } else if ($('#forcrf_finance_view').val() == "ปรับวงเงิน") {
        $('input:radio[id="crf_finance2_view"]').prop('checked', true);
        $('.finance_change_detail').css('display', '');
    }


    // Master input Control Section
    // Master input Control Section
    var checkStatus = $('#checkStatus').val();
    var checkUserPost = $('#checkUserPost').val();
    var checkDeptCode = $('#checkDeptCode').val();
    var checkUserecode = $('#checkUserecode').val();

    var checkDeptCodeL = $('#checkDeptCodeL').val();
    var checkUserecodeL = $('#checkUserecodeL').val();
    var checkUserPosi = $('#checkUserPosi').val();

    var changeSales = $('#forcrf_sub_oldcus_changearea_view').val();
    var changeAddress = $('#forcrf_sub_oldcus_changeaddress_view').val();
    var changeCreditTerm = $('#forcrf_sub_oldcus_changecredit_view').val();
    var changeFinance = $('#forcrf_sub_oldcus_changefinance_view').val();
    // Master input Control Section
    // Master input Control Section


    // Control btn edit
    if(checkStatus == "Open" || checkStatus == "Edit"){
        $('#btnEditZone').css('display' , '');
    }


    // Control credit term complate
    if(checkStatus == "Complated"){
        $('.creditTermComplete').css('display' , '');
        $('.creditTermOpen').css('display' , 'none');
    }

    // Control Cancel status
    if(checkStatus == "Cancel"){
        $('#cancel').remove();
    }


    // Control CS , Sales Approve
   
    if (checkDeptCodeL == checkDeptCode && checkUserecodeL != checkUserecode && checkUserPosi > 55) {
        $('.author_manager').css('display', '');
    } else if (checkStatus == "Sales Manager Approved" || checkStatus == "CS POST BR" || checkStatus == "Account Manager Approved" || checkStatus == "Director Sales Approved" || checkStatus == "Director Account Approved" || checkStatus == "Complated") {
        $('.author_manager').css('display', '');
    } else {
        $('.author_manager').css('display', 'none');
    }

    if ($('#formgr_appro').val() != "") {
        $('#crf_mgrapprovedetail , #crf_mgrapprove_name , #crf_mgrapprove_datetime , #mgr_submit ,#mgr_appro').css('display', 'none');
        if ($('#formgr_appro').val() == "อนุมัติ") {
            $('input:radio[id="formgr_appro1"]').prop('checked', true);
        } else if($('#formgr_appro').val() == "ไม่อนุมัติ"){
            $('input:radio[id="formgr_appro0"]').prop('checked', true);
        }else{

        }
    } else {
        $('#forcrf_mgrapprovedetail , #forcrf_mgrapprove_name , #forcrf_mgrapprove_datetime ,#formgr_appro , #forcrf_mgrapprove_detail').css('display', 'none');
    }

    // validate submit button
    $('#mgr_submit').prop('disabled' , true);
    $('input:radio[name="mgr_appro"]').click(function(){
        if($(this).val() != ''){
            $('#mgr_submit').prop('disabled' , false);
        }else{
            $('#mgr_submit').prop('disabled' , true);
        }
    });






    // Control CS Form
    if (checkDeptCodeL == 1010 && $('#formgr_appro').val() == "อนุมัติ" && changeSales != 1 && changeAddress != 2 && changeCreditTerm != 3 && changeFinance != 4) {
        $('.cs_br').css('display', '');

    } else if (checkStatus == "CS POST BR" || checkStatus == "Account Manager Approved" || checkStatus == "Director Sales Approved" || checkStatus == "Director Account Approved" || checkStatus == "Complated") {
        $('.cs_br').css('display', '');
    } else {
        $('.cs_br').css('display', 'none');
    }

    if ($('#forcheckcrf_brcode').val() == "") {
        $('#forcrf_brcode , #forcrf_brcode_userpost , #forcrf_becode_datetime').css('display', 'none');
    } else {
        $('#crf_brcode , #crf_brcode_userpost , #crf_becode_datetime , #br_submit').css('display', 'none');
    }

    $('#br_submit').prop('disabled' , true);
    $('#crf_brcode').click(function(){
        if($('#crf_brcode').val() == ''){
            $('#br_submit').prop('disabled' , true);
        }else{
            $('#br_submit').prop('disabled' , false);
        }
    });
    $('#crf_brcode').keyup(function(){
        if($('#crf_brcode').val() == ''){
            $('#br_submit').prop('disabled' , true);
        }else{
            $('#br_submit').prop('disabled' , false);
        }
    });
    $('#crf_brcode').blur(function(){
        if($('#crf_brcode').val() == ''){
            $('#br_submit').prop('disabled' , true);
        }else{
            $('#br_submit').prop('disabled' , false);
        }
    });
    

    



    // Control Account Manager
    if (checkStatus == "CS POST BR" && checkDeptCodeL == 1003 && checkUserPosi > 55) {
        $('.acc_manager').css('display', '');
        if ($('#formgraccappro').val() == "") {
            $('.formgr_appro , #forcrf_accmgr_detail , #forcrf_accmgr_name , #forcrf_accmgr_datatime').css('display', 'none');
        }
    }else if(checkStatus == "Sales Manager Approved" && checkDeptCodeL == 1003 && checkUserPosi > 55 && changeSales == 1 || checkStatus == "Sales Manager Approved" && checkDeptCodeL == 1003 && checkUserPosi > 55 && changeAddress == 2 || checkStatus == "Sales Manager Approved" && checkDeptCodeL == 1003 && checkUserPosi > 55 && changeCreditTerm == 3 || checkStatus == "Sales Manager Approved" && checkDeptCodeL == 1003 && checkUserPosi > 55 && changeFinance == 4){
        $('.acc_manager').css('display', '');
        if ($('#formgraccappro').val() == "") {
            $('.formgr_appro , #forcrf_accmgr_detail , #forcrf_accmgr_name , #forcrf_accmgr_datatime').css('display', 'none');
        }
    }

    if (checkStatus == "Account Manager Approved" || checkStatus == "Director Sales Approved" || checkStatus == "Director Account Approved" || checkStatus == "Complated") {
        $('.acc_manager').css('display', '');
        if ($('#formgraccappro').val() == "") {
            $('.formgr_appro , #forcrf_accmgr_detail , #forcrf_accmgr_name , #forcrf_accmgr_datatime').css('display', 'none');
        } else {
            $('.mgr_appro , #crf_accmgr_detail , #crf_accmgr_name ,#crf_accmgr_datatime ,#accmgr_submit').css('display', 'none')
        }
    }

    if ($('#formgraccappro').val() == "อนุมัติ") {
        $('input:radio[id="formgracc_appro1"]').prop('checked', true);
    } else if($('#formgraccappro').val() == "ไม่อนุมัติ"){
        $('input:radio[id="formgracc_appro2"]').prop('checked', true);
    }else{

    }

    // validate submit form
    $('#accmgr_submit').prop('disabled' , true);
    $('input:radio[name="mgracc_appro"]').click(function (){
        if($(this).val() != ''){
            $('#accmgr_submit').prop('disabled' , false);
        }else{
            $('#accmgr_submit').prop('disabled' , true);
        }
    });




    // Control Director1 Approve Section
    if (checkStatus == "Account Manager Approved" && checkUserPosi > 75) {
        $('.director1').css('display', '');
        if ($('#checkfordirector1_appro').val() == "") {
            $('.fordirector1_appro , #forcrf_director_detail1 ,#forcrf_director_name1 , #forcrf_director_datatime1').css('display', 'none');
        }
    } else if (checkStatus == "Director Sales Approved" || checkStatus == "Director Account Approved" || checkStatus == "Complated") {
        $('.director1').css('display', '');
        $('.director1_appro , #crf_director_detail1 ,#crf_director_name1 , #crf_director_datatime1 , #director_submit1').css('display', 'none');
    }

    if ($('#checkfordirector1_appro').val() == "อนุมัติ") {
        $('input:radio[id="fordirector1_appro1"]').prop('checked', true);
    } else {
        $('input:radio[id="fordirector1_appro2"]').prop('checked', false);
    }

    // validate submit button
    $('#director_submit1').prop('disabled' , true);
    $('input:radio[name="director1_appro"]').click(function(){
        if($(this).val() != ''){
            $('#director_submit1').prop('disabled' , false);
        }else{
            $('#director_submit1').prop('disabled' , true);
        }
    });





    // Control Director2 Approve Section
    if (checkStatus == "Director Sales Approved" && checkUserPosi > 75) {
        $('.director2').css('display', '');
        if ($('#checkfordirector2_appro').val() == "") {
            $('.fordirector2_appro , #forcrf_director_detail2 ,#forcrf_director_name2 , #forcrf_director_datatime2').css('display', 'none');
        }
    } else if (checkStatus == "Director Account Approved" || checkStatus == "Complated") {
        $('.director2').css('display', '');
        $('.director2_appro , #crf_director_detail2 ,#crf_director_name2 , #crf_director_datatime2 , #director_submit2').css('display', 'none');
    }

    if ($('#checkfordirector2_appro').val() == "อนุมัติ") {
        $('input:radio[id="fordirector2_appro1"]').prop('checked', true);
    } else {
        $('input:radio[id="fordirector2_appro2"]').prop('checked', false);
    }

    // validate submit button
    $('#director_submit2').prop('disabled' , true);
    $('input:radio[name="director2_appro"]').click(function(){
        if($(this).val() != ''){
            $('#director_submit2').prop('disabled' , false);
        }else{
            $('#director_submit2').prop('disabled' , true);
        }
    });







    // Control Account Staff Section
    if (checkStatus == "Director Account Approved" && checkDeptCodeL == 1003) {
        $('.account_staff').css('display', '');
        if ($('#checkCustomercode').val() == "") {
            $('#forcusCode ,#forcusCode_userPost , #fcusCode_datetimePost').css('display', 'none');
        }
    } else if (checkStatus == "Complated") {
        $('.account_staff').css('display', '');
        $('#cusCode ,#cusCode_userPost , #cusCode_datetimePost , #acc_staff').css('display', 'none');
    }

    $('#goto_cuscode_form').on('click', function () {
        var data_crf_id = $(this).attr('data_crf_id');
        $('#accstaff_crfid').val(data_crf_id);
    });


    // validate submit button
    $('#acc_staff').prop('disabled' , true);
    $('#cusCode').click(function(){
        if($(this).val() != ''){
            $('#acc_staff').prop('disabled' , false);
        }else{
            $('#acc_staff').prop('disabled' , true);
        }
    });
    $('#cusCode').keyup(function(){
        if($(this).val() != ''){
            $('#acc_staff').prop('disabled' , false);
        }else{
            $('#acc_staff').prop('disabled' , true);
        }
    });
    $('#cusCode').blur(function(){
        if($(this).val() != ''){
            $('#acc_staff').prop('disabled' , false);
        }else{
            $('#acc_staff').prop('disabled' , true);
        }
    });





    // Control Save Data ลูกค้าเก่า
    $('#crf_customercode').on('keyup', function () {
        var cusCode = $(this).val();
        if (cusCode != '') {
            autoSearchCustomerDetail(cusCode);
        } else {
            $('#autoCusCode').html('')
        }

    });

    $(document).on('click', '.selectCusCode', function () {

        var data_crf_salesreps = $(this).attr('data_crf_salesreps');
        var data_crf_customername = $(this).attr('data_crf_customername');
        var data_crf_cuscompanycreate = $(this).attr('data_crf_cuscompanycreate');
        var data_crf_addressname = $(this).attr('data_crf_addressname');
        var data_crf_namecontact = $(this).attr('data_crf_namecontact');
        var data_crf_telcontact = $(this).attr('data_crf_telcontact');
        var data_crf_faxcontact = $(this).attr('data_crf_faxcontact');
        var data_crf_emailcontact = $(this).attr('data_crf_emailcontact');
        var data_crf_regiscost = $(this).attr('data_crf_regiscost');
        var data_crf_customercode = $(this).attr('data_crf_customercode');
        var data_oldcfr_addresstype = $(this).attr('data_oldcfr_addresstype');
        var data_crf_companytype = $(this).attr('data_crf_companytype');
        var data_crf_companytype3_1_1 = $(this).attr('data_crf_companytype3_1_1');
        var data_crf_companytype3_1_2 = $(this).attr('data_crf_companytype3_1_2');
        var data_crf_companytype3_2_1 = $(this).attr('data_crf_companytype3_2_1');
        var data_crf_companytype3_2_2 = $(this).attr('data_crf_companytype3_2_2');
        var data_crf_companytype2 = $(this).attr('data_crf_companytype2');
        var data_crf_typeofbussi = $(this).attr('data_crf_typeofbussi');
        var data_crf_forecast = $(this).attr('data_crf_forecast');
        var data_credit_name = $(this).attr('data_credit_name');
        var data_credit_id = $(this).attr('data_credit_id');
        var data_crf_condition_bill = $(this).attr('data_crf_condition_bill');
        var data_crf_tablebill = $(this).attr('data_crf_tablebill');
        var data_crf_mapbill = $(this).attr('data_crf_mapbill');
        var data_crf_datebill = $(this).attr('data_crf_datebill');
        var data_crf_mapbill2 = $(this).attr('data_crf_mapbill2');
        var data_crf_condition_money = $(this).attr('data_crf_condition_money');
        var data_crf_recive_cheuqetable = $(this).attr('data_crf_recive_cheuqetable');
        var data_crf_recive_cheuqedetail = $(this).attr('data_crf_recive_cheuqedetail');
        var data_crf_finance = $(this).attr('data_crf_finance');
        var data_crf_finance_req_number = $(this).attr('data_crf_finance_req_number');
        var data_crf_cusid = $(this).attr('data_crf_cusid');
        var data_crf_creditterm2 = $(this).attr('data_crf_creditterm2');
        var data_crf_creditterm2name = $(this).attr('data_crf_creditterm2name');
        var data_crf_moneylimit = $(this).attr('data_crf_moneylimit');

        $('#crf_customercode').val(data_crf_customercode).prop('readonly' , true);
        $('#crf_salesreps').val(data_crf_salesreps);
        $('#crf_customername').val(data_crf_customername);
        $('#crf_cuscompanycreate').val(data_crf_cuscompanycreate);
        $('#crf_addressname').val(data_crf_addressname);
        $('#crf_namecontact').val(data_crf_namecontact);
        $('#crf_telcontact').val(data_crf_telcontact);
        $('#crf_faxcontact').val(data_crf_faxcontact);
        $('#crf_emailcontact').val(data_crf_emailcontact);
        $('#crf_regiscost').val(data_crf_regiscost);
        $('#crf_forecast').val(data_crf_forecast);
        $('#value_crf_finance').val(data_crf_finance);
        if(data_crf_creditterm2 != ''){
            $('#crf_creditterm option:selected').val(data_crf_creditterm2).text(data_crf_creditterm2name);
            $('#oldCreditTerm').val(data_crf_creditterm2);
        }else{
            $('#crf_creditterm option:selected').val(data_credit_id).text(data_credit_name);
            $('#oldCreditTerm').val(data_credit_id);
        }
        $('#crf_finance_req_number , #crf_finance_req_number_calc').val(data_crf_moneylimit);
        $('#crf_cusid').val(data_crf_cusid);
        


        if(data_oldcfr_addresstype == "ตาม ภ.พ.20"){
            $('input:radio[id="crf_addresstype1"]').prop('checked' , true);
        }else{
            $('input:radio[id="crf_addresstype2"]').prop('checked' , true);
        }


        if(data_crf_companytype == 1){
            $('input:radio[class="crf_companytype1"]').prop('checked' , true);
        }else if (data_crf_companytype == 2) {
            $('input:radio[class="crf_companytype2"]').prop('checked' , true);
            $('#companytype2').css('display' , '');
            $('#crf_companytype2').val(data_crf_companytype2);
        }else{
            $('input:radio[class="crf_companytype3"]').prop('checked' , true);
            $('#companytype3').css('display' , '');
            $('#crf_companytype3_1_1').val(data_crf_companytype3_1_1);
            $('#crf_companytype3_1_2').val(data_crf_companytype3_1_2);
            $('#crf_companytype3_2_1').val(data_crf_companytype3_2_1);
            $('#crf_companytype3_2_2').val(data_crf_companytype3_2_2);
        }


        if(data_crf_typeofbussi == 'ผู้ผลิต'){
            $('input:radio[class="crf_typeofbussi1"]').prop('checked' , true);
        }else{
            $('input:radio[class="crf_typeofbussi2"]').prop('checked' , true);
        }


        queryProcessUse(data_crf_cusid);
        queryPrimanageUse(data_crf_cusid);


        if(data_crf_condition_bill == 'ส่งของพร้อมวางบิล'){
            $('input:radio[class="crf_condition_billv1"]').prop('checked' , true);
        }else if (data_crf_condition_bill == 'วางบิลตามตาราง'){
            $('input:radio[class="crf_condition_billv2"]').prop('checked' , true);
            $('.crf_condition_bill2').css('display' , '');
            $('.oldcustomer1').css('display' , '').val(data_crf_tablebill);
            $('.oldcustomer1').prop('readonly' , true);
            $('.oldcustomer2').css('display' , '').val(data_crf_mapbill);
            $('.oldcustomer2').prop('readonly' , true);
            $('.newcustomer1').remove();
            $('.newcustomer2').remove();
        }else if (data_crf_condition_bill == 'วางบิลทุกวันที่'){
            $('input:radio[class="crf_condition_billv3"]').prop('checked' , true);
            $('.crf_condition_bill3').css('display' , '');
            $('#crf_datebill').val(data_crf_datebill);
            $('.newcustomer3').remove();
            $('.oldcustomer3').css('display' , '').val(data_crf_mapbill2);
        }

        if(data_crf_condition_money == "โอนเงิน"){
            $('input:radio[class="crf_condition_moneyv1"]').prop('checked' , true);
        }else if (data_crf_condition_money == "รับเช็ค"){
            $('input:radio[class="crf_condition_moneyv2"]').prop('checked' , true);
            $('.recive_cheuqe').css('display' , '');
            $('.newcustomer4').remove();
            $('.oldcustomer4').css('display' , '').val(data_crf_recive_cheuqetable);
            $('.oldcustomer4').prop('readonly' , true);
            $('#crf_recive_cheuqedetail').val(data_crf_recive_cheuqedetail);
            $('#crf_recive_cheuqedetail').prop('readonly' , true);
        }


        if(data_crf_finance == "ขอวงเงิน"){
            $('input:radio[class="crf_financev1"]').prop('checked' , true);
            $('.finance_request_detail').css('display' , '');
            $('#crf_finance_req_number').val(data_crf_finance_req_number);
        }else if(data_crf_finance == "ปรับวงเงิน"){
            $('input:radio[class="crf_financev2"]').prop('checked' , true);
        }

        $('#crf_finance_req_number').val(function (index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                ;
        });



        $('#autoCusCode').html('')

    });





//////////// Search Zone Search Zone Search Zone Search Zone //////////////////
//////////// Search Zone Search Zone Search Zone Search Zone //////////////////
$('#searchdata').change(function(){
    if($(this).val() == 'จากวันที่สร้างรายการ'){
        $('.searchByDate').css('display' , '');
    }else{
        $('.searchByDate').css('display' , 'none');
    }
    
    if($(this).val() == 'จากเลขที่คำขอ'){
        $('.searchByForm').css('display' , '');
    }else{
        $('.searchByForm').css('display' , 'none');
    }
    
    if($(this).val() == 'จากชื่อบริษัท'){
        $('.searchByCompany').css('display' , '');
    }else{
        $('.searchByCompany').css('display' , 'none');
    }
});





$('#searchdataex').change(function(){
    if($(this).val() == 'bydatecreate'){
        $('.searchByDate').css('display' , '');
    }else{
        $('.searchByDate').css('display' , 'none');
    }
    
    if($(this).val() == 'byformno'){
        $('.searchByForm').css('display' , '');
    }else{
        $('.searchByForm').css('display' , 'none');
    }
    
    if($(this).val() == 'bycompanyname'){
        $('.searchByCompany').css('display' , '');
    }else{
        $('.searchByCompany').css('display' , 'none');
    }
});
//////////// Search Zone Search Zone Search Zone Search Zone //////////////////
//////////// Search Zone Search Zone Search Zone Search Zone //////////////////







// Export Zone Export Zone Export Zone Export Zone Export Zone Export Zone
// Export Zone Export Zone Export Zone Export Zone Export Zone Export Zone
$('input[name="crfex_company"]').click(function(){
    if($('input[name="crfex_company"]:checked').length > 0){
        $('#alert_crfex_company').html('');
    }
});

$('#crfex_salesreps').click(function(){
    if($('input[name="crfex_custype"]:checked').length < 1){
        $('#alert_crfex_custype').html('<div class="alert alert-danger" role="alert">Please choose customer type.</div>');
        $('#crfex_salesreps').val('');
        exit;
    }
});
$('#crfex_salesreps').keyup(function(){
    if($('input[name="crfex_custype"]:checked').length < 1){
        $('#alert_crfex_custype').html('<div class="alert alert-danger" role="alert">Please choose customer type.</div>');
        $('#crfex_salesreps').val('');
        exit;
    }
});


$('input[name="crfex_custype"]').click(function (){
    if($('input[name="crfex_custype"]:checked').length > 0){
        $('#alert_crfex_custype').html('');
    }
});







$('input[name="crfex_custype"]').click(function(){
    var crfex_company = $('input:radio[name="crfex_company"]:checked');
    if(crfex_company.length < 1){
        $('#alert_crfex_company').html('<div class="alert alert-danger" role="alert">Please choose company name.</div>');
        $('input[name="crfex_custype"]').prop('checked' , false);
        exit;
    }else{
        $('#alert_crfex_company').html('');
    }


// When click new customer
if($(this).val() == 1){
    $('#crfex_customercode').prop('readonly' , true);
    $('#usercrfex_submit').prop('disabled' , true);

    $('#crfex_his_month1 , #crfex_his_month2 , #crfex_his_month3 , #crfex_his_tvolume1 , #crfex_his_tvolume2 , #crfex_his_tvolume3 , #crfex_histsales1 , #crfex_histsales2 , #crfex_histsales3 , #crfex_creditlimit2 , #crfex_term2 , #crfex_discount2').prop('readonly' , true);

    // check sales rep
    $('#crfex_cusnameEN').click(function(){
        if($('#crfex_salesreps').val() == ''){
            $('#alert_crfex_salesreps').html('<div class="alert alert-danger" role="alert">Please fill sales reps.</div>');
            $('#crfex_cusnameEN').val('');
            exit;
        }
    });
    $('#crfex_cusnameEN').keyup(function(){
        if($('#crfex_salesreps').val() == ''){
            $('#alert_crfex_salesreps').html('<div class="alert alert-danger" role="alert">Please fill sales reps.</div>');
            $('#crfex_cusnameEN').val('');
            exit;
        }
    });
    $('#crfex_salesreps').keyup(function (){
        if($(this).val() != ''){
            $('#alert_crfex_salesreps').html('');
        }
    });





    // check customer name
    $('#crfex_address').click(function(){
        if($('#crfex_cusnameEN').val() == ''){
            $('#alert_crfex_cusnameEN').html('<div class="alert alert-danger" role="alert">Please fill customer name (EN).</div>');
            $('#crfex_address').val('');
            exit;
        }
    });
    $('#crfex_address').keyup(function(){
        if($('#crfex_cusnameEN').val() == ''){
            $('#alert_crfex_cusnameEN').html('<div class="alert alert-danger" role="alert">Please fill customer name (EN).</div>');
            $('#crfex_address').val('');
            exit;
        }
    });
    $('#crfex_cusnameEN').keyup(function (){
        if($(this).val() != ''){
            $('#alert_crfex_cusnameEN').html('');
        }
    });


    // check address
    $('#crfex_tel').click(function(){
        if($('#crfex_address').val() == ''){
            $('#alert_crfex_address').html('<div class="alert alert-danger" role="alert">Please fill address.</div>');
            $('#crfex_tel').val('');
            exit;
        }
    });
    $('#crfex_tel').keyup(function(){
        if($('#crfex_address').val() == ''){
            $('#alert_crfex_address').html('<div class="alert alert-danger" role="alert">Please fill address.</div>');
            $('#crfex_tel').val('');
            exit;
        }
    });
    $('#crfex_address').keyup(function(){
        if($(this).val() != ''){
            $('#alert_crfex_address').html('');
        }
    });


    // check tel
    $('#crfex_email').click(function(){
        if($('#crfex_tel').val() == ''){
            $('#alert_crfex_tel').html('<div class="alert alert-danger" role="alert">Please fill Tel.</div>');
        $('#crfex_email').val('');
        exit;
        }
        
    });
    $('#crfex_email').keyup(function(){
        if($('#crfex_tel').val() == ''){
            $('#alert_crfex_tel').html('<div class="alert alert-danger" role="alert">Please fill Tel.</div>');
        $('#crfex_email').val('');
        exit;
        }
    });
    $('#crfex_tel').keyup(function(){
        if($(this).val() != ''){
            $('#alert_crfex_tel').html('');
        }
    });



    // check email
    $('#crfex_creditlimit').click(function(){
        if($('#crfex_email').val() == ''){
            $('#alert_crfex_email').html('<div class="alert alert-danger" role="alert">Please fill Email.</div>');
            $('#crfex_creditlimit').val('');
            exit;
        }
    });
    $('#crfex_creditlimit').keyup(function(){
        if($('#crfex_email').val() == ''){
            $('#alert_crfex_email').html('<div class="alert alert-danger" role="alert">Please fill Email.</div>');
            $('#crfex_creditlimit').val('');
            exit;
        }
    });
    $('#crfex_email').keyup(function(){
        if($(this).val() != ''){
            $('#alert_crfex_email').html('');
        }
    });


    // check credit
    $('#crfex_term').click(function(){
        if($('#crfex_creditlimit').val() == ''){
            $('#alert_crfex_creditlimit').html('<div class="alert alert-danger" role="alert">Please fill propose credit limit.</div>');
            $('#crfex_term').val('');
            exit;
        }
    });
    $('#crfex_term').keyup(function(){
        if($('#crfex_creditlimit').val() == ''){
            $('#alert_crfex_creditlimit').html('<div class="alert alert-danger" role="alert">Please fill propose credit limit.</div>');
            $('#crfex_term').val('');
            exit;
        }
    });
    $('#crfex_creditlimit').keyup(function(){
        if($(this).val() != ''){
            $('#alert_crfex_creditlimit').html('');
        }
    });



    // check term
    $('#crfex_term').blur(function(){
        if($('#crfex_term').val() == ''){
            $('#alert_crfex_term').html('<div class="alert alert-danger" role="alert">Please fill credit term.</div>');
            $('#usercrfex_submit').prop('disabled' , true);
            exit;
        }
    });
    $('#crfex_creditlimit').keyup(function(){
        if($(this).val() != ''){
            $('#alert_crfex_term').html('');
            $('#usercrfex_submit').prop('disabled' , false);
        }
    });






    





}else if($(this).val() == 2){
    $('#crfex_customercode').prop('readonly' , false);
    $('.crfex_topic').css('display' , '');

    $('#crfex_salesreps , #crfex_cusnameEN , #crfex_cusnameTH , #crfex_address , #crfex_tel , #crfex_fax , #crfex_email , #crfex_creditlimit , #crfex_term , #crfex_discount , #crfex_creditlimit2 , #crfex_term2 , #crfex_discount2').prop('readonly' , true);

    $('#alert_crfex_salesreps , #alert_crfex_cusnameEN , #alert_crfex_address , #alert_crfex_tel , #alert_crfex_email , #alert_crfex_creditlimit , #alert_crfex_term').html('');


    // check topic select
    $('#crfex_customercode').click(function(){
        if($('#crfex_curcustopic').val() == ''){
            $('#alert_crfex_topic').html('<div class="alert alert-danger" role="alert">Please select the topic.</div>');
            $('#crfex_customercode').val('');
            exit;
        }
    });
    $('#crfex_customercode').keyup(function(){
        if($('#crfex_curcustopic').val() == ''){
            $('#alert_crfex_topic').html('<div class="alert alert-danger" role="alert">Please select the topic.</div>');
            $('#crfex_customercode').val('');
            exit;
        }
    });
    $('#crfex_curcustopic').change(function(){
        if($(this).val() != ''){
            $('#alert_crfex_topic').html('');
        }

        if($(this).val() == 11){
            $('#crfex_salesreps , #crfex_cusnameEN , #crfex_cusnameTH , #crfex_address , #crfex_tel , #crfex_fax , #crfex_email').prop('readonly' , false);
            $('#crfex_creditlimit , #crfex_term , #crfex_discount , #crfex_creditlimit2 , #crfex_term2 , #crfex_discount2').prop('readonly' , true);
        }else if($(this).val() == 12){
            $('#crfex_creditlimit , #crfex_term , #crfex_discount , #crfex_creditlimit2 , #crfex_term2 , #crfex_discount2').prop('readonly' , false);
            $('#crfex_salesreps , #crfex_cusnameEN , #crfex_cusnameTH , #crfex_address , #crfex_tel , #crfex_fax , #crfex_email').prop('readonly' , true);
        }else{
            $('#crfex_salesreps , #crfex_cusnameEN , #crfex_cusnameTH , #crfex_address , #crfex_tel , #crfex_fax , #crfex_email , #crfex_creditlimit , #crfex_term , #crfex_discount , #crfex_creditlimit2 , #crfex_term2 , #crfex_discount2').prop('readonly' , true);
        }
    });




    // Get Old customer information to form when keyup
$('#crfex_customercode').on('keyup', function () {
    var cusCode = $(this).val();
    if (cusCode != '') {
        autoSearchCustomerDetailEx(cusCode);
    } else {
        $('#autoCusCodeEx').html('')
    }

});

$(document).on('click', '.selectCusCodeEx', function () {

    var data_crfex_salesreps = $(this).attr('data_crfex_salesreps');
    var data_crfex_cusnameEN = $(this).attr('data_crfex_cusnameEN');
    var data_crfex_cusnameTH = $(this).attr('data_crfex_cusnameTH');
    var data_crfex_address = $(this).attr('data_crfex_address');
    var data_crfex_tel = $(this).attr('data_crfex_tel');
    var data_crfex_fax = $(this).attr('data_crfex_fax');
    var data_crfex_email = $(this).attr('data_crfex_email');
    var data_crfex_file = $(this).attr('data_crfex_file');
    var data_crfex_creditlimit = $(this).attr('data_crfex_creditlimit');
    var data_crfex_term = $(this).attr('data_crfex_term');
    var data_crfex_discount = $(this).attr('data_crfex_discount');
    var data_crfex_bg = $(this).attr('data_crfex_bg');
    var data_crfex_cuscode = $(this).attr('data_crfex_cuscode');
    var data_crfex_cusid = $(this).attr('data_crfex_cusid');


    $('#crfex_salesreps').val(data_crfex_salesreps);
    $('#crfex_cusnameEN').val(data_crfex_cusnameEN);
    $('#crfex_cusnameTH').val(data_crfex_cusnameTH);
    $('#crfex_address').val(data_crfex_address);
    $('#crfex_tel').val(data_crfex_tel);
    $('#crfex_fax').val(data_crfex_fax);
    $('#crfex_email').val(data_crfex_email);
    $('#crfex_fileShow').text(data_crfex_file);
    $('#crfex_creditlimit2').val(data_crfex_creditlimit);
    $('#crfex_term2').val(data_crfex_term);
    $('#crfex_discount2').val(data_crfex_discount);
    $('#crfex_combg').val(data_crfex_bg);
    $('#crfex_customercode').val(data_crfex_cuscode).prop('readonly' , true);
    $('#getCusid').val(data_crfex_cusid);



    $('#autoCusCodeEx').html('')

});




}
// End Section current customer

});




// Control view export page
if($('#checkPage').val() == 'viewdataEx'){

    $('#crf_company_sln_view , #crf_company_poly_view , #crf_company_ca_view').attr('onclick' , 'return false');

    if($('#check_crf_company').val() == 'sln'){
        $('#crf_company_sln_view').prop('checked' , true);
    }else if($('#check_crf_company').val() == 'poly'){
        $('#crf_company_poly_view').prop('checked' , true);
    }else if($('#check_crf_company').val() == 'ca'){
        $('#crf_company_ca_view').prop('checked' , true);
    }
    // End check company

    if($('#check_crfex_custype').val() == 1){
        $('#crfex_custype1').prop('checked' , true);
    }else if($('#check_crfex_custype').val() == 2){
        $('#crfex_custype2').prop('checked' , true);
    }
    $('#crfex_custype1 , #crfex_custype2').attr('onclick' , 'return false');



// Control Approve Section
var checkStatus = $('#checkStatusView').val();
var checkUserDeptView = $('#checkUserDeptView').val();
var checkCusType = $('#checkCusType').val();
var checkCusPosi = $('#checkCusPosi').val();

if(checkStatus == 'Open' && checkUserDeptView == 1006 && checkCusPosi == 75 || checkStatus == 'Open' && checkUserDeptView == 1010 && checkCusPosi == 75){
    $('.managerSection').css('display' , '');
    $('#ex_mgrSubmit').prop('disabled' , true);
    $('input:radio[name="ex_mgrApprove"]').click(function(){
        if($(this).val() != '')
        {
            $('#ex_mgrSubmit').prop('disabled' , false);
        }else{
            $('#ex_mgrSubmit').prop('disabled' , true);
        }
    });
}else if(checkStatus == 'Manager approved' || checkStatus == 'CS Added BR CODE' || checkStatus == 'Account Manager Approved' || checkStatus == 'Director Approved' || checkStatus == 'Complated'){
    $('.managerSection').css('display' , 'none');
    $('.managerSection1').css('display' , '');

    $('#ex_mgrApprove1 , #ex_mgrApprove2').attr('onclick' , 'return false');
    if($('#show_crfex_mgrapp_status').val() == "Approve"){
        $('#ex_mgrApprove1').prop('checked' , true);
    }else{
        $('#ex_mgrApprove2').prop('checked' , true);
    }
}

if(checkStatus == 'Manager approved' && checkUserDeptView == 1010){
    if(checkCusType == 2){
        $('.csAddBrDection').remove();
    }else{
        $('.csAddBrDection').css('display' , '');
    }
}else if(checkStatus == 'CS Added BR CODE' || checkStatus == 'Account Manager Approved' || checkStatus == 'Director Approved' || checkStatus == 'Complated'){
    if(checkCusType == 2){
        $('.csAddBrDection1').remove();
    }else{
        $('.csAddBrDection1').css('display' , '');
    }
}


if(checkStatus == 'CS Added BR CODE' && checkUserDeptView == 1003 && checkCusPosi > 55){
    $('.accManagerApprove').css('display' , '');
}else if(checkStatus == 'Manager approved' && checkUserDeptView == 1003 && checkCusPosi > 55){
    $('.accManagerApprove').css('display' , '');
    $('#ex_accManagerSubmit').prop('disabled' , true);
    $('input:radio[name="ex_accMgrApprove"]').click(function(){
        if($(this).val() != ''){
            $('#ex_accManagerSubmit').prop('disabled' , false);
        }else{
            $('#ex_accManagerSubmit').prop('disabled' , true);
        }
    });
}
else if(checkStatus == 'Account Manager Approved' || checkStatus == 'Director Approved' || checkStatus == 'Complated'){
    $('.accManagerApprove1').css('display' , '');
}


// Control account manager approve section
$('#ex_accMgrApprove1 , #ex_accMgrApprove2').attr('onclick' , 'return false');
if($('#check_ex_accMgrApprove').val() == 'Approve'){
    $('#ex_accMgrApprove1').prop('checked' , true);
}else if ($('#check_ex_accMgrApprove').val() == 'Not approve'){
    $('#ex_accMgrApprove2').prop('checked' , true);
}


// Control director approve section
if(checkStatus == 'Account Manager Approved' && checkCusPosi > 75){
    $('.directorApprove').css('display' , '');
    $('#ex_directorSubmit').prop('disabled' , true);
    $('input:radio[name="ex_directorApprove"]').click(function (){
        if($(this).val() != ''){
            $('#ex_directorSubmit').prop('disabled' , false);
        }else{
            $('#ex_directorSubmit').prop('disabled' , true);
        }
    });
}else if(checkStatus == 'Director Approved' || checkStatus == 'Complated'){
    $('.directorApprove1').css('display' , '');
}

if($('#check_director_status').val() == 'Approve'){
    $('#ex_directorApprove1').prop('checked' , true);
}else if($('#check_director_status').val() == 'Not approve'){
    $('#ex_directorApprove2').prop('checked' , true);
}


// Control account staff when add new customer
if(checkStatus == 'Director Approved' && checkUserDeptView == 1003){
    $('.accAddCustomerCode').css('display' , '');
}else if(checkStatus == 'Complated'){
    if(checkCusType == 2){
        $('.accAddCustomerCode1').remove();
    }else{
        $('.accAddCustomerCode1').css('display' , '');
    }
    
}


}
// End check page


// Export Zone Export Zone Export Zone Export Zone Export Zone Export Zone
// Export Zone Export Zone Export Zone Export Zone Export Zone Export Zone













// Edit Internal Zone

// Edit sales reps
// Get data
$('.edit_salesreps').click(function(){
    var data_edit_cusid = $(this).attr('data_edit_cusid');
    var data_edit_salesreps = $(this).attr('data_edit_salesreps');

    $('#edit_salesrepV').val(data_edit_salesreps);
    $('#edit_cusid').val(data_edit_cusid);

});

// Update data
$('#btnEditSaleRep').click(function (){
    var editview_cusid = $('#edit_cusid').val();
    var editview_salesrepV = $('#edit_salesrepV').val();
    // var cusId = "test";

    //call ajax function
    edit_salesreps(editview_cusid , editview_salesrepV);

});


// Edit page
// Check edit บริษัท
if($('#check_editcom').val() == 'sln'){
    $('#edit_company_sln').prop('checked' , true);
}else if($('#check_editcom').val() == 'poly'){
    $('#edit_company_poly').prop('checked' , true);
}else if($('#check_editcom').val() == 'ca'){
    $('#edit_company_ca').prop('checked' , true);
}

// Check edit ลูกค้าเก่า , ลูกค้าใหม่
if($('#check_editcustype').val() == 1){
    $('#edit_custype1').prop('checked' ,true);
    $('input:radio[name="crf_type"]').prop('disabled' , true);
// Check ที่อยู่สำหรับการเปิดใบกำกับภาษี
if($('#check_addtype').val() == "ตาม ภ.พ.20"){
    $('#edit_addresstype1').prop('checked' , true);
}else if($('#check_addtype').val() == "อื่นๆ"){
    $('#edit_addresstype2').prop('checked' , true);
}


// Check ประเภทบริษัท
if($('#check_comtype').val() == 1){
    $('.crf_companytype1').prop('checked' , true);
}else if($('#check_comtype').val() == 2){
    $('.crf_companytype2').prop('checked' , true);
    $('#companytype2').css('display' , '');
}else if($('#check_comtype').val() == 3){
    $('.crf_companytype3').prop('checked' , true);
    $('#companytype3').css('display' , '');
}

$('input:radio[name="crf_companytype"]').click(function(){
    if($(this).val() == 1){
        $('#crf_companytype2 , #crf_companytype3_1_1 , #crf_companytype3_1_2 , #crf_companytype3_2_1 , #crf_companytype3_2_2').val('');
    }
    if($(this).val() == 2){
        $('#crf_companytype3_1_1 , #crf_companytype3_1_2 , #crf_companytype3_2_1 , #crf_companytype3_2_2').val('');
    }
    if($(this).val() == 3){
        $('#crf_companytype2').val('');
    }
});



// Check ประเภทของธุรกิจ
if($('#check_busitype').val() == "ผู้ผลิต"){
    $('.crf_typeofbussi1').prop('checked' , true);
}else if($('#check_busitype').val() == "ผู้ค้า"){
    $('.crf_typeofbussi2').prop('checked' , true);
}


// Check เงื่อนไขการวางบิล
if($('#check_conditionbill').val() == "ส่งของพร้อมวางบิล"){
    $('.crf_condition_billv1').prop('checked' , true);
}else if($('#check_conditionbill').val() == "วางบิลตามตาราง"){
    $('.crf_condition_billv2').prop('checked' , true);
    $('.crf_condition_bill2edit').css('display' , '');
}else if($('#check_conditionbill').val() == "วางบิลทุกวันที่"){
    $('.crf_condition_billv3').prop('checked' , true);
    $('.crf_condition_bill3').css('display' , '');
}
$('input:radio[name="crf_condition_bill"]').click(function(){
    if($(this).val() == 'ส่งของพร้อมวางบิล'){

    }

    if($(this).val() == 'วางบิลตามตาราง'){
        $('.crf_condition_bill2edit').css('display' , '');
    }else{
        $('.crf_condition_bill2edit').css('display' , 'none');
    }

    if($(this).val() == 'วางบิลทุกวันที่'){
        $('.crf_condition_bill3').css('display' , '');
    }else{
        $('.crf_condition_bill3').css('display' , 'none');
    }

});


// Check เงื่อนไขการรับชำระเงิน
if($('#check_conditionmoney').val() == "โอนเงิน"){
    $('.crf_condition_moneyv1').prop('checked' , true);
}else if($('#check_conditionmoney').val() == "รับเช็ค"){
    $('.crf_condition_moneyv2').prop('checked' , true);
    $('.recive_cheuqe').css('display' , '');
}
$('input:radio[name="edit_condition_money"]').click(function(){
    if($(this).val() == 'รับเช็ค'){
        $('.recive_cheuqe').css('display' , '');
    }else{
        $('.recive_cheuqe').css('display' , 'none');
    }
});


// Check วงเงินการค้าและเงื่อนไขที่ขอเสนอ
if($('#check_editfinance').val() == "ขอวงเงิน"){
    $('.crf_financev1').prop('checked' , true);
    $('input:radio[name="crf_finance"]').prop('disabled' , true);
}else if($('#check_editfinance').val() == "ปรับวงเงิน"){
    $('.crf_financev2').prop('checked' , true);
}


// For view file


// Zone Edit page when current customer
}else if($('#check_editcustype').val() == 2){
    $('#edit_custype2').prop('checked' ,true);
    $('.suboldcustomer').css('display' , '');

    // Check ที่อยู่สำหรับการเปิดใบกำกับภาษี
if($('#check_addtype').val() == "ตาม ภ.พ.20"){
    $('#edit_addresstype1').prop('checked' , true);
}else if($('#check_addtype').val() == "อื่นๆ"){
    $('#edit_addresstype2').prop('checked' , true);
}


// Check ประเภทบริษัท
if($('#check_comtype').val() == 1){
    $('.crf_companytype1').prop('checked' , true);
}else if($('#check_comtype').val() == 2){
    $('.crf_companytype2').prop('checked' , true);
}else if($('#check_comtype').val() == 3){
    $('.crf_companytype3').prop('checked' , true);
}



// Check ประเภทของธุรกิจ
if($('#check_busitype').val() == "ผู้ผลิต"){
    $('.crf_typeofbussi1').prop('checked' , true);
}else if($('#check_busitype').val() == "ผู้ค้า"){
    $('.crf_typeofbussi2').prop('checked' , true);
}


// Check เงื่อนไขการวางบิล
if($('#check_conditionbill').val() == "ส่งของพร้อมวางบิล"){
    $('.crf_condition_billv1').prop('checked' , true);
}else if($('#check_conditionbill').val() == "วางบิลตามตาราง"){
    $('.crf_condition_billv2').prop('checked' , true);
    $('.crf_condition_bill2edit').css('display' , '');
}else if($('#check_conditionbill').val() == "วางบิลทุกวันที่"){
    $('.crf_condition_billv3').prop('checked' , true);
    $('.crf_condition_bill3').css('display' , '');
}


// Check เงื่อนไขการรับชำระเงิน
if($('#check_conditionmoney').val() == "โอนเงิน"){
    $('.crf_condition_moneyv1').prop('checked' , true);
}else if($('#check_conditionmoney').val() == "รับเช็ค"){
    $('.crf_condition_moneyv2').prop('checked' , true);
    $('.recive_cheuqe').css('display' , '');
}


// Check วงเงินการค้าและเงื่อนไขที่ขอเสนอ
if($('#check_editfinance').val() == "ขอวงเงิน"){
    $('.crf_financev1').prop('checked' , true);
}else if($('#check_editfinance').val() == "ปรับวงเงิน"){
    $('.crf_financev2').prop('checked' , true);
}


$('.edit_salesrepsCur').remove();
    $('#edit_customername , #edit_cuscompanycreate , #edit_addressname , #edit_namecontact , #edit_telcontact , #edit_faxcontact , #edit_emailcontact , #edit_regiscost , #crf_primanage_dept , #crf_primanage_name , #crf_primanage_posi , #crf_primanage_email , #edit_forecast , #crf_recive_cheuqedetail , #crf_finance_req_number , #edit_salesreps').prop('readonly' , true);
    $('#crf_file1 , #crf_file2 , #crf_file3 , #crf_file4 , #crf_file5 , #crf_file6 , #crf_file7 , #crf_file8 , #crf_file9 , #crf_recive_cheuqetable').css('display' , 'none');
    $('#add_more_primanage').css('display' , 'none');
    $('input:radio').attr('onclick' , 'return false');
    $('input:checkbox[id="crf_process"]').attr('onclick' , 'return false');
    $('#crf_creditterm').hide();
    $('#showCreditname').css('display' , '');

// กรณีที่เป็นลูกค้าเก่า
// Control subold customer method
if($('#check_changearea').val() == 1){
    $('input[name="crf_sub_oldcus_changearea"]').prop('checked' , true);
    $('#edit_salesreps').prop('readonly' , false);
}else{
    $('#edit_salesreps').prop('readonly' , true);
}

if($('#check_changeaddress').val() == 2){
    $('input[name="crf_sub_oldcus_changeaddress"]').prop('checked' , true);
    $('#edit_addressname , #edit_namecontact , #edit_telcontact , #edit_faxcontact , #edit_emailcontact').prop('readonly' , false);
    $('#crf_file1').css('display' , '');
    $('input:radio[name="edit_addresstype"]').attr('onclick','');
}else{
    $('#edit_addressname , #edit_namecontact , #edit_telcontact , #edit_faxcontact , #edit_emailcontact').prop('readonly' , true);
    $('#crf_file1').css('display' , 'none');
    $('input:radio[name="edit_addresstype"]').attr('onclick','return false');
}

if($('#check_changecredit').val() == 3){
    $('input[name="crf_sub_oldcus_changecredit"]').prop('checked' , true);
    $('.change_credit , .change_credit_detail').css('display' , '');
    $('#crf_change_creditterm').prop('checked' , true);
}else{

}

if($('#check_changefinance').val() == 4){
    $('input[name="crf_sub_oldcus_changefinance"]').prop('checked' , true);
}



$('input:checkbox[name="crf_sub_oldcus_changearea"]').click(function(){
    if($(this).prop('checked') == true){
        $('#edit_salesreps').prop('readonly' , false);
    }else{
        $('#edit_salesreps').prop('readonly' , true);
    }
});

$('input:checkbox[name="crf_sub_oldcus_changeaddress"]').click(function(){
    if($(this).prop('checked') == true){
        $('#edit_addressname , #edit_namecontact , #edit_telcontact , #edit_faxcontact , #edit_emailcontact').prop('readonly' , false);
        $('#crf_file1').css('display' , '');
        $('input:radio[name="edit_addresstype"]').attr('onclick','');
    }else{
        $('#edit_addressname , #edit_namecontact , #edit_telcontact , #edit_faxcontact , #edit_emailcontact').prop('readonly' , true);
        $('#crf_file1').css('display' , 'none');
        $('input:radio[name="edit_addresstype"]').attr('onclick','return false');
    }
});

$('input:checkbox[name="crf_sub_oldcus_changecredit"]').click(function(){
    if($(this).prop('checked') == true){
        $('.change_credit , .change_credit_detail').css('display' , '');
        $('#crf_change_creditterm').prop('checked' , true);
    }else{
        $('.change_credit').css('display' , 'none');
        $('.change_credit , .change_credit_detail').css('display' , 'none');
    }
});

$('input:checkbox[name="crf_sub_oldcus_changefinance"]').click(function(){
    if($(this).prop('checked') == true){
        
    }else{

    }
});











}
// End check



















});
// END FUNCTION