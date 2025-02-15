$(document).on('click', '.inc', function() {
    let productId = $(this).closest('.qtyBox').find('.productId').val();
    console.log("Product ID:", productId);

    let productQty = $(this).closest('.qtyBox').find('.num-product');
    let productQtyInt = parseInt(productQty.val());

    console.log("Current Quantity:", productQtyInt);

    if (!isNaN(productQtyInt)) {  // ✅ Corrected NaN check
        let updatedQty = productQtyInt + 1; // Increase quantity
        productQty.val(updatedQty); // Update the input field
        console.log("Updated Quantity:", updatedQty);
    }
});

$(document).on('click', '.dec', function() {
    let productId = $(this).closest('.qtyBox').find('.productId').val();
    console.log("Product ID:", productId);

    let productQty = $(this).closest('.qtyBox').find('.num-product');
    let productQtyInt = parseInt(productQty.val());

    console.log("Current Quantity:", productQtyInt);

    if (!isNaN(productQtyInt) && productQtyInt > 1) {  // ✅ Prevents quantity from going below 1
        let updatedQty = productQtyInt - 1; // Decrease quantity
        productQty.val(updatedQty); // Update the input field
        console.log("Updated Quantity:", updatedQty);
    }
});
