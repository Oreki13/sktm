@push('sw2')
    <script>
        const showAlert = (title, deskripsi, icon, confirmBtn) => {

            Swal.fire({
                title: title,
                text: deskripsi,
                icon: icon,
                confirmButtonText: confirmBtn
            })
        }
    </script>
@endpush
