$(function() {
    $('.file-input').fileinput({
        browseLabel: 'Pilih Foto',
        browseClass: 'btn btn-info',
        browseIcon: '<i class="fa fa-picture-o"></i>',
        removeLabel: 'Batal',
        removeClass: 'btn btn-danger',
        removeIcon: '<i class="fa fa-times-circle"></i>',
        layoutTemplates: {
            icon: '<i class="fa fa-file-image-o"></i>'
        },
        showUpload: false,
        showClose: false,
        maxFilesNum: 10,
        allowedFileExtensions: ["jpg", "png", "jpeg"],
        maxFileSize: 1024,
        overwriteInitial: true,
    });
});
