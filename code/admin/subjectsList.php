<?php
$listForSubjects = new info();
$showListForSubjects = $listForSubjects->showHP();
?>
<div data-id="subjects-list" class="container__body__content subjects-list tab-content">
    <div class="container__body__content__title">
        <p class="container__body__content__title__p">
            Subjects list
        </p>
    </div>
    <div class='container__body__content__content'>
        <table class="table-subject w-100">
            <thead>
                <tr>
                    <th> Mã học phần</th>
                    <th> Tên học phần</th>
                    <th> Số tín chỉ</th>
                    <th> Số tiết lý thuyết</th>
                    <th> Số tiết thực hành</th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($showListForSubjects) {
                    foreach ($showListForSubjects as $subject) {
                ?>
                        <tr class="subject-item">
                            <td><?php echo $subject['maHP'] ?></td>
                            <td><?php echo $subject['tenHP'] ?></td>
                            <td><?php echo $subject['soTinChi'] ?></td>
                            <td><?php echo $subject['soTietLT'] ?></td>
                            <td><?php echo $subject['soTietTH'] ?></td>
                            <td>
                                <div class="acion-subject d-flex justify-content-center align-items-center">
                                    <a href="subjectEdit.php?subjectID=<?php echo $subject['maHP'] ?>" class="btn btn-warning me-3">Edit</a>
                                    <button class="btn btn-danger btn-delete-subject">Delete</button>
                                </div>
                            </td>
                        </tr>
                <?php }
                } ?>
        </table>
    </div>
</div>