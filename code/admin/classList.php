<?php
$listForClass = new info();
$showlistForClass = $listForClass->showLop();
?>
<div data-id="class-list" class="container__body__content class-list tab-content">
    <div class="container__body__content__title">
        <p class="container__body__content__title__p">
            Class list
        </p>
    </div>
    <div class='container__body__content__content'>
        <table class="table-Class w-100">
            <thead>
                <tr>
                    <th> Mã lớp</th>
                    <th> Tên lớp</th>
                    <th> Thuộc khoa</th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($showlistForClass) {
                    foreach ($showlistForClass as $class) {
                ?>
                        <tr class="Class-item">
                            <td><?php echo $class['maLop'] ?></td>
                            <td><?php echo $class['tenLop'] ?></td>
                            <td>
                                <?php
                                $showSchoolByClass = $listForClass->getTenKhoa($class['maKhoa']);
                                echo $showSchoolByClass['tenKhoa'];
                                ?>
                            </td>
                            <td>
                                <div class="acion-class d-flex justify-content-center align-items-center">
                                    <a href="classEdit.php?classID=<?php echo $class['maLop'] ?>" class="btn btn-warning me-3">Edit</a>
                                    <button class="btn btn-danger btn-delete-class">Delete</button>
                                </div>
                            </td>
                        </tr>
                <?php }
                } ?>
        </table>
    </div>
</div>