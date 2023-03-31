<?php
$quantityClass = new quantity();
$showlQuantityClass = $quantityClass->quantityClass();
?>
<div data-id="quantity-class" class="container__body__content class-list tab-content">
    <div class="container__body__content__title">
        <p class="container__body__content__title__p">
            Số lượng sinh viên theo lớp
        </p>
    </div>
    <div class='container__body__content__content'>
        <table class="table-class w-100">
            <thead>
                <tr>
                    <th> Mã lớp</th>
                    <th> Tên lớp</th>
                    <th> Số lượng sinh viên</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($showlQuantityClass) {
                    foreach ($showlQuantityClass as $class) {
                ?>
                        <tr class="class-item">
                            <td><?php echo $class['maLop'] ?></td>
                            <td><?php echo $class['tenLop'] ?></td>
                            <td><?php echo $class['soSV'] ?></td>
                        </tr>
                <?php }
                } ?>
        </table>
    </div>
</div>