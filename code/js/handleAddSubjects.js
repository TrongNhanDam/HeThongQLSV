const addSubject = document.querySelector("#btn-addSubject");
addSubject.addEventListener('click', (e) => {
    e.preventDefault();
    const input_id_subject = document.querySelector("#input-id-subject").value;
    const input_name_subject = document.querySelector("#input-name-subject").value;
    const input_credits_subject = document.querySelector("#input-credits-subject").value;
    const input_lab_subject = document.querySelector("#input-lab-subject").value;
    const input_theory_subject = document.querySelector("#input-theory-subject").value;

    if (!input_id_subject ||
        !input_name_subject ||
        !input_credits_subject ||
        !input_lab_subject ||
        !input_theory_subject) {

        swal({
            title: "Ops!",
            text: "Bạn đã nhập thiếu thông tin!",
            icon: "error",
            button: "Nhập lại!",
        });
        return
    }
    console.log();
    axios.post("../admin/php/intermediateAddSubjects.php", JSON.stringify({
        input_id_subject: input_id_subject,
        input_name_subject: input_name_subject,
        input_credits_subject: input_credits_subject,
        input_lab_subject: input_lab_subject,
        input_theory_subject: input_theory_subject
    }))
        .then((Response) => {
            console.log(Response.data);
            if (Response.data == true) {
                swal({
                    title: "Success",
                    text: "Bạn đã thêm thành công môn học",
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