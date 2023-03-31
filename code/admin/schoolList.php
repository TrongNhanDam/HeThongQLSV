<?php
$listForSchool = new info();
$showlistForSchool = $listForSchool->showKhoa();
?>
<div data-id="school-list" class="container__body__content school-list tab-content">
    <div class="container__body__content__title">
        <p class="container__body__content__title__p">
            School list
        </p>
    </div>
    <div class='container__body__content__content'>
        <table class="table-school w-100">
            <thead>
                <tr>
                    <th> Mã khoa</th>
                    <th> Tên khoa</th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($showlistForSchool) {
                    foreach ($showlistForSchool as $school) {
                ?>
                        <tr class="school-item">
                            <td><?php echo $school['maKhoa'] ?></td>
                            <td><?php echo $school['tenKhoa'] ?></td>
                            <td>
                                <div class="acion-school d-flex justify-content-center align-items-center">
                                    <a href="schoolEdit.php?schoolID=<?php echo $school['maKhoa'] ?>" class="btn btn-warning me-3">Edit</a>
                                    <button class="btn btn-danger btn-delete-school me-3">Delete</button>
                                    <a href="#" class="btn btn-info me-3">Xem điểm theo khoa</a>
                                </div>
                            </td>
                        </tr>
                <?php }
                } ?>
        </table>
    </div>
</div>