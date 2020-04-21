<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report TH</title>

    <link rel="stylesheet" href="<?=base_url('css/buttons.dataTables.min.css')?>">


<script src="<?= base_url('js/datatable/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('js/datatable/buttons.flash.min.js') ?>"></script>
<script src="<?= base_url('js/datatable/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('js/datatable/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('js/datatable/jszip.min.js') ?>"></script>
<script src="<?= base_url('js/datatable/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('js/datatable/vfs_fonts.js') ?>"></script>
<style>
    .col-search-input{
        width:100%;
    }
</style>

</head>

<body>
    <div class="container-fulid bg-white p-3">
        <h3><?=$title?></h3>
        <div class="table-responsive">
            <br>
            <table id="user_data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="100">เลขที่คำขอ
                            <input type="text" name="searchFormNo" id="searchFormNo" class="col-search-input">
                        </th>
                        <th>ชื่อลูกค้า</th>
                        <th>ประเภทลูกค้า</th>
                        <th>หัวข้อ</th>
                        <th>ผู้ดูแล</th>
                        <th>วันที่ออกเอกสาร</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>

</body>

</html>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  

// $('#user_data thead th').each(function(){
//     var title = $(this).text();
//     $(this).html(title+'<input type="text" class="col-search-input" placeholder="Search '+title+' "/> ');

// });
     
     loaddata();


// $(document).on('click' , '#filter_formno' , function(){
//     $('#user_data').DataTable().destroy();
// });
$(document).on('keyup' , '#searchFormNo' , function(){
    $('#user_data').DataTable().destroy();
});
$(document).on('keyup' , '#searchFormNo' , function(){
    var filterForm = $(this).val();
    // $('#user_data').DataTable().destroy();

    if(filterForm != ''){
        // searchBYformNo(filterForm);
        loaddata(filterForm);
    }else{
        $('#user_data').DataTable().destroy();
        loaddata();
    }
});




     function loaddata(filterForm)
     {
        var dataTable = $('#user_data').DataTable({  
           "processing":true,
           "serverSide":true,
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'main/report/fetch_user'; ?>", 
                type:"POST",
                data:{
                    filterForm:filterForm
                }
           },  
           "columnDefs":[  
                {  
                     "targets":[0,1,2,3,4,5,6],  
                     "orderable":false,  
                },  
           ],
           dom: 'Bfrtip',
                "buttons": [
                    {
                        extend: 'copyHtml5',
                        title: 'Report OT Online By Department on '
                    },
                    {
                        extend: 'excelHtml5',
                        autoFilter: true,
                        title: 'Report OT Online By Department on '
                    }
                ]
      });
     }



     function searchBYformNo(formNo)
     {
        var dataTable = $('#user_data').DataTable({  
           "processing":true,
           "serverSide":true,
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'main/report/fetch_user_formSearch'; ?>",  
                type:"POST",
                data:{formNo:formNo}
           },  
           "columnDefs":[  
                {  
                     "targets":[0,1,2,3,4,5,6],  
                     "orderable":false,  
                },  
           ],
           dom: 'Bfrtip',
                "buttons": [
                    {
                        extend: 'copyHtml5',
                        title: 'Report OT Online By Department on '
                    },
                    {
                        extend: 'excelHtml5',
                        autoFilter: true,
                        title: 'Report OT Online By Department on '
                    }
                ]
      });
     }
      




 });  
 </script> 