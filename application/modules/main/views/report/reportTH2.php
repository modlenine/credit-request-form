<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="<?= base_url('js/datatable/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('js/datatable/buttons.flash.min.js') ?>"></script>
    <script src="<?= base_url('js/datatable/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('js/datatable/buttons.print.min.js') ?>"></script>
    <script src="<?= base_url('js/datatable/jszip.min.js') ?>"></script>
    <script src="<?= base_url('js/datatable/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('js/datatable/vfs_fonts.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('#report_list thead th').each(function() {
                var title = $(this).text();
                $(this).html(title + ' <input type="text" class="col-search-input" placeholder="Search ' + title + '" />');
            });

            var table = $('#report_list').DataTable({
                "columnDefs": [{
                    "searching": false,
                    "orderable": false,
                    "targets": "_all"
                }],
                dom: 'Bfrtip',
                "buttons": [{
                        extend: 'copyHtml5',
                        title: 'Credit request form'
                    },
                    {
                        extend: 'excelHtml5',
                        autoFilter: true,
                        title: 'Credit request form'
                    }
                ],
                "order": [
                    [0, 'desc']
                ],
                responsive: true
            });


            table.columns().every(function() {
                var table = this;
                $('input', this.header()).on('keyup change', function() {
                    if (table.search() !== this.value) {
                        table.search(this.value).draw();
                    }
                });
            });




        });
    </script>
</head>

<body>
    <div class="container-fulid bg-white p-3">

        <div class="datatable-container">
            <h2>{report_title}</h2>
            <table name="report_list" id="report_list" class="table table-striped table-bordered" width="100%">

                <thead>
                    <tr>
                        <th>เลขที่คำขอ</th>
                        <th>ชื่อลูกค้า</th>
                        <th>ประเภทลูกค้า</th>
                        <th>หัวข้อ</th>
                        <th>ผู้ดูแล</th>
                        <th>วันที่ออกเอกสาร</th>
                        <th>สถานะ</th>

                    </tr>
                </thead>

                <tbody>
                   <?php foreach(getdataToReport() as $rs){

                       
                       
                       
                    ?>
                    <tr>
                        <td><?=$rs->crf_formno?></td>
                        <td><?=$rs->crfcus_name?></td>
                        <td><?=$rs->crf_alltype_subname?></td>
                        <td><?=$rs->crf_topic?></td>
                        <td><?=$rs->crfcus_salesreps?></td>
                        <td><?=conDateFromDb($rs->crf_datecreate)?></td>
                        <td class="statuscolor"><b><?=$rs->crf_status?></b></td>
                    </tr>
                   <?php }; ?>
                </tbody>

            </table>
        </div>

    </div>
</body>

</html>