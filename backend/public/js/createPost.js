$(document).ready(function () {
    $('#summernote').summernote({
        placeholder: 'Welcome to Konada!',
        height: 400,
        maximumImageFileSize: 3145728,
        callbacks: {
            onImageUploadError: function() {
                $('#image-size-exceed').show();
            }
        }
    });
});

$('#close-alert').on('click', function () {
    $('#image-size-exceed').hide();
});

  

