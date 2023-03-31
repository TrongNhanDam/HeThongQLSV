const addClass = document.querySelector("#btn-addClass");
addClass.addEventListener('click', (e) => {
    e.preventDefault();
    const input_id_class = document.querySelector("#input-id-class").value;
    const input_name_class = document.querySelector("#input-name-class").value;
    const select_school_class = document.querySelector("#select-school-class").value;

    if (!input_id_class ||
        !input_name_class ||
        !select_school_class) {

        swal({
            title: "Ops!",
            text: "Bạn đã nhập thiếu thông tin!",
            icon: "error",
            button: "Nhập lại!",
        });
        return
    }
    console.log(input_name_class, input_id_class, select_school_class);
    axios.post("../admin/php/intermediateAddClass.php", JSON.stringify({
        input_id_class: input_id_class,
        input_name_class: input_name_class,
        select_school_class: select_school_class
    }))
        .then((Response) => {
            console.log(Response.data);
            if (Response.data == true) {
                swal({
                    title: "Success",
                    text: "Bạn đã thêm thành công 1 lớp",
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
                text: "Có lỗi lạ!",
                icon: "error",
                button: "Nhập lại!",
            });
        })
})