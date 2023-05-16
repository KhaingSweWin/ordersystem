
<?php
include_once "layouts/header.php";
include_once "controllers/CustomerController.php";

$customer_controller=new CustomerController();
$customer_list=$customer_controller->getAllCustomers();
//var_dump($customer_list);
?>

<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

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
                                            echo "<tr>";
                                            echo "<td>". ($row+1)."</td>";
                                            echo "<td>" . $customer_list[$row]['customerName'] ."</td>";
                                            echo "<td>" . $customer_list[$row]['contactFirstName'] ." "  .$customer_list[$row]['contactLastName'] ."</td>";
                                           
                                            echo "<td>" . $customer_list[$row]['addressLine1'] ."</td>";
                                            echo "<td>" . $customer_list[$row]['city'] ."</td>";
                                            echo "<td><a class='btn btn-success mx=2'> View </a><a class='btn btn-warning mx-2'> Edit </a><a class='btn btn-danger'> Delete </a></td>";
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