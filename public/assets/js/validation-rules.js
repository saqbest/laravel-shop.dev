$(document).ready(function () {

    $("#product_name").change(function () {

        var product_name = $.trim($('#product_name').val())
        if (!product_name) {
            $('#product_name-error').html('Product name cannot be blank')

        }

        else {
            $('#product_name-error').html('')
        }
    })
    $("#price").change(function () {

        var price = $.trim($('#price').val())
        if (!price) {
            $('#price-error').html('Price cannot be blank')

        }
        else if (isNaN(parseInt(price))) {

            $('#price-error').html('This field must be a number')
        }

        else {
            $('#price-error').html('')
        }
    })
    $("#quantity").change(function () {
        var quantity = $.trim($('#quantity').val())
        if (!quantity) {
            $('#quantity-error').html('Quantity cannot be blank')

        }
        if (isNaN(parseInt(quantity))) {

            $('#quantity-error').html('This field must be a number')
        }

        else {
            $('#quantity-error').html('')
        }
    })
})