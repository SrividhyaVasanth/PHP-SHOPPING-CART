<?php 
 include "config.php";
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP Cart</title>
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
	
				</tr>
				<?php 
				if(isset($_GET["del"]))
				{
					foreach($_SESSION["cart"] as $keys=>$values)
					{
							if($values["id"]==$_POST["del"])
							{
								unset($_SESSION["cart"][$keys]);
							}
					}
				}
					if(!empty($_SESSION["cart"]))
					{
							$total=0;
							foreach($_SESSION["cart"] as $keys=>$values)
							{
								$amt=$values["qty"]*$values["price"];
									$total+=$amt;
									echo "
											<tr>
												<td>{$values["name"]}</td>
												<td>{$values["quantity"]}</td>
												<td>{$values["price"]}</td>
												<td>{$amt}</td>
												<td><a href='viewCart.php?del={$values["pid"]}'>Remove</a></td>
											</tr>
									";
									
							}	
								echo "
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td>Total</td>
												<td>{$total}</td>
											</tr>";							
							
					}
				?>
			</table>
			
  </div>
</div>

</body>
</html>