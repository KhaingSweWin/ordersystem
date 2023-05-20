
<?php
include_once "layouts/sidebar.php";
include_once __DIR__.'/controllers/customerController.php';
include_once __DIR__.'/controllers/empController.php';

$cid=$_GET['id'];
$customer_controller=new CustomerController();
$customer=$customer_controller->getCustomer($cid);

$emp_controller=new EmployeeController();
$emp_list=$emp_controller->getEmployeeList();

if(isset($_POST['submit'])){
    if(!empty($_POST['name']))
    {
        $name=$_POST['name'];
    }
    else
    {
        $error_status=true;
        $name_error="Please fill your name";
    }
    if(!empty($_POST['firstname']))
    {
        $firstname=$_POST['firstname'];
    }
    else
    {
        $error_status=true;
        $firstname_error="Please fill your name";
    }

    if(!empty($_POST['lastname']))
    {
        $lastname=$_POST['lastname'];
    }
    else
    {
        $error_status=true;
        $lastname_error="Please fill your name";
    }

    if(!empty($_POST['phone']))
    {
        $phone=$_POST['phone'];
    }
    else
    {
        $error_status=true;
        $phone_error="Please fill your name";
    }

    if(!empty($_POST['address1']))
    {
        $address1=$_POST['address1'];
    }
    else
    {
        $error_status=true;
        $address1_error="Please fill your name";
    }
    $address2=$_POST["address2"];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $post=$_POST['post'];

    $report=$_POST['report'];
    if(!empty($_POST['credit']))
    {
        $credit=$_POST['credit'];
    }
    else
    {
        $error_status=true;
        $credit_error="Please fill your name";
    }
   
    if($error_status==false){
        $status=$customer_controller->updateCustomer($cid,$name,$firstname,$lastname,$phone,$address1,$address2,$city,$state,$country,$post,$report,$credit);
        if($status)
        {     
            
            echo "<script> location.href='customers.php?update_status=".$status."'; </script>";
              
            
        }
        
    }
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
                                        <input type="text" name="name" id="" class="form-control" value="<?php echo $customer['customerName']; ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Contact Person (FirstName)</label>
                                        <input type="text" name="firstname" id="" class="form-control" value="<?php echo $customer['contactFirstName'];?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Contact Person (LastName)</label>
                                        <input type="text" name="lastname" id="" class="form-control" value="<?php echo $customer['contactLastName']; ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Mobile Phone</label>
                                        <input type="text" name="phone" id="" class="form-control" value="<?php echo $customer['phone'];?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Address Line1</label>
                                        <input type="text" name="address1" id="" class="form-control" value="<?php echo $customer['addressLine1'];?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Address Line2</label>
                                        <input type="text" name="address2" id="" class="form-control" value="<?php echo $customer['addressLine2'];?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">City</label>
                                        <select name="city" id="" class="form-select">
                                            <option value="Yangon">Yangon</option>
                                            <option value="Mandalay">Mandalay</option>
                                            <option value="Taunggyi">Taunggyi</option>
                                            <option value="Magway">Magway</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Division/State</label>
                                        <select name="state" id="" class="form-select">
                                            <option value="Yangon">Yangon</option>
                                            <option value="Mandalay">Mandalay</option>
                                            <option value="Shan State">Shan State</option>
                                            <option value="Kachin State">Kachin State</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Post Code</label>
                                        <input type="text" name="post" id="" class="form-control" value="<?php echo $customer['postalCode'];?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Country</label>
                                        <select name="country" id="" class="form-select">
                                            <option value="Yangon">Singapor</option>
                                            <option value="Mandalay">Myanmar</option>
                                            <option value="Shan State">Thailand</option>
                                            <option value="Kachin State">SiriLanka</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Report to</label>
                                        <select name="report" id="" class="form-select">
                                            <?php
                                                foreach($emp_list as $emp){
                                                    if($emp['employeeNumber']==$customer['salesRepEmployeeNumber'])
                                                        echo "<option value='".$emp['employeeNumber']."' selected>" .$emp['firstName'] ."  ". $emp['lastName']. "</option>";
                                                    else
                                                    echo "<option value='".$emp['employeeNumber']."'>" .$emp['firstName'] ."  ". $emp['lastName']. "</option>";
                                                }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Credit Limit(*)</label>
                                        <input type="number" name="credit" id="" class="form-control" value="<?php echo $customer['creditLimit'];?>">
                                    </div>
                                    
                                </div>
                                <div class="row my-5">
                                    <div class="col-md-12 me-auto" >
                                        <button name="submit" class="btn btn-success">Update</button>
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