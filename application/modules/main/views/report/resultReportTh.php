<div class="datatable-container">
    <table name="report_list" id="report_list" class="table table-striped table-bordered table-responsive" width="100%">

        <thead>
            <tr>
                <th>เลขที่คำขอ</th>
                <th>รหัสลูกค้า</th>
                <th>ชื่อลูกค้า</th>
                <th>ประเภทลูกค้า</th>
                <th>หัวข้อ</th>
                <th>ผู้ดูแล</th>
                <th>วันที่ออกเอกสาร</th>
                <th>สถานะ</th>

            </tr>
        </thead>

        <tbody>
            <?php foreach ($rss as $rs) {

            ?>
                <tr>
                    <td><?= $rs->crf_formno ?></td>
                    <td><?= $rs->crfcus_code ?></td>
                    <td><?= $rs->crfcus_name ?></td>
                    <td><?= $rs->crf_alltype_subname ?></td>
                    <td><?= $rs->crf_topic ?></td>
                    <td><?= $rs->crfcus_salesreps ?></td>
                    <td><?= conDateFromDb($rs->crf_datecreate) ?></td>
                    <td class="statuscolor"><b><?= $rs->crf_status ?></b></td>
                </tr>
            <?php }; ?>
        </tbody>

    </table>
</div>