
<?php
include_once "layouts/sidebar.php";
include_once 'controllers/customerController.php';
include_once 'controllers/productController.php';
include_once 'controllers/orderController.php';

$customer_controller=new CustomerController();
$customer_list=$customer_controller->getAllCustomers();

$product_controller=new ProductController();
$productlist=$product_controller->getAllProducts();

$price=$productlist[0]['MSRP'];
if(isset($_POST['submit']))
{
    $pname[]=$_POST['pname'];
    $pprice[]=$_POST['price'];
    $qty[]=$_POST['qty'];
    $cname=$_POST['cname'];
    $date=date('Y-m-d',strtotime($_POST['date']));
    $order_controller=new OrderController();
    $order_controller->addOrder($date,$cname,$pname,$pprice,$qty);
}
?>

<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Customer Name</label>
                                        <select name="cname" id="" class='form-select'>
                                            <?php
                                                foreach($customer_list as $customer)
                                                {
                                                    echo '<option value="'.$customer['customerNumber'].'"> ' .$customer['customerName'] ."(".$customer['phone'].")".'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        
                                    </div>
                                    <div class="col-md-3">
                                        
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Date : </label>
                                        <input type="date" name="date" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="prow">
                                <div class="row my-3">
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Product Name</label>
                                        <select name="pname[]" id="" class="form-select product">
                                        <?php
                                                foreach($productlist as $product)
                                                {
                                                    echo '<option value="'.$product['productCode'].'"> ' .$product['productName'] .'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Price</label>
                                        <input type="double" name="price[]" id="" class="form-control price" value="<?php echo $price;?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Qty</label>
                                        <input type="number" name="qty[]" id="" class="form-control qty" value=1 min=1>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Sub Total</label>
                                        <input type="double" name="subtotal" id="" class="form-control subtotal">
                                    </div>
                                    
                                    <div class="col-md-2 ">
                                        <button class='btn btn-primary mt-4 addmore'>Add More</button>
                                    </div>
                                </div>
                                </div>
                                
                               
                                <div class="row my-5">
                                    <div class="col-md-12 me-auto" >
                                        <button name="submit" class="btn btn-success">Order</button>
                                        <a href="customers.php" class="btn btn-warning">Back</a>
                                     </div>
                                     
                                </div>
                            </form>
                        </div>
                    </div>

				</div>
</main>	

<?php
include_once "layouts/footer.php";
?>