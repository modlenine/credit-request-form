function saveCustomerCode() {
    $.ajax({
        url: "main/saveCustomersCode",
        method: "POST",
        data: {},
        success: function (data) {
            console.log(data);
        }
    });
}


function autoSearchCustomerDetail(cusCode) {
    $.ajax({
        url: 'main/searchCustomerDetail',
        method: 'POST',
        data: {
            cusCode: cusCode
        },
        success: function (data) {
            $('#autoCusCode').html(data);
        }
    });
}


function autoSearchCustomerDetailEx(cusCode) {
    $.ajax({
        url: 'main/searchCustomerDetailEx',
        method: 'POST',
        data: {
            cusCode: cusCode
        },
        success: function (data) {
            $('#autoCusCodeEx').html(data);
        }
    });
}


function setChecked(targetval) {
    $('input:checkbox[name="crf_process"]').each(function () {
        var value = $(this).val();
        if (value == targetval) {
            $(this).prop('checked', true);
        } else {
            $(this).prop('checked', false);
        }
    });
}

function queryProcessUse(cusId) {
    $.ajax({
        url: 'main/queryProcessUse',
        method: 'POST',
        data: {
            cusId: cusId
        },
        success: function (data) {
            $('#showoldprocesscus').html(data);
            $('.newprocesscus').css('display', 'none');
        }
    });
}

function unclick(e) {
    e.preventDefault();
    return false;
}


function queryPrimanageUse(cusId) {
    $.ajax({
        url: 'main/queryPrimanageUse',
        method: 'POST',
        data: {
            cusId: cusId
        },
        success: function (data) {
            $('#showPrimanage').html(data);
            $('.newPrimanage').remove();
        }
    });
}

function filterCreditTerm(oldCredit, creditMethod) {
    $.ajax({
        url: 'main/filterCreditTerm',
        method: 'POST',
        data: {
            oldCredit: oldCredit,
            creditMethod: creditMethod
        },
        success: function (data) {
            $('#showNewCredit').html(data);
        }
    });
}


function checkDuplicateNameCustomer(cusName , comName) {
    $.ajax({
        url: 'main/checkDuplicateNameCustomer',
        method: 'POST',
        data: {
            cusName: cusName,
            comName: comName
        },
        success: function (data) {
            if (data == 11) {
                var conF = confirm("พบชื่อลูกค้าที่คล้ายกันในระบบ คุณยืนยันที่จะดำเนินการต่อหรือไม่");
                if (conF == false) {
                    $('#crf_customername').val('');
                }
            }else{

            }

        }
    });
}

function checkDuplicateNameCustomerEx(cusName , comName) {
    $.ajax({
        url: 'main/checkDuplicateNameCustomerEx',
        method: 'POST',
        data: {
            cusName: cusName,
            comName: comName
        },
        success: function (data) {
            if (data == 11) {
                var conF = confirm("Found the customer name in system, Are you sure go to next step.");
                if (conF == false) {
                    $('#crfex_cusnameEN').val('');
                    $('#alert_crfex_cusnameEN').html('');
                }
            }else{

            }

        }
    });
}





// Edit zone on view page
// edit sales reps
function edit_salesreps(editcusid , editsalesreps){
    $.ajax({
        url:'main/editViewPage',
        method:'POST',
        data:{
            "editcusid" : editcusid,
            "editsalesreps" : editsalesreps
        },
        success:function(res){
            console.log(res);
        }
    });
}



//Function for check duplicate BR Code
function checkDupliBR(query)
{
    $.ajax({
        url: "main/checkbrcode",
        method: "post",
        data: { query:query },
        success: function(data){
            console.log(data);
        }
    });

}



// Check Customer name for export
function checkCustomersNameEn(cusname)
{
    var checkCusname = /[^ก-เ]{4,100}$/.test(cusname);

    if(checkCusname == true){
        $('#alert_crfex_cusnameEN').html('<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i>&nbsp;Customer name correct pattern</div>');
        $('#usercrfex_edit').prop('disabled' , false);
    }else{
        $('#alert_crfex_cusnameEN').html('<div class="alert alert-danger" role="alert">Please use Customer name on english language only.</div>');
        $('#usercrfex_edit').prop('disabled' , true);
    }
}

// Check Customer name for export
function checkCustomersNameTH(cusname)
{
    var checkCusname = /[^A-Za-z0-9]{4,100}$/.test(cusname);

    if(checkCusname == true){
        $('#alert_crfex_cusnameTH').html('<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i>&nbsp;Customer name correct pattern</div>');
        $('#usercrfex_edit').prop('disabled' , false);
    }else{
        $('#alert_crfex_cusnameTH').html('<div class="alert alert-danger" role="alert">Please use Customer name on Thai language only.</div>');
        $('#usercrfex_edit').prop('disabled' , true);
    }
}






