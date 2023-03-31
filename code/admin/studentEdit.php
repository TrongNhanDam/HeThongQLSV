<?php
include_once __DIR__ . '/../lib/session.php';
include_once __DIR__ . '/../lib/database.php';
include_once __DIR__ . '/../class/student.php';
include_once __DIR__ . '/../class/info-public.php';
Session::checkSession();
$student = new Student();
$showStudentById = $student->getStudentById($_GET['studentID']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sinh viên</title>
    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- link boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- link jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- link swal  -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- link css -->
    <link rel="stylesheet" href="../css/index-admin-student-edit.css">

</head>

<body>

    <div class="container-fluid">
        <div class="container__header">
            <div class="container__header__logo">
                Hệ thống quản lí sinh viên UTC
            </div>
            <div class="container__header__account">
                <div class="container__header__account__img">
                    <img src="./ava.webp" alt="" class="container__header__account__img__item">
                </div>
                <p class="container__header__account__p">
                    Hello
                    <?php
                    echo  Session::get('NameQTDL');
                    ?>
                </p>
                <span class="container__header__account__dash"></span>
                <?php
                if (isset($_GET['action']) && ($_GET['action']) == 'logout') {
                    Session::destroy();
                }
                ?>
                <a href="?action=logout" class="container__header__account__logout">Log out</a>
            </div>
        </div>
        <div class="container__header2">
            <div class="container__header__nav">
                <p class="container__header__nav__item fw-bold bg-info bg-gradient">Admin<i class='bx bx-right-arrow'></i></p>
            </div>
        </div>
        <div class="container__body">
            <div class="container__body__content student-edit">
                <div class="container__body__content__title">
                    <p class="container__body__content__title__p">
                        Edit Student
                    </p>
                </div>
                <div class='container__body__content__content'>
                    <div class="student w-50">
                        <form class="w-100 d-flex justify-content-center align-items-center flex-column" action="" method="POST">
                            <table class="student-table w-100">
                                <tr>
                                    <td>
                                        <label for="" class="container__body__content__content__label">Student's id</label>
                                    </td>
                                    <td>
                                        <input disabled value="<?php echo $showStudentById['mssv'] ?>" id="input-id-student" name="" type="text" class="container__body__content__content__input" placeholder="Nhập MSSV sinh viên tại đây...">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="" class="container__body__content__content__label">Student's name</label>
                                    </td>
                                    <td>
                                        <input value="<?php echo $showStudentById['hoTen'] ?>" id="input-name-student" name="" type="text" class="container__body__content__content__input" placeholder="Nhập tên sinh viên tại đây...">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="" class="container__body__content__content__label">Student's gender</label>
                                    </td>
                                    <td>
                                        <select value="<?php echo $showStudentById['gioiTinh'] ?>" name="" id="input-gender-student" class="form-control">
                                            <option value="" disabled selected>Chọn giới tính</option>
                                            <option value="M">Nam</option>
                                            <option value="F">Nữ</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="" class="container__body__content__content__label">Student's place of birth</label>
                                    </td>
                                    <td>
                                        <input value="<?php echo $showStudentById['noiSinh'] ?>" id="input-birth-student" name="" type="text" class="container__body__content__content__input" placeholder="Nhập nơi sinh của sinh viên tại đây...">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="" class="container__body__content__content__label">Student's address</label>
                                    </td>
                                    <td>
                                        <textarea id="student-des" class="student-des"><?php echo $showStudentById['diaChi']; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="" class="container__body__content__content__label">Student's class ID</label>
                                    </td>
                                    <td>
                                        <?php
                                        include_once "../class/info-public.php";
                                        $lop = new info();
                                        $showLop = $lop->showLop();
                                        ?>
                                        <select id="select-class-student" name="select" class="form-control">
                                            <option disabled selected>Chọn lớp</option>
                                            <?php
                                            if ($showLop) {
                                                foreach ($showLop as $lop) {
                                            ?>
                                                    <option value="<?php echo $lop['tenLop'] ?>"><?php echo $lop['tenLop']; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="" class="container__body__content__content__label">Student's school ID</label>
                                    </td>
                                    <td>
                                        <?php
                                        $khoa = new info();
                                        $showKhoa = $khoa->showKhoa();
                                        ?>
                                        <select id="select-school-student" name="select" class="form-control">
                                            <option disabled selected>Chọn khoa</option>
                                            <?php
                                            if ($showKhoa) {
                                                foreach ($showKhoa as $khoa) {
                                            ?>
                                                    <option value="<?php echo $khoa['tenKhoa'] ?>"><?php echo $khoa['tenKhoa']; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <button type="submit" id="btn-editStudent" name="" class="w-100 container__body__content__content__btn btn btn-primary mt-3">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p class="container__copyright">
            © Copyright 2022 DEV Nhân. All rights reserved. Design by--<a href="#" class="copyright">devnhan.com</a>
        </p>
    </div>
</body>
<script src="../js/handleEditStudent.js"></script>

</html>