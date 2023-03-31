<div data-id="student-search" class="container__body__content re-pass tab-content">
    <div class="container__body__content__title">
        <p class="container__body__content__title__p">
            Tìm kiếm sinh viên theo mã số sinh viên
        </p>
    </div>
    <form action="./resultFromSearch.php" class='container__body__content__content' method="POST">
        <div>
            <label for="" class="container__body__content__content__label">Nhập MSSV:</label>
            <input type="text" name="mssv_value" class="container__body__content__content__input" placeholder="Nhập MSSV tại đây...">
        </div>
        <input type="submit" name="btn-search" class="mt-3 container__body__content__content__btn btn btn-primary " value="Search">
    </form>
</div>