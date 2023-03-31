<?php
include_once __DIR__ . '/../lib/session.php';
include_once __DIR__ . '/../lib/database.php';
include_once __DIR__ . '/../class/info-public.php';
$info = new info();
$showMarkBySchool = $info->showKetQuaBySchool($_GET['schoolID']);
Session::checkSession();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng điểm của khoa <?php echo $_GET['schoolID'] ?></title>
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
    <link rel="stylesheet" href="../css/index-admin-school-listMark.css">

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
                        Bảng điểm của khoa <?php echo $_GET['schoolID'] ?>
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
                                <th> Điểm TB</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            var_dump(
                                $showMarkBySchool
                            );

                            if ($showMarkBySchool) {
                                foreach ($showMarkBySchool as $ketqua) {
                            ?>
                                    <tr class="student-item">
                                        <td><?php echo $ketqua['mssv'] ?></td>
                                        <td><?php echo $ketqua['hoTen'] ?></td>
                                        <td><?php echo $ketqua['gioiTinh'] ?></td>
                                        <td><?php echo $ketqua['maLop'] ?></td>
                                        <td><?php echo $ketqua['maKhoa'] ?></td>
                                        <td><?php echo $ketqua['diemTB'] ?></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <p class="container__copyright">
            © Copyright 2022 DEV Nhân. All rights reserved. Design by--<a href="#" class="copyright">devnhan.com</a>
        </p>
    </div>
</body>

</html>