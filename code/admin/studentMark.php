<?php
$studentForMark = new student();
$showStudentForMark = $studentForMark->showStudent();
$InfoByStudentForMark = new info();
?>
<div data-id="student-list-mark" class="container__body__content student-list-mark tab-content">
    <div class="container__body__content__title">
        <p class="container__body__content__title__p">
            Student list
        </p>
    </div>
    <div class='container__body__content__content'>
        <table class="table-student-mark w-100">
            <thead>
                <tr>
                    <th> MSSV</th>
                    <th> Họ tên sinh viên</th>
                    <th> Giới tính</th>
                    <th> Lớp</th>
                    <th> Khoa</th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($showStudentForMark) {
                    foreach ($showStudentForMark as $student) {
                ?>
                        <tr>
                            <td><?php echo $student['mssv'] ?></td>
                            <td><?php echo $student['hoTen'] ?></td>
                            <td><?php echo $student['gioiTinh'] ?></td>

                            <td>
                                <?php
                                $getClassName = $InfoByStudentForMark->getTenLop($student['maLop']);
                                echo $getClassName['tenLop'];
                                ?>
                            </td>
                            <td>
                                <?php
                                $getSchoolName = $InfoByStudentForMark->getTenKhoa($student['maKhoa']);
                                echo $getSchoolName['tenKhoa'];
                                ?>
                            </td>
                            <td>
                                <div class="acion-student d-flex justify-content-center align-items-center flex-column">
                                    <a href="showMarkByStudent.php?studentID=<?php echo $student['mssv'] ?>" class="btn btn-primary mb-2">Xem điểm</a>
                                </div>
                            </td>
                        </tr>
                <?php }
                } ?>
        </table>
    </div>
</div>