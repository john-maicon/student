const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

const Message = {
    success: function(message) {
        if (message) {
            Toast.fire({
                icon: 'success',
                title: message
            });
        }
    },

    error: function(message) {
        if (message) {
            Toast.fire({
                icon: 'error',
                title: message
            });
        }
    },
}

const FormTool = {
        previewImageBeforeUpload: function(inputImage, targetToPreview) {
            if (inputImage.files && inputImage.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    targetToPreview.attr('src', e.target.result);
                }
                reader.readAsDataURL(inputImage.files[0]);
            }
        },

        validateFile: function(dateFile) {
            console.log('opaaa')
            const fileInput = dateFile
            const maxSize = 1000000
            const extPermitidas = ['jpg', 'png', 'jpeg'];

            if (fileInput.get(0).files.length) {
                const fileSize = fileInput.get(0).files[0].size; // in bytes
                if (fileSize > maxSize) {
                    jQuery('.error-message').text('Arquivo excedeu o limite permitido, de no maximo 1GB').css('color', 'red');
                    fileInput.addClass("is-invalid");
                    return false
                } else if (typeof extPermitidas.find(function(ext) {
                        return fileInput.val().split('.').pop() == ext;
                    }) == 'undefined') {
                    jQuery('.error-message').text('Extensão não permitida').css('color', 'red');
                    fileInput.addClass("is-invalid");
                    return false
                }
            }

            jQuery('input[name="ref_photo"]').removeClass('is-invalid');
            jQuery('.error-message').text('');
            return true
        }
    };


