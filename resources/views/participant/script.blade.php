<script>
    function deleteItem(e) {
        let id = e.getAttribute('data-id');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: true
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Data will be deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: "participants/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": "DELETE",
                        },
                        success: function(data) {
                            if (data.success) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.message
                                }).then((result) => {
                                    // Reload the Page
                                    location.reload();
                                })
                            } else {
                                swalWithBootstrapButtons.fire(
                                    data.title,
                                    data.message,
                                    "warning"
                                ).then((result) => {
                                    // Reload the Page
                                    location.reload();
                                })
                            }
                        }
                    });
                }
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                );
            }
        });
    }
</script>
