// JavaScript function to handle modal display
document.addEventListener('DOMContentLoaded', function () {
    const avatarImg = document.getElementById('avatar-img');
    const logoutModal = document.getElementById('logoutModal');

    avatarImg.addEventListener('click', function () {
        $('#logoutModal').modal('show');
    });
});

// JavaScript function to handle description text editing
function editDescription(roomId) {
    var newDescription = prompt("Enter new description:");
    if (newDescription !== null && newDescription !== "") {
        const roomDescription = document.getElementById(`room-description-${roomId}`);
        roomDescription.textContent = newDescription;

        // Optionally, you can save the new description to the server using AJAX
        /*
        $.ajax({
            url: 'update_description.php',
            type: 'POST',
            data: {
                roomId: roomId,
                description: newDescription
            },
            success: function(response) {
                console.log(response); // Handle response
            },
            error: function(error) {
                console.error('Error:', error); // Handle error
            }
        });
        */
    }
}

// JavaScript to handle photo upload
document.addEventListener('DOMContentLoaded', function () {
    const photoUploadInputs = document.querySelectorAll('input[type="file"]');
    
    photoUploadInputs.forEach(function (photoUploadInput) {
        photoUploadInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const imgElement = document.querySelector(`img[id="${photoUploadInput.id.replace('-upload', '-img')}"]`);
                    imgElement.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
});
