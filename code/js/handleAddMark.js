const addMark = document.querySelector("#btn-addMark");
addMark.addEventListener('click', (e) => {
    e.preventDefault();
    const select_student_mark = document.querySelector("#select-student-mark").value;
    const select_subjects_mark = document.querySelector("#select-subjects-mark").value;
    const input_mark = document.querySelector("#input-mark").value;
    if (!select_student_mark || !select_subjects_mark || !input_mark) {
        swal({
            title: "Ops!",
            text: "Bạn đã nhập thiếu thông tin!",
            icon: "error",
            button: "Nhập lại!",
        });
        return
    }
    console.log(select_student_mark, input_mark);
    axios.post("../admin/php/intermediateAddMark.php", JSON.stringify({
        select_student_mark: select_student_mark,
        select_subjects_mark: select_subjects_mark,
        input_mark: input_mark
    }))
        .then((Response) => {
            console.log(Response.data);
            if (Response.data == true) {
                swal({
                    title: "Success",
                    text: "Bạn đã nhập điểm cho sinh viên này thành công",
                    icon: "success",
                    button: "OK",
                });
                return
            }
            else
                swal({
                    title: "Ops!",
                    text: "Có lỗi!",
                    icon: "error",
                    button: "Nhập lại!",
                });
        })
        .catch((e) => {
            swal({
                title: "Ops!",
                text: "Có lỗi!",
                icon: "error",
                button: "Nhập lại!",
            });
        })
})