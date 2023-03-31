<div data-id="student-add" class="container__body__content student-add tab-content">
    <div class="container__body__content__title">
        <p class="container__body__content__title__p">
            Add New Student
        </p>
    </div>
    <div class='container__body__content__content'>
        <div class="student">
            <form class="w-100 d-flex justify-content-center align-items-center flex-column" action="" method="POST">
                <table class="student-table w-100">
                    <tr>
                        <td>
                            <label for="" class="container__body__content__content__label">Student's id</label>
                        </td>
                        <td>
                            <input id="input-id-student" name="" type="text" class="container__body__content__content__input" placeholder="Nhập MSSV sinh viên tại đây...">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="container__body__content__content__label">Student's name</label>
                        </td>
                        <td>
                            <input id="input-name-student" name="" type="text" class="container__body__content__content__input" placeholder="Nhập tên sinh viên tại đây...">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="container__body__content__content__label">Student's gender</label>
                        </td>
                        <td>
                            <select name="" id="input-gender-student" class="form-control">
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
                            <input id="input-birth-student" name="" type="text" class="container__body__content__content__input" placeholder="Nhập nơi sinh của sinh viên tại đây...">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="container__body__content__content__label">Student's address</label>
                        </td>
                        <td>
                            <textarea id="student-des" class="student-des"></textarea>
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
                <button type="submit" id="btn-addStudent" name="" class="w-100 container__body__content__content__btn btn btn-primary mt-3">
                    Add
                </button>
            </form>
        </div>
    </div>
</div>