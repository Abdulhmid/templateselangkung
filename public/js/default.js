toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};

function swal_alert(el, custom_msg, method, token) {

    custom_msg = custom_msg || "Anda yakin mau menhapus data ini ?";
    method = method || "get";

    msg = custom_msg;
    swal({
            title: msg,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes!',
            closeOnConfirm: true
        },
        function (isConfirm) {
            if (isConfirm) {
                if (method == "get") {
                    location.replace(el);
                } else {

                    $.ajax({
                        url: el.href,
                        type: 'post',
                        data: {_method: 'delete', _token: token},
                        success: function (result) {

                            $('table').DataTable().ajax.reload();

                            toastr["success"]("Anterin", "Data Berhasil di hapus");
                        }
                    });
                }

            }
        });
}

$(document).on('click','#reset',function(){
    location.reload();
});