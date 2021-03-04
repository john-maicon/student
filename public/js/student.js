$(document).ready(function() {

    const token = $('main').data('token')
    Message.success($('main').data('message'));
    Message.error($('main').data('error'));


    $('#customFileStudent').on('change', function() {
        FormTool.previewImageBeforeUpload(this, $('#previewImageStudent'));
        if (this.files[0])
            FormTool.validateFile($('#customFileStudent'))
            $('#customFileLabelStudent').text(this.files[0].name);
    });


    $(document).on('click','#delete-item', function (evt) {
        evt.preventDefault();

          Swal.fire({
            title: 'Deseja excluir?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText:'Cancelar',
            confirmButtonText: 'Sim, excluir'
          }).then((result) => {
            if (result.value) {
              var deleteButton = $(this);
              var urlDel = deleteButton.data('urldel');
              $.ajax({
                type: 'DELETE',
                url: urlDel,
                data: { _token: token },
                success: function (data) {
                    deleteButton.parent().parent().remove();
                    Message.success(data.message);
                },
                error: function (error) {
                  Message.error(error.responseJSON.message);
                }
              });
            }
          })
        });
});

