const addSchool = document.querySelector("#btn-addSchool");
addSchool.addEventListener('click', (e) => {
    e.preventDefault();
    const input_id_school = document.querySelector("#input-id-school").value;
    const input_name_school = document.querySelector("#input-name-school").value;

    if (!input_id_school ||
        !input_name_school) {

        swal({
            title: "Ops!",
            text: "Bạn đã nhập thiếu thông tin!",
            icon: "error",
            button: "Nhập lại!",
        });
        return
    }
    console.log();
    axios.post("../admin/php/intermediateAddSchool.php", JSON.stringify({
        input_id_school: input_id_school,
        input_name_school: input_name_school
    }))
        .then((Response) => {
            console.log(Response.data);
            if (Response.data == true) {
                swal({
                    title: "Success",
                    text: "Bạn đã thêm thành công 1 khoa",
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