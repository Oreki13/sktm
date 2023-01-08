const deleteDataPengajuan = (id, url) => {
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
            }).then((c) => {
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
            });
        }
    });
};

const re = () => {
    console.log("asdasd");
};
console.log("asdasd");
