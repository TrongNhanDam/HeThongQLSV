const student_item = document.querySelectorAll('.student-item');
student_item.forEach((item) => {
    const student_id = item.querySelector(".student-id").innerText;
    item.querySelector(".btn-delete-student").addEventListener('click', (e) => {
        e.preventDefault();
        console.log(student_id);
        swal({
            title: "Bạn có chắc muốn xóa sinh viên này không?",
            text: "Có thật sự muốn xóa bạn này không",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    axios.post("../admin/php/intermediateDeleteStudent.php", JSON.stringify({
                        student_id: student_id
                    }))
                        .then((response) => {
                            console.log(response.data);
                            if (response.data == true) {
                                swal("Sinh viên này đã bị bạn xóa", {
                                    icon: "success",
                                })
                            }
                        })
                        .catch((error) => {
                            swal({
                                title: "Error!",
                                text: "Có lỗi!",
                                icon: "success",
                            });
                        })
                } else {
                    swal("Sinh viên này vẫn an toàn");
                }
            });
    })
})