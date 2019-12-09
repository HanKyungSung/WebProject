$(document).ready(function () {
    $('#summernote').summernote({
        placeholder: 'Welcome to Konada!',
        height: 400,
        maximumImageFileSize: 1048576,
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

  

