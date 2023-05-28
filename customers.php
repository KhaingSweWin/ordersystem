
<?php
include_once "layouts/sidebar.php";
include_once "controllers/CustomerController.php";

$customer_controller=new CustomerController();
$customer_list=$customer_controller->getAllCustomers();
//var_dump($customer_list);

?>

<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
                    <div class="row my-3">
                        <div class="col-md-12">
                        <?php
                            if(isset($_GET['status']) && $_GET['status']==1)
                            {
                                echo "<div class='text-success bg-warning'> New Customer is succesfully created </div>";
                            }
                            else if(isset($_GET['update_status']) && $_GET['update_status']==1)                 
                            {
                                echo "<div class='text-success bg-warning'> Customer is succesfully updated</div>";
                            }
                            
                        ?>
                        </div>
                    
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="create_customer.php" class="btn btn-dark">Add New Customer</a>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Contact Name
                                        </th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        for($row=0;$row<sizeof($customer_list);$row++)
                                        {
                                            echo "<tr id='".$customer_list[$row]['customerNumber']."'>";
                                            echo "<td>". ($row+1)."</td>";
                                            echo "<td>" . $customer_list[$row]['customerName'] ."</td>";
                                            echo "<td>" . $customer_list[$row]['contactFirstName'] ." "  .$customer_list[$row]['contactLastName'] ."</td>";
                                           
                                            echo "<td>" . $customer_list[$row]['addressLine1'] ."</td>";
                                            echo "<td>" . $customer_list[$row]['city'] ."</td>";
                                            echo "<td><a class='btn btn-success mx=2' href='view_customer.php?id=".$customer_list[$row]['customerNumber']."'> View </a><a class='btn btn-warning mx-2' href='edit_customer.php?id=".$customer_list[$row]['customerNumber']."'> Edit </a><a class='btn btn-danger delete'> Delete </a></td>";
                                            echo "</tr>";
                                        }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

				</div>
</main>	

<?php
include_once "layouts/footer.php";
?>