<?php
include_once("connect.php");
// get isbn from url
$isbn = $_GET['isbn'];
// retrieve data by isbn
$result = mysqli_query($mysqli, "SELECT * FROM books WHERE ISBN=$isbn");


while($data = mysqli_fetch_array($result)) {
    $author = $data['author'];
    $title = $data['title'];
    $price = $data['price'];
    $type = $data['type'];
    $year = $data['year'];
    $description = $data ['description'];
 }
 // Checks whether the user has pressed the update button
if(isset($_POST['update']))
{  
   $author=$_POST['author'];
   $title=$_POST['title'];
   $price=$_POST['price'];
   $type=$_POST['type'];
   $year=$_POST['year'];
   $description=$_POST['description'];

   // sql query to update data
   mysqli_query($mysqli, "UPDATE books SET author='$author',title='$title', price='$price', type='$type', year='$year', description='$description', date_updated=NOW() WHERE ISBN=$isbn");

   // Redirect page to show.php
   header("Location: datatable.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>

    <!-- Call css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Add css DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

</head>
<body>
    
<br>
<br>
<div class="container">
   <div class="row">
       <div class="col-md-6 col-md-offset-3">
           <form name="update_user" method="post" action="">
                <div class="mb-3">
                   <label>ISBN</label>
                   <input type="number" class="form-control" name="isbn" value="<?php echo $isbn;?>" disabled>
               </div>
               <div class="mb-3">
                   <label>Author</label>
                   <input type="text" class="form-control" name="author" value="<?php echo $author;?>" >
               </div>
               <div class="mb-3">
                   <label>Title</label>
                   <input type="text" class="form-control" name="title"  value="<?php echo $title;?>" >
               </div>
               <div class="mb-3">
                   <label>price</label>
                   <input type="number" class="form-control" name="price" value="<?php echo $price;?>" >
               </div>
               <div class="mb-3">
                   <label>Type</label>
                   <input type="text" class="form-control" name="type" value="<?php echo $type;?>" >
               </div>
               <div class="mb-3">
                   <label>Year</label>
                   <input type="text" class="form-control" name="year" value="<?php echo $year;?>" >
               </div>
               <div class="mb-3">
                   <label>Description</label>
                   <input type="text" class="form-control" name="description" value="<?php echo $description;?>">
               </div>
               <button type="submit" name="update" class="btn btn-primary">Update</button> 
                     
           </form>
       </div>
   </div>
</div>
  
</body>
</html>