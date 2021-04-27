<?php 
	include "config.php";
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<body>
  
<title>Shopping Cart</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
 <br />
 <div class="container">
 <br />
 <br />
 <br />
			<button onclick="location.href = 'viewCart.php';" style="color: green;">cart</button>
			<?php 
			if(isset($_POST["add-to-cart"])){
				if(isset($_SESSION["cart"]))
				{
					$id_array=array_column($_SESSION["cart"],"pid");
					if(!in_array($_GET["id"],$pid_array))
					{
						$index=count($_SESSION["cart"]);
						$item=array(
							'pid' => $_POST["id"],
							'name' => $_POST["name"],
							'price' => $_POST["price"],
							'quantity' => $_POST["quantity"]
						
						);
						$_SESSION["cart"][$index]=$item;
						
							echo "<script>alert('Product Added..');</script>";
						
					}
					else
					{
						echo "<script>alert('Already Added..');</script>";
					}
				}
				else
				{
						$item=array(
							'pid' => $_POST["id"],
							'name' => $_POST["name"],
							'price' => $_POST["price"],
							'image' => $_POST["image"],
							'quantity' => $_POST["quantity"]
						);
						$_SESSION["cart"][0]=$item;
						

						echo "<script>alert('Product Added..');</script>";
						
				}
			} ?>
			
			<?php
            $sql="SELECT * FROM products";
   $result=mysqli_query($conn,$sql);


$stocks=mysqli_query($conn,$sql);

mysqli_free_result($result);


session_start();
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

 <h4 class="center red-text"><center>SHOPPING CART</center></h4>

 <div class="container-fluid">
  <div class="row">

  	<table>
  		<tr>
  		<div style="clear:both"></div>
 <br />
 <h3>Order Details</h3>
 <div class="table-responsive">
 <table class="table table-bordered">
 <tr>
 <th width="40%">Item Name</th>
 <th width="10%">Price</th>
 <th width="20%">Quantity</th>
 <th width="15%">Total</th>
 <th width="5%">Enter Quantity</th>
 </tr>



         

  		</tr>
  	

  		<tr>



<?php foreach($stocks as $stock){ ?>
<form action="view.php" method="POST"> 

      <div class="col s6 md3">
      <div class="card z-depth-0">
        <div class="card-content center">
          <td><h6><?php echo htmlspecialchars($stock['name']); ?> </h6></td>
            <td><div><?php echo htmlspecialchars($stock['price']); ?></div></td>
           <td><div><?php echo htmlspecialchars($stock['id']);  ?></div></td>
            <td><img src="images/<?php echo htmlspecialchars($stock['image']); ?>" width="300" height="300"></td>


            
    <td><p><input type="text"  placeholder="Enter Quantity" name="quantity"  class="form-control"></p></td>
	<p><input type="hidden"  name="name" value="<?php echo htmlspecialchars($stock['name']); ?>" class="form-control"></p>
	<p><input type="hidden"  name="price" value="<?php echo $stock['price']; ?>" class="form-control"></p>
	<p><input type="hidden"  name="id" value="<?php echo $stock['id']; ?>" class="form-control"></p>
    

          </div>
      <div class="card-action right-align">

      	<td><input type="submit" name="add-to-cart" value="add-to-cart"></td>
        <body>
  <tbody>
      </div>
    </div>
  </div>
</div>
<div class="col s6 md3"></div>
</form>
   <?php } ?>
  </div>
</tr>

</table>
</div>

</body>
</html>


