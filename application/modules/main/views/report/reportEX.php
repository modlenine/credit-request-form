<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report EN</title>

    <link rel="stylesheet" href="<?=base_url('css/buttons.dataTables.min.css')?>">


<script src="<?= base_url('js/datatable/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('js/datatable/buttons.flash.min.js') ?>"></script>
<script src="<?= base_url('js/datatable/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('js/datatable/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('js/datatable/jszip.min.js') ?>"></script>
<script src="<?= base_url('js/datatable/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('js/datatable/vfs_fonts.js') ?>"></script>


</head>

<body>
    <div class="container-fulid bg-white p-3">
        <h3><?=$title?></h3>
        <div class="table-responsive">
            <br>
            <table id="user_dataex" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Form No.</th>
                        <th>Customer Name</th>
                        <th>Customer Type</th>
                        <th>Topic</th>
                        <th>Sales Reps</th>
                        <th>Date Creste</th>
                        <th>Status</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>

</body>

</html>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      var dataTable = $('#user_dataex').DataTable({  
           "processing":true,
           "serverSide":true,
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'main/report/fetch_userex'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0,1],  
                     "orderable":false,  
                },  
           ],
           dom: 'Bfrtip',
                "buttons": [
                    {
                        extend: 'copyHtml5',
                        title: 'Report Credit request form Export '
                    },
                    {
                        extend: 'excelHtml5',
                        autoFilter: true,
                        title: 'Report Credit request form Export '
                    }
                ]
      });  
 });  
 </script> 