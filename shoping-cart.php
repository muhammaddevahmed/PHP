<?php
include('dashboard/php/query.php');
include('components/header.php');
?>
<?php
if(isset($_POST['addToCart'])){
	if(isset($_SESSION['cart'])){
		$arrayOfProductsIds = array_column($_SESSION['cart'],"productId");
		if(in_array($_POST['pId'],$arrayOfProductsIds)){
			echo "<script>alert('product is already Added')</script>";
		}
		else {
		$count = count($_SESSION['cart']);
        $_SESSION['cart'][$count] = array(
			"productId" => $_POST['pId'],
			"productName" => $_POST['pName'],
			"productPrice" => $_POST['pPrice'],
			"productImage" => $_POST['pImage'], // Corrected
			"productQuantity" => $_POST['num-product'] // Corrected
		);
		
		echo "<script>alert('Product Added')</script>";
	  }
	}

	else{
		$_SESSION['cart'][0] = array("productId"=>$_POST['pId'],"productName"=>$_POST['pName'],"productPrice"=>$_POST['pPrice'],"productImage"=> $_POST['pImage'],"productQuantity"=> $_POST['num-product']);
		echo "<script>alert('Product Added')</script>";
	}
	
}
//remove product from session

if (isset($_GET['remove'])) {
    $productId = $_GET['remove'];
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($productId == $value["productId"]) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array
            echo "<script>alert('Product removed successfully'); location.assign('shoping-cart.php');</script>";
        }
    }
}

if (isset($_POST['qtyIncDec'])) {
    $pId = $_POST['productId'];
    $pQty = $_POST['productQty'];

    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['productId'] == $pId) {
            $_SESSION['cart'][$key]['productQuantity'] = $pQty;
        }
    }
} 

if (isset($_POST['checkout'])) {
    if(empty($_POST['country']) || empty($_POST['state']) || empty($_POST['postcode']) || empty($_POST['payment_method'])) {
        echo "<script>alert('Please fill all shipping details and select payment method.');</script>";
     } 
     else{
    $userId = $_SESSION['userId'];
    $userName = $_SESSION['userName'];
    $userEmail = $_SESSION['userEmail'];
   
           

    $totalAmount = 0;
    $totalQuantity = 0;

            // Get shipping details
            $country = $_POST['country'];
            $state = $_POST['state'];
            $postcode = $_POST['postcode'];
            $paymentMethod = $_POST['payment_method'];

    foreach ($_SESSION['cart'] as $value) {
        $productId = $value['productId'];
        $productName = $value['productName'];
        $productPrice = $value['productPrice'];
        $productQuantity = $value['productQuantity'];

        $totalAmount += $productPrice * $productQuantity;
        $totalQuantity += $productQuantity;

        // Insert into orders 
        $orderQuery = $pdo->prepare('INSERT INTO orders (p_id, p_name, p_price, p_qty, u_id, u_name, u_email) VALUES (:p_id, :p_name, :p_price, :p_qty, :u_id, :u_name, :u_email)');
        
        $orderQuery->bindParam(':p_id', $productId);
        $orderQuery->bindParam(':p_name', $productName);
        $orderQuery->bindParam(':p_price', $productPrice);
        $orderQuery->bindParam(':p_qty', $productQuantity);
        $orderQuery->bindParam(':u_id', $userId);
        $orderQuery->bindParam(':u_name', $userName);
        $orderQuery->bindParam(':u_email', $userEmail);
        $orderQuery->execute();

	} 
     // Insert into invoice with shipping details
     $invoiceQuery = $pdo->prepare(' INSERT INTO invoice 
     (u_id, u_name, u_email, total_amount, total_quantity, 
     shipping_country, shipping_state, shipping_postcode, payment_method) 
     VALUES (:u_id, :u_name, :u_email, :total_amount, :total_quantity,
     :country, :shipping_state, :postcode, :payment_method)');
 
 // Bind parameters
 $invoiceQuery->bindParam(':u_id',$userId);
 $invoiceQuery->bindParam(':u_name',$userName);
 $invoiceQuery->bindParam(':u_email',$userEmail);
 $invoiceQuery->bindParam(':total_amount',$totalAmount);
 $invoiceQuery->bindParam(':total_quantity',$totalQuantity);
 $invoiceQuery->bindParam(':country', $country);
 $invoiceQuery->bindParam(':shipping_state', $state);
 $invoiceQuery->bindParam(':postcode', $postcode);
 $invoiceQuery->bindParam(':payment_method', $paymentMethod);
 

 if (!$invoiceQuery->execute()) {
    print_r($invoiceQuery->errorInfo()); 
    exit;
}
 unset($_SESSION['cart']);
 echo "<script>alert('Order Placed Successfully'); location.assign('shoping-cart.php');</script>";
}
}







?>
		
<!-- breadcrumb -->
<div class="container pt-5 ">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
			<a href="unset.php">unset</a>
		</div>
	</div>
	<!-- Shoping Cart -->
    <form method="POST" class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

								<?php
								if(isset($_SESSION['cart'])){
									foreach($_SESSION['cart'] as $value){
								

								?>				

								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="dashboard/img/product/<?php echo $value['productImage']?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $value['productName']?></td>
									<td class="column-3"><?php echo $value['productPrice']?></td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0 qtyBox">
											<input type="hidden" class = "productId" value = "<?php echo $value['productId']?>">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m dec">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="<?php echo $value['productQuantity']?>">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m inc">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5"><?php echo $value['productPrice']*$value['productQuantity'] ?></td>
									<td><a href="?remove=<?php echo $value['productId']?>" class="btn btn-danger mr-4">Remove</a></td>
								</tr>

								<?php
									}
								}
								
								?>

								
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div>
					</div>
				</div>
				<?php 
$totalPrice = 0;

// Check if cart is set and is an array
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $value) {
        $totalPrice += $value['productPrice'] * $value['productQuantity'];
    }
}
?>


