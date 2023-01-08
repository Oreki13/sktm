const deleteDataPengajuan = (url, token) => {
    const formData = new FormData();
    formData.append("is_deleted", 1);
    Swal.fire({
        title: "Apakah kamu yakin?",
        text: "Kamu tidak bisa mengembalikan data yang sudah di hapus",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(url, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": token,
                },
                body: formData,
            })
                .then((c) => {
                    if (c.ok) {
                        Swal.fire(
                            "Deleted!",
                            "Your file has been deleted.",
                            "success"
                        ).then(() => {
                            window.location.href = "/admin";
                        });
                    } else {
                        Swal.fire("Failed!", "Ada sesuatu yang salah", "error");
                    }
                })
                .catch((e) => {
                    Swal.fire("Failed!", "Ada sesuatu yang salah", "failed");
                });
        }
    });
};
const updateStatusDataPengajuan = (data, url, token) => {
    const formData = new FormData();
    formData.append("status", data == "menolak" ? 2 : 1);
    Swal.fire({
        title: "Apakah kamu yakin?",
        text: "Yakin ingin " + data + " pengajuan ini",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(url, {
                method: "POST",

                headers: {
                    "X-CSRF-TOKEN": token,
                },
                body: formData,
            })
                .then((c) => {
                    console.log(c);
                    if (c.ok) {
                        const status =
                            data == "menolak" ? "Ditolak!" : "Diterima!";
                        Swal.fire(
                            "Updated!",
                            "Pengajuan telah " + status,
                            "success"
                        ).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire("Failed!", "Ada sesuatu yang salah", "error");
                    }
                })
                .catch((e) => {
                    Swal.fire("Failed!", "Ada sesuatu yang salah", "failed");
                });
        }
    });
};
const updateDataPengajuan = () => {
    Swal.fire({
        title: "Apakah kamu yakin?",
        text: "Yakin data yang di update sudah benar?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
    }).then((result) => {
        if (result.isConfirmed) {
            document.forms["formPengajuan"].submit();
        }
    });
};
