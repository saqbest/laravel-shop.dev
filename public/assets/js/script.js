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
        if(isNaN(total)){
            total=0;
        }
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
    $('.buy_now').click(function (e) {
        if($('.cart-info').attr('name')){

        }
        else{
            e.preventDefault()
        }
    })
    $('form input:checkbox').click(function () {
        //console.log(this.value)
        var tr = $(this).closest("tr");
        var quantity = tr.find('.quantity');
        var qart_info = tr.find('.cart-info')
        if (quantity.attr('name') !== undefined || qart_info.attr('name')!==undefined) {
            qart_info.removeAttr('name')
            quantity.removeAttr('name')
        }
        else {
            quantity.attr('name', 'products[' + tr.data('info') + '][quantity]')
            qart_info.attr('name', 'products[' + tr.data('info') + '][qart_info]').val(tr.data('key'));
        }
        console.log($(this).closest("tr").find('.quantity').attr('name'));
    })
})
