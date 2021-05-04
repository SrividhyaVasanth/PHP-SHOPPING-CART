<?php include 'fileslogic.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Files Upload and Download</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save">upload</button>
        </form>
      </div>

      <div class="row">
        <table>
          <thead>
            <th>ID<th>
              <th>Filename</th>
              <th>size</th>
              <th>Downloads</th>
            </thead>
          </table>
        </th>
      </thead>




    </div>
  </body>
</html>
