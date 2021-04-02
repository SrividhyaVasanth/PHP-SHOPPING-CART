<?php 
	include "config.php";
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  
<div class="container">
  <div class="row">
			<h1>Add To Cart In PHP</h1><hr>
			<button onclick="location.href = 'viewCart.php';" style="color: green;">cart</button>
			<?php 
			if(isset($_POST["add-to-cart"])){
				if(isset($_SESSION["cart"]))
				{
					$id_array=array_column($_SESSION["cart"],"id");
					if(!in_array($_GET["id"],$id_array))
					{
						$index=count($_SESSION["cart"]);
						$item=array(
							'id' => $_POST["id"],
							'name' => $_POST["name"],
							'price' => $_POST["price"],
						
						);
						$_SESSION["cart"][$index]=$item;
							echo "<script>alert('Product Added..');</script>";
						header("location:viewCart.php");
					}
					else
					{
						echo "<script>alert('Already Added..');</script>";
					}
				}
				else
				{
						$item=array(
							'id' => $_GET["id"],
							'name' => $_POST["name"],
							'price' => $_POST["price"],
							'image' => $_POST["image"]
						);
						$_SESSION["cart"][0]=$item;
						echo "<script>alert('Product Added..');</script>";
						header("location:viewCart.php");
				}
			} ?>
			
			<?php
            $sql="SELECT * FROM products";
   $result=mysqli_query($conn,$sql);


$pizzas=mysqli_query($conn,$sql);

mysqli_free_result($result);


session_start();
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

 <?php include('index.php'); ?>
 <h4 class="center grey-text">SHOPPING CART</h4>

 <div class="container">
  <div class="row">

  	<table>
  		<tr>
  		<th>name</th>

  		<th> price </th>

  		<th> id </th>

       <th>image</th>

       <th> quantity </th>


       <th> add to cart</th>




         

  		</tr>
  	<form action="view.php" method="POST"> 


  		<tr>



<?php foreach($pizzas as $pizza){ ?>

      <div class="col s6 md3">
      <div class="card z-depth-0">
        <div class="card-content center">
          <td><h6><?php echo htmlspecialchars($pizza['name']); ?> </h6></td>
            <td><div><?php echo htmlspecialchars($pizza['price']); ?></div></td>
           <td><div><?php echo htmlspecialchars($pizza['id']);  ?></div></td>
            <td><img src="images/<?php echo htmlspecialchars($pizza['image']); ?>" width="300" height="300"></td>


            
    <td><p><input type="text"  placeholder="Enter Quantity" name="qty"  class="form-control"></p></td>
	<p><input type="hidden"  name="name" value="'. $row['name'] .'" class="form-control"></p>
	<p><input type="hidden"  name="price" value="'. $row['price'] .'" class="form-control"></p>
         

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

   <?php } ?>
  </div>
</tr>
</form>
</table>
</div>

</body>
</html>
