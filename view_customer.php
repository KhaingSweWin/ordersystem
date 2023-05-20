
<?php
include_once "layouts/sidebar.php";
include_once  __DIR__. '/controllers/customerController.php';
$cid=$_GET['id'];
$customer_controller=new CustomerController();
$customer=$customer_controller->getCustomer($cid);

?>

<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="card col-md">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="" class="form-label"> Customer Name : <?php echo $customer['customerName'];?> </label>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="form-label"> Contact Person : <?php echo $customer['contactFirstName'] ." ". $customer['contactLastName'];?> </label>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="form-label"> Phone Number : <?php echo $customer['phone'] ;?> </label>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-3">
                                    <label for="" class="form-label"> Address Line : <?php echo $customer['addressLine1'];?> </label>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="form-label"> City : <?php echo $customer['city'];?> </label>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="form-label"> State : <?php echo $customer['state'] ." ". $customer['contactLastName'];?> </label>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="form-label"> Country : <?php echo $customer['country'] ;?> </label>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <label for="" class="form-label"> Report To : <?php echo $customer['firstName'] ." ". $customer['lastName']." (". $customer['email']. ")";?> </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label"> Credit Limit : <?php echo $customer['creditLimit'];?> </label>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                    <div>
                        <a href="customers.php" class='btn btn-success'>Back to Customers</a>
                    </div>

				</div>
</main>	

<?php
include_once "layouts/footer.php";
?>