$('#summernote').summernote({
    placeholder: 'Hello bootstrap 4',
    height: 400,
    maximumImageFileSize: 1048576,
    callbacks: {
        // onImageUpload: function (files, editor, welEditable)
        // {
        //     console.log("asdf");
        //     console.log(files, editor, welEditable);
        // },
        onImageUploadError: function() {
            console.log("asdf");
            $('#image-size-exceed').show();
        }
    }
});

$('#close-alert').on('click', function () {
    $('#image-size-exceed').hide();
});

  

