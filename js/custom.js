$(document).on('click', '.inc, .dec', function () {
    let isIncrement = $(this).hasClass('inc'); 
    let productId = $(this).closest('.qtyBox').find('.productId').val();
    let productQty = $(this).closest('.qtyBox').find('.num-product');
    let productQtyInt = parseInt(productQty.val());

    if (!isNaN(productQtyInt)) {
        let updatedQty = isIncrement ? productQtyInt  : Math.max( productQtyInt );
        productQty.val(updatedQty);
        updateIncDec(productId, updatedQty);
        updatePrice($(this), updatedQty);
    }
});

function updateIncDec(proId, proQty) {
    $.ajax({
        url: "shoping-cart.php",
        type: "POST",
        data: {
            "qtyIncDec": true,
            "productId": proId,
            "productQty": proQty
        },
        success: function (response) {
            console.log(response);
            alert("Quantity Updated");
            location.reload(); // Reload the page to update totals
        }
    });
}

function updatePrice(element, qty) {
    let price = parseFloat(element.closest('.table_row').find('.column-3').text());
    let totalAmount = element.closest('.table_row').find('.column-5');
    totalAmount.text((price * qty).toFixed(2));
}

function validateForm() {
    var country = document.getElementById("country").value;
    var state = document.getElementById("state").value;
    var postcode = document.getElementById("postcode").value;

    if (country == "" || state == "" || postcode == "") {
        alert("Please fill in all shipping details before proceeding.");
        return false;
    }
    return true;
}