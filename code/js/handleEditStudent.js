const btn_editStudent = document.querySelector('#btn-editStudent');
btn_editStudent.addEventListener("click", (e) => {
    e.preventDefault();
    const input_id_student = document.querySelector('#input-id-student').value;
    const input_name_student = document.querySelector('#input-name-student').value;
    const input_gender_student = document.querySelector('#input-gender-student').value;
    const input_birth_student = document.querySelector('#input-birth-student').value;
    const student_des = document.querySelector('#student-des').value;
    const select_class_student = document.querySelector('#select-class-student').value;
    const select_school_student = document.querySelector('#select-school-student').value;
    if (
        !input_id_student ||
        !input_name_student ||
        !input_gender_student ||
        !input_birth_student ||
        !student_des ||
        !select_class_student ||
        !select_school_student
    ) {
        swal({
            title: "Ops!",
            text: "Bạn đã nhập thiếu thông tin!",
            icon: "error",
            button: "Nhập lại!",
        });
        return
    }
    console.log(input_name_student, select_school_student);
    axios.post("../admin/php/intermediateEditStudent.php", JSON.stringify({
        input_id_student: input_id_student,
        input_name_student: input_name_student,
        input_gender_student: input_gender_student,
        input_birth_student: input_birth_student,
        student_des: student_des,
        select_class_student: select_class_student,
        select_school_student: select_school_student
    }
    ))
        .then((Response) => {
            console.log(Response.data);
            if (Response.data == true) {
                swal({
                    title: "Success",
                    text: "Bạn đã sửa thông tin sinh viên thành công!",
                    icon: "success",
                    button: "OK!",
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
        .catch((err) => {
            swal({
                title: "Ops!",
                text: "Đã xảy ra lỗi!",
                icon: "error",
                button: "Nhập lại!",
            });
        })
})