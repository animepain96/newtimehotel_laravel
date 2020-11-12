$(document).ready(function () {
    //ajax delete
    $('a[data-action=delete]').on('click', 'html body', function (event) {
        event.preventDefault();
        let confirm = confirm('Bạn có muốn xóa Phòng này không?');
        if (confirm) {
            let id = $(this).attr('data-id');
            deleteRoom(id);
        }
    });

    function deleteRoom(id) {
        $.ajax({
            type: 'post',
            url: deletePath,
            contentType: "application/json;charset=utf-8",
            headers: {
                'X-CSRF-TOKEN': $('meta[name=token]').attr('content'),
                '_method' : 'delete',
            },
            data: {
                id: id,
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
            },
            error: function (res){
                console.log(res);
            }
        });
    }
});
