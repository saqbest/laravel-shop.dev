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
    $(".add").click(function (e) {
        e.preventDefault()
        var key = $(this).data('key');
        var elem = $(this);
        var total = parseInt($('.total').text());
        console.log(typeof total);
        $.post('/addtocart/', {
                key: key,
                _token: $('input[name="_token"]').val(),
            })
            .done(function (data) {
                console.log(data)
                elem.text('Product added');
                elem.addClass('disabled');
                var result = total + 1
                $('.total').html('' + result + '')
            })
    })
    $('.delete').click(function () {
        var key = $(this).data('key');
        $.post('/deletefromcart/', {
                key: key,
                _token: $('input[name="_token"]').val(),
            })
            .done(function (data) {
                location.reload();

            })
    })
    $('.refresh').click(function () {
        var quantity = parseInt($(this).prev().val())
        var key = $(this).next().data('key')
        var info = $(this).data('info')
        var elem = $(this);
        if (!isNaN(quantity)) {
            $.post('/quantity/', {
                    key: key,
                    info: info,
                    quantity: quantity,
                    _token: $('input[name="_token"]').val(),
                })
                .done(function (data) {
                    console.log(data)
                    elem.prev().val(quantity)
                })
                .error(function () {
                    alert("error");
                })
        }
        else {
            //alert('Error')
        }
    })
    $('.buy_now').click(function () {
        $(".buy").each(function () {
            var key = $(this).data('key');
            var info = $(this).data('info');
            var quantity = parseInt($(this).find('td:last input').val())
            if (!isNaN(quantity)) {
                $.post('/buy/', {
                        key: key,
                        info: info,
                        quantity: quantity,
                        _token: $('input[name="_token"]').val(),
                    })
                    .done(function (data) {
                        elem.prev().val('sduhsdi')
                    })
                    .error(function () {
                        alert("error");
                    })
            }
            else {
                //alert('Error')
            }
        })

    })
    $('form input:checkbox').click(function () {
        //console.log(this.value)
        var tr = $(this).closest("tr");
        var quantity = tr.find('.quantity');

        if (quantity.attr('name') !== undefined) {
            quantity.removeAttr('name')
        }
        else {
            quantity.attr('name', 'products[' + tr.data('info') + ']')
        }
        console.log($(this).closest("tr").find('.quantity').attr('name'));
    })
})
