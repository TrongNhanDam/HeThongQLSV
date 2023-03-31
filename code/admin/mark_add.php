<div data-id="mark-add" class="container__body__content mark-add tab-content">
    <div class="container__body__content__title">
        <p class="container__body__content__title__p">
            Enter grades for students
        </p>
    </div>
    <div class='container__body__content__content'>
        <div class="mark">
            <form class="w-100 d-flex justify-content-center align-items-center flex-column" action="" method="POST">
                <table class="mark-table w-100">
                    <tr>
                        <td>
                            <label for="" class="container__body__content__content__label">Sinh viên</label>
                        </td>
                        <td>
                            <?php
                            $studentForMark = new student();
                            $showStudentForMark = $studentForMark->showStudent();
                            ?>
                            <select id="select-student-mark" name="select" class="form-control">
                                <option disabled selected>Chọn sinh viên</option>
                                <?php
                                if ($showStudentForMark) {
                                    foreach ($showStudentForMark as $student) {
                                ?>
                                        <option value="<?php echo $student['mssv'] ?>"><?php echo $student['hoTen']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="container__body__content__content__label">Lớp học phần</label>
                        </td>
                        <td>
                            <?php
                            $infoForMark = new info();
                            $showHP = $infoForMark->showHP();
                            ?>
                            <select id="select-subjects-mark" name="select" class="form-control">
                                <option disabled selected>Chọn học phần</option>
                                <?php
                                if ($showHP) {
                                    foreach ($showHP as $HP) {
                                ?>
                                        <option value="<?php echo $HP['maHP'] ?>"><?php echo $HP['tenHP']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="container__body__content__content__label">Nhập điểm</label>
                        </td>
                        <td>
                            <input id="input-mark" name="" type="text" class="container__body__content__content__input" placeholder="Nhập điểm cho sinh viên tại đây...">
                        </td>
                    </tr>
                </table>
                <button type="submit" id="btn-addMark" name="" class="w-100 container__body__content__content__btn btn btn-primary mt-3">
                    Enter
                </button>
            </form>
        </div>
    </div>
</div>