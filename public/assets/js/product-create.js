$(document).ready(function () {
    $('#submit').click(function (e) {
        e.preventDefault();

        if ($('#photo').prop('files').length > 0) {
            if (beforeSubmit()) {
                var data = new FormData();
                data.append('_token', $('input[name="_token"]').val());
                data.append('photo', $('#photo').prop('files')[0]);
                data.append('product_name', $("#product_name").val());
                data.append('price', $("#price").val());
                data.append('quantity', $("#quantity").val());
                data.append('type', $("#sel1").val());
                data.append('description', $("#quantity").val());


                console.log(data)

                $.ajax({
                    url: '/create',
                    type: 'POST',
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (data, textStatus, jqXHR) {
                        $(".products").prepend('<li>\
                            <a href="#">\
                            <img src="/uploads/' + $('#photo').prop('files')[0].name + '">\
                            <h4>' + $('#product_name').val() + '</h4>\
                            <p>' + '$' + $('#price').val() + '</p>\
                        <span> Quantity :' + $('#quantity').val() + '</span>\
                        </a> </li>')

                        $('#product_name').val('');
                        $('#quantity').val('')
                        $('#price').val('');
                        $('#description').val('');
                        $('#photo').val('');
                        $("#message").html("<b>" + 'Information saved' + "</b> ");
                         location.reload();

                    },
                    error: function (jqXHR, textStatus, errorThrown, data) {

                    }
                })
            }

        }
        else {
            $("#message").html("Image d`ont selected");
        }

        function beforeSubmit() {
            if (window.File && window.FileReader && window.FileList && window.Blob) {
                var product_name = $.trim($('#product_name').val());
                var price = $.trim($('#price').val());
                var quantity = $.trim($('#quantity').val());
                var fsize = $('#photo')[0].files[0].size; //get file size
                var ftype = $('#photo')[0].files[0].type; // get file type
                $('#product_name-error').html('')
                $('#quantity-error').html('')
                $('#price-error').html('')
                $("#message").html("");
                switch (ftype) {
                    case 'image/png':
                    case 'image/gif':
                    case 'image/jpeg':
                        break;
                    default:
                        $("#message").html("<b>" + ftype + "</b> Unsupported file type!");
                        return false
                }
                if (fsize > 5242880) {
                    $("#message").html("<b>" + bytesToSize(fsize) + "</b> Too big file! <br />File is too big, it should be less than 5 MB.");
                    return false
                }
                if (!product_name) {
                    $('#product_name-error').html('Product name cannot be blank')
                    return false

                }


                if (!price) {
                    $('#price-error').html('Price cannot be blank')
                    return false

                }
                else if (isNaN(parseInt(price))) {

                    $('#price-error').html('This field must be a number');
                    return false

                }
                if (!quantity) {
                    $('#quantity-error').html('Quantity cannot be blank')
                    return false

                }
                else if (isNaN(parseInt(quantity))) {

                    $('#quantity-error').html('This field must be a number')
                    return false

                }

                else {
                    return true
                }

            }

            else {
                $("#message").html("Please upgrade your browser, because your current browser lacks some new features we need!");
                return false;
            }
        }

        e.preventDefault();

    });
});
