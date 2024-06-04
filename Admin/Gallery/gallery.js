
$(document).ready(function(){
    $("#avatar-img").click(function(){
        $('#logoutModal').modal('show');
    });
    
    // JavaScript to handle file uploads
    $(".btn-primary").click(function(){
        $(this).siblings('input[type="file"]').click();
    });

    $("input[type='file']").change(function(){
        var form = $(this).closest('form');
        var formData = new FormData(form[0]);

        $.ajax({
            url: '<?php echo $_SERVER["PHP_SELF"]; ?>', // Same PHP file
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                // Handle success response, like updating the image source
                $(form).siblings('img').attr('src', response);
            },
            error: function(xhr, status, error){
                // Handle error
                console.log(xhr.responseText);
            }
        });
    });
});



// document.addEventListener('DOMContentLoaded', function () {
//     const photoUploadInputs = document.querySelectorAll('input[type="file"]');
    
//     photoUploadInputs.forEach(function (photoUploadInput) {
//         photoUploadInput.addEventListener('change', function () {
//             const file = this.files[0];
//             if (file) {
//                 const reader = new FileReader();
//                 reader.onload = function (e) {
//                     const imgElement = document.querySelector(`img[id="${photoUploadInput.id.replace('-upload', '-img')}"]`);
//                     imgElement.src = e.target.result;
//                 };
//                 reader.readAsDataURL(file);
//             }
//         });
//     });
// });