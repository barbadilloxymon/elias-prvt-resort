document.addEventListener('DOMContentLoaded', function () {
    // Handle modal display
    const avatarImg = document.getElementById('avatar-img');
    const logoutModal = document.getElementById('logoutModal');

    avatarImg.addEventListener('click', function () {
        $('#logoutModal').modal('show');
    });

    // Handle description text editing
    const editButton = document.getElementById('edit-button');
    const saveButton = document.getElementById('save-button');
    const descriptionTextArea = document.getElementById('description');

    editButton.addEventListener('click', function () {
        const confirmEdit = confirm("Are you sure you want to edit the description?");
        if (confirmEdit) {
            descriptionTextArea.removeAttribute('readonly');
            saveButton.style.display = 'block';
            editButton.style.display = 'none';
        }
    });

    saveButton.addEventListener('click', function (event) {
        const confirmSave = confirm("Are you sure you want to save the changes?");
        if (!confirmSave) {
            event.preventDefault();
            return false;
        }
        descriptionTextArea.setAttribute('readonly', 'readonly');
        saveButton.style.display = 'none';
        editButton.style.display = 'block';
    });

    // Handle photo upload
    const photoUploadInputs = document.querySelectorAll('input[type="file"]');
    
    photoUploadInputs.forEach(function (photoUploadInput) {
        photoUploadInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const mediaElement = document.querySelector(`#${photoUploadInput.id.replace('-upload', '-media')}`);
                    if (file.type.startsWith('video/')) {
                        mediaElement.outerHTML = `<video src="${e.target.result}" controls id="aboutus-media"></video>`;
                    } else {
                        mediaElement.src = e.target.result;
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    });
});

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