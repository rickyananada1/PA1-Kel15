$(document).ready(function(){
    //check admin password
    $("#current_password").keyup(function(){
        var current_password = $("#current_password").val();
        // alert(current_password);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url : '/petani/check-petani-password',
            data: {current_password:current_password},
            success:function(resp){
                if (resp == "false") {
                    $("#check_password").html("<font color=\"red\"> Current Password Salah!</font>");
                }else if(resp == "true")
                {
                    $("#check_password").html("<font color=\"green\"> Current Password Benar!</font>");
                }
            }, error:function(){
                alert('Error');
            }
        });
    })
});

// $(document).ready(function(){
//     //check admin password
//     $("#current_password").keyup(function(){
//         var current_password = $("#current_password").val();
//         // alert(current_password);
//         $.ajax({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             type:'POST',
//             url : '/admin/check-admin-password',
//             data: {current_password:current_password},
//             success:function(resp){
//                 if (resp == "false") {
//                     $("#check_password").html("<font color=\"red\"> Current Password Salah!</font>");
//                 }else if(resp == "true")
//                 {
//                     $("#check_password").html("<font color=\"green\"> Current Password Benar!</font>");
//                 }
//                 // Menampilkan alert
//                 showAlert(resp);
//             }, error:function(){
//                 alert('Error');
//             }
//         });
//     });

//     // Fungsi untuk menampilkan alert
//     function showAlert(resp) {
//         var alertClass, alertMessage;

//         if (resp == "false") {
//             alertClass = "alert-danger";
//             alertMessage = "Current Password Salah!";
//         } else if (resp == "true") {
//             alertClass = "alert-success";
//             alertMessage = "Current Password Benar!";
//         } else {
//             // Jika respons tidak sesuai dengan yang diharapkan
//             return;
//         }

//         var alertHTML = '<div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert">' +
//                             '<strong></strong> ' + alertMessage +
//                             '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
//                                 '<span aria-hidden="true">&times;</span>' +
//                             '</button>' +
//                         '</div>';

//         // Menghapus alert sebelumnya, jika ada
//         $(".custom-alert").remove();

//         // Menambahkan alert baru ke dalam form
//         $(".forms-sample").prepend(alertHTML);
//     }
// });
// $(document).ready(function() {
//     // Mengubah current password saat pengguna mengetik
//     $("#current_password").keyup(function() {
//         var current_password = $(this).val();

//         // Memeriksa current password menggunakan AJAX
//         checkCurrentPassword(current_password);
//     });

//     // Fungsi untuk memeriksa current password menggunakan AJAX
//     function checkCurrentPassword(current_password) {
//         $.ajax({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             type: 'POST',
//             url: '/petani/check-petani-password',
//             data: { current_password: current_password },
//             success: function(resp) {
//                 if (resp == "false") {
//                     $("#check_password").html("<font color=\"red\"> Current Password Salah!</font>");
//                 } else if (resp == "true") {
//                     $("#check_password").html("<font color=\"green\"> Current Password Benar!</font>");
//                 }
//             },
//             error: function() {
//                 alert('Error');
//             }
//         });
//     }
// });
