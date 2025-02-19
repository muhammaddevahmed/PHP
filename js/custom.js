$(document).on('click','.inc',function(){
    let productId = $(this).closest('.qtyBox').find('.productId').val();
    console.log("Product ID : " + productId);
    let productQty = $(this).closest('.qtyBox').find('.num-product');
    let productQtyInt = parseInt(productQty.val());
    // console.log(productQtyInt);
    if(!isNaN(productQtyInt)){
        let updatedQty = productQtyInt ;
        console.log("Product Quantity : " + updatedQty);
        updateIncDec(productId,updatedQty);

    }
});

$(document).on('click','.dec',function(){
    let productId = $(this).closest('.qtyBox').find('.productId').val();
    console.log("Product ID : " + productId);
    let productQty = $(this).closest('.qtyBox').find('.num-product');
    let productQtyInt = parseInt(productQty.val());
    // console.log(productQtyInt);
    if(!isNaN(productQtyInt)){
            let updatedQty = productQtyInt ;
            console.log("Product Quantity : " + updatedQty);
            updateIncDec(productId,updatedQty);
    }
})

function updateIncDec(proId , proQty){
    $.ajax({
        url: "shoping-cart.php",
        type: "POST",
        data:{
        "qtyIncDec":true,
        "productId":proId,
        "productQty":proQty,
       },
       success: function(response) {
        console.log(response);
        
        alert("Quantity Updated");
        
        
       }
    })
}
 