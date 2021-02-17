<script>
    var fullEditor = new Quill('#full-container .editor', {
        placeholder: 'Compose an epic...',
        bounds: '#full-container .editor',
        modules: {
            'formula': true,
            'syntax': true,
            'toolbar': [
                [{
                    'font': []
                }, {
                    'size': []
                }],
                ['bold', 'italic', 'underline', 'strike'],
                [{
                    'color': []
                }, {
                    'background': []
                }],
                [{
                    'script': 'super'
                }, {
                    'script': 'sub'
                }],
                [{
                    'header': '1'
                }, {
                    'header': '2'
                }, 'blockquote', 'code-block'],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }, {
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }],
                ['direction', {
                    'align': []
                }],
                ['link', 'image', 'video', 'formula'],
                ['clean']
            ],
        },
        theme: 'snow',
    });

    $('#btn-submit').on('click', function () {
        //$(this).prop('disabled', true);
        var formData = new FormData($('#fr_create')[0]);
        var content = fullEditor.container.firstChild.innerHTML;
        formData.append('content', content);
        $.ajax({
            type: 'post',
            url: '/cpanel/page/insert',
            dataType: "json",
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

                if (data.stt == true) {
                    toastr.success(data.msg, 'Success');
                    window.location.href = 'page/edit/' + dataId;

                    $(this).prop('disabled', true);
                } else {

                    toastr.error('Error , try agian', 'Error');
                    // toastr.success(data.msg, 'Error');
                }
            }
        });
    });
</script>