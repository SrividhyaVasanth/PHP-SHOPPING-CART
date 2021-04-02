<?php 
    include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP SHOPPING CART</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <form action="view.php" method="POST"> 

    <h1>Add To Cart In PHP</h1><hr>
      <?php 
      $sql="select * from products";
      $res=$con->query($sql);
      if($res->num_rows>0)
      {
        while($row=$res->fetch_assoc())
        {
      echo  '
   <div class="col-sm-4 col-lg-3 col-md-3 text-center">
    
     <img src="images/'. $row['pic'] .'" alt="" class="img-responsive" >
     <p><strong><a href="#">'. $row['name'] .'</a></strong></p>
     <h4 class="text-danger"> Rs.'. $row['price'] .'</h4>
  <p><a href="view.php?id='. $row['id'] .'" class="btn btn-success">View Details</a></p>
   </div>
   ';
        
      }
      ?>
            
    <td><p><input type="text"  placeholder="Enter Quantity" name="quantity"  class="form-control"></p></td>
  <p><input type="hidden"  name="name" value="'. $row['name'] .'" class="form-control"></p>
  <p><input type="hidden"  name="price" value="'. $row['price'] .'" class="form-control"></p>
         
<div class="container">
  <div class="row">

</div>
</div>
</html>
</div>
</div>
</div>
</form>

 </div>
</div>

</body>
</html>