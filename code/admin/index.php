<?php
include_once __DIR__ . '/../lib/session.php';
include_once __DIR__ . '/../lib/database.php';
include_once __DIR__ . '/../class/student.php';
include_once __DIR__ . '/../class/mark.php';
include_once __DIR__ . '/../class/info-public.php';
include_once __DIR__ . '/../class/quantity.php';

Session::checkSession();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống quản lí sinh viên UTC</title>
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
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/index-admin-repass.css">
    <link rel="stylesheet" href="../css/index-admin-student-add.css">
    <link rel="stylesheet" href="../css/index-admin-student-list.css">
    <link rel="stylesheet" href="../css/index-admin-mark-add.css">
    <link rel="stylesheet" href="../css/index-admin-subjects-add.css">
    <link rel="stylesheet" href="../css/index-admin-school-add.css">
    <link rel="stylesheet" href="../css/index-admin-class-add.css">
    <link rel="stylesheet" href="../css/index-admin-school-list.css">
    <link rel="stylesheet" href="../css/index-admin-class-list.css">
    <link rel="stylesheet" href="../css/index-admin-subjects-list.css">
    <link rel="stylesheet" href="../css/index-admin-student-mark.css">
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
                <p class="container__header__nav__item tab-userprofile item"><i class='nav-icon bx bx-edit'></i>User Profile</p>
                <p data-id="re-pass" class=" container__header__nav__item item"><i class='nav-icon bx bx-lock-alt'></i>Change Password</p>
            </div>
        </div>
        <div class="container__body">
            <div class="container__body__sidebar">
                <div class="card mb-2">
                    <div class="card-header">
                        <p class="btn m-0 p-0 fw-bold d-flex justify-content-center align-items-center" data-bs-toggle="collapse" href="#target1">
                            Sinh viên
                        </p>
                    </div>
                    <p id="target1" data-id="student-add" class="collapse card-body m-0 item">
                        Thêm sinh viên
                    </p>
                    <p id="target1" data-id="student-list" class="collapse card-body m-0 item">
                        Liệt kê sinh viên
                    </p>
                    <p id="target1" data-id="student-list-mark" class="collapse card-body m-0 item">
                        Xem điểm của từng sinh viên
                    </p>
                    <p id="target1" data-id="student-search" class="collapse card-body m-0 item">
                        Tìm kiếm sinh viên
                    </p>
                </div>
                <div class="card mb-2">
                    <div class="card-header">
                        <p class="btn m-0 p-0 fw-bold d-flex justify-content-center align-items-center" data-bs-toggle="collapse" href="#target2">
                            Điểm số
                        </p>
                    </div>
                    <p id="target2" data-id="mark-add" class="collapse card-body m-0 item">
                        Nhập điểm
                    </p>
                </div>
                <div class="card mb-2">
                    <div class="card-header">
                        <p class="btn m-0 p-0 fw-bold d-flex justify-content-center align-items-center" data-bs-toggle="collapse" href="#target3">
                            Khoa
                        </p>
                    </div>
                    <p data-id="school-add" id="target3" class="collapse card-body m-0 item">
                        Thêm khoa
                    </p>
                    <p data-id="school-list" id="target3" class="collapse card-body m-0 item">
                        Liệt kê khoa
                    </p>

                </div>
                <div class="card mb-2">
                    <div class="card-header">
                        <p class="btn m-0 p-0 fw-bold d-flex justify-content-center align-items-center" data-bs-toggle="collapse" href="#target4">
                            Học phần
                        </p>
                    </div>
                    <p data-id="subjects-add" id="target4" class="collapse card-body m-0 item">
                        Thêm học phần
                    </p>
                    <p data-id="subjects-list" id="target4" class="collapse card-body m-0 item">
                        Liệt kê học phần
                    </p>

                </div>
                <div class="card mb-2">
                    <div class="card-header">
                        <p class="btn m-0 p-0 fw-bold d-flex justify-content-center align-items-center" data-bs-toggle="collapse" href="#target5">
                            Lớp
                        </p>
                    </div>
                    <p data-id="class-add" id="target5" class="collapse card-body m-0 item">
                        Thêm lớp
                    </p>
                    <p data-id="class-list" id="target5" class="collapse card-body m-0 item">
                        Liệt kê lớp
                    </p>

                </div>
                <div class="card mb-2">
                    <div class="card-header">
                        <p class="btn m-0 p-0 fw-bold d-flex justify-content-center align-items-center" data-bs-toggle="collapse" href="#target6">
                            Số lượng sinh viên
                        </p>
                    </div>
                    <p data-id="quantity-school" id="target6" class="collapse card-body m-0 item">
                        Số sinh viên theo khoa
                    </p>
                    <p data-id="quantity-class" id="target6" class="collapse card-body m-0 item">
                        Số lượng sinh viên theo lớp
                </div>
            </div>
            <?php
            include_once "./changepass.php";
            include_once "./studentAdd.php";
            include_once "./studentList.php";
            include_once "./mark_add.php";
            include_once "./subjectsAdd.php";
            include_once "./schoolAdd.php";
            include_once "./schoolList.php";
            include_once "./classAdd.php";
            include_once "./classList.php";
            include_once "./subjectsList.php";
            include_once "./studentMark.php";
            include_once "./quantityClass.php";
            include_once "./quantitySchool.php";
            include_once "./studentSearch.php";
            ?>
        </div>
        <p class="container__copyright">
            © Copyright 2022 DEV Nhân. All rights reserved. Design by--<a href="#" class="copyright">devnhan.com</a>
        </p>
    </div>
</body>
<script src="../js/tabAdmin.js"></script>
<script src="../js/handleRepass.js"></script>
<script src="../js/handleAddStudent.js"></script>
<script src="../js/handleDeleteStudent.js"></script>
<script src="../js/handleAddMark.js"></script>
<script src="../js/handleAddSubjects.js"></script>
<script src="../js/handleAddSchool.js"></script>
<script src="../js/handleAddClass.js"></script>

</html>