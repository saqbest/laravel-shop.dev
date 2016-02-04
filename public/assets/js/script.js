$(document).ready(function () {
    $(".currency").change(function () {
        var currency = $(".currency").val()
        $.post('/home/', {
                _token: $('input[name="_token"]').val(),
                currency: currency,
            })
            .done(function (data) {
                document.location.href = '/home/';

            })
    })
    $(".add").click(function () {
        var key = $(this).data('key');
    })
})
