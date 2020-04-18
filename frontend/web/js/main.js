$(document).ready(function () {
    $(document).on('change', '#ingredient-select', function () {
        $.ajax({
            url: '/site/search',
            type: 'post',
            data: {'selected': $(this).val()},
            dataType: 'JSON'
        }).done(function (data) {
            console.log(data.result);
            if (data.status === 'ok') {
                $('#search-result').html(data.result);
            } else {
                $('#search-result').html('<p class="text-danger">Возникла ошибка</p>');
            }
        })
    });
});