<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
        <h4 class="mtext-109 cl2 p-b-30">
            Cart Totals
        </h4>

        <!-- Subtotal -->
        <div class="flex-w flex-t bor12 p-b-13">
            <div class="size-208">
                <span class="stext-110 cl2">Subtotal:</span>
            </div>
            <div class="size-209">
                <span class="mtext-110 cl2">
                    $<?php echo number_format($totalPrice, 2); ?>
                </span>
            </div>
        </div>
        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
    <div class="size-208 w-full-ssm">
        <span class="stext-110 cl2">Shipping:</span>
    </div>
    <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
        <div class="p-t-15">
            <div class="bor8 bg0 m-b-12">
                <select class="stext-111 cl8 plh3 size-111 p-lr-15" name="country" required>
                    <option value="">Select Country</option>
                    <option value="USA">USA</option>
                    <option value="UK">UK</option>
                    <!-- Add more countries -->
                </select>
            </div>
            
            <div class="bor8 bg0 m-b-12">
                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" 
                    name="state" placeholder="State / Province" required>
            </div>
            
            <div class="bor8 bg0 m-b-22">
                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" 
                    name="postcode" placeholder="Postal Code" required>
            </div>

            <div class="m-b-22">
    <span class="stext-112 cl8">Payment Method:</span>
    <div class="flex-w flex-t p-t-15" style="display: flex; flex-direction: column;">
        <div class="m-b-10" style="display: flex; align-items: center;">
        <input type="radio" name="payment_method" value="Credit Card" id="credit-card" required>
            <label class="stext-111 cl8 m-l-6 m-t-8" for="credit-card">Credit Card</label>
            
        </div>
        <div class="m-b-10" style="display: flex; align-items: center;">
        <input type="radio" name="payment_method" value="PayPal" id="paypal">
            <label class="stext-111 cl8 m-l-6 m-t-8" for="paypal">PayPal</label>
            
        </div>
        <div style="display: flex; align-items: center;">
        <input type="radio" name="payment_method" value="Cash on Delivery" id="cod">
            <label class="stext-111 cl8 m-l-6 m-t-8" for="cod">Cash on Delivery</label>
            
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Total Section -->
        <div class="flex-w flex-t p-t-27 p-b-33">
            <div class="size-208">
                <span class="mtext-101 cl2">Total:</span>
            </div>
            <div class="size-209 p-t-1">
                <span class="mtext-110 cl2">
                    $<?php echo number_format($totalPrice, 2); ?>
                </span>
            </div>
        </div>

        <div class="flex-w flex-m p-t-25">
    <?php if (isset($_SESSION['userEmail'])) { ?>
        <button type="submit" name="checkout" 
            class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
            Proceed to Checkout
        </button>
    <?php } else { ?>
        <a href="login.php" 
            class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
            Proceed to Checkout
        </a>
    <?php } ?>
</div>

    </div>
</div>
			</div>
			</div>


		
	</form>
		
	
		
<?php
include('components/footer.php');
?>