function saveCustomerCode() {
	$.ajax({
		url: "main/saveCustomersCode",
		method: "POST",
		data:{},
		success:function (data) {
			console.log(data);
		}
	});
}


function autoSearchCustomerDetail(cusCode)
{
	$.ajax({
        url:'main/searchCustomerDetail',
        method:'POST',
        data:{
            cusCode: cusCode
        },
        success:function(data){
			$('#autoCusCode').html(data);
        }
    });
}


function autoSearchCustomerDetailEx(cusCode)
{
	$.ajax({
        url:'main/searchCustomerDetailEx',
        method:'POST',
        data:{
            cusCode: cusCode
        },
        success:function(data){
			$('#autoCusCodeEx').html(data);
        }
    });
}


function setChecked(targetval)
{
	$('input:checkbox[name="crf_process"]').each(function(){
		var value = $(this).val();
		if(value == targetval){
			$(this).prop('checked' , true);
		}else{
			$(this).prop('checked' , false);
		}
	});
}

function queryProcessUse(cusId)
{
	$.ajax({
        url:'main/queryProcessUse',
        method:'POST',
        data:{
            cusId: cusId
        },
        success:function(data){
			$('#showoldprocesscus').html(data);
			$('.newprocesscus').css('display' , 'none');
        }
    });
}

function unclick(e)
{
	e.preventDefault();
	return false;
}


function queryPrimanageUse(cusId)
{
	$.ajax({
		url:'main/queryPrimanageUse',
        method:'POST',
        data:{
            cusId: cusId
        },
        success:function(data){
			$('#showPrimanage').html(data);
			$('.newPrimanage').remove();
        }
	});
}

function filterCreditTerm(oldCredit , creditMethod)
{
	$.ajax({
		url:'main/filterCreditTerm',
        method:'POST',
        data:{
			oldCredit: oldCredit,
            creditMethod: creditMethod
        },
        success:function(data){
			$('#showNewCredit').html(data);
        }
	});
}

