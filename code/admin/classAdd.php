<div data-id="class-add" class="container__body__content class-add tab-content">
    <div class="container__body__content__title">
        <p class="container__body__content__title__p">
            Insert class
        </p>
    </div>
    <div class='container__body__content__content'>
        <div class="class">
            <form class="w-100 d-flex justify-content-center align-items-center flex-column" action="" method="POST">
                <table class="class-table w-100">
                    <tr>
                        <td>
                            <label for="" class="container__body__content__content__label">Mã lớp</label>
                        </td>
                        <td>
                            <input id="input-id-class" name="" type="text" class="container__body__content__content__input" placeholder="Nhập mã lớp tại đây...">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="container__body__content__content__label">Tên lớp</label>
                        </td>
                        <td>
                            <input id="input-name-class" name="" type="text" class="container__body__content__content__input" placeholder="Nhập tên lớp tại đây...">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="" class="container__body__content__content__label">Mã khoa</label>
                        </td>
                        <td>
                            <?php
                            $infoForClass = new info();
                            $showSchool = $infoForClass->showKhoa();
                            ?>
                            <select id="select-school-class" name="select" class="form-control">
                                <option disabled selected>Chọn khoa</option>
                                <?php
                                if ($showSchool) {
                                    foreach ($showSchool as $khoa) {
                                ?>
                                        <option value="<?php echo $khoa['tenKhoa'] ?>"><?php echo $khoa['tenKhoa']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <button type="submit" id="btn-addClass" name="" class="w-100 container__body__content__content__btn btn btn-primary mt-3">
                    Enter
                </button>
            </form>
        </div>
    </div>
</div>