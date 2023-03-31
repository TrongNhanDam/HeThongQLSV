<?php
$student = new student();
$showStudent = $student->showStudent();
$InfoByStudent = new info();
?>
<div data-id="student-list" class="container__body__content student-list tab-content">
    <div class="container__body__content__title">
        <p class="container__body__content__title__p">
            Student list
        </p>
    </div>
    <div class='container__body__content__content'>
        <table class="table-student w-100">
            <thead>
                <tr>
                    <th> MSSV</th>
                    <th> Họ tên sinh viên</th>
                    <th> Giới tính</th>
                    <th> Nơi sinh</th>
                    <th> Địa chỉ</th>
                    <th> Lớp</th>
                    <th> Khoa</th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($showStudent) {
                    foreach ($showStudent as $student) {
                ?>
                        <tr class="student-item">
                            <td class="student-id"><?php echo $student['mssv'] ?></td>
                            <td><?php echo $student['hoTen'] ?></td>
                            <td><?php echo $student['gioiTinh'] ?></td>
                            <td><?php echo $student['noiSinh'] ?></td>
                            <td><?php echo $student['diaChi'] ?></td>
                            <td>
                                <?php
                                $getClassName = $InfoByStudent->getTenLop($student['maLop']);
                                echo $getClassName['tenLop'];
                                ?>
                            </td>
                            <td>
                                <?php
                                $getSchoolName = $InfoByStudent->getTenKhoa($student['maKhoa']);
                                echo $getSchoolName['tenKhoa'];
                                ?>
                            </td>
                            <td>
                                <div class="acion-student d-flex justify-content-center align-items-center flex-column">
                                    <a href="studentEdit.php?studentID=<?php echo $student['mssv'] ?>" class="btn btn-warning mb-2">Edit</a>
                                    <button class="btn btn-danger btn-delete-student">Delete</button>
                                </div>
                            </td>
                        </tr>
                <?php }
                } ?>
        </table>
    </div>
</div>