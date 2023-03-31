<?php
$quantitySchool = new quantity();
$showQuantitySchool = $quantitySchool->quantitySchool();
?>
<div data-id="quantity-school" class="container__body__content school-list tab-content">
    <div class="container__body__content__title">
        <p class="container__body__content__title__p">
            Số lượng theo sinh viên theo khoa
        </p>
    </div>
    <div class='container__body__content__content'>
        <table class="table-school w-100">
            <thead>
                <tr>
                    <th> Mã khoa</th>
                    <th> Tên khoa</th>
                    <th> Số lượng sinh viên</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($showQuantitySchool) {
                    foreach ($showQuantitySchool as $school) {
                ?>
                        <tr class="school-item">
                            <td><?php echo $school['maKhoa'] ?></td>
                            <td><?php echo $school['tenKhoa'] ?></td>
                            <td><?php echo $school['soSV'] ?></td>
                        </tr>
                <?php }
                } ?>
        </table>
    </div>
</div>