<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Call css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <?php
    // Call file connect.php
    include_once("connect.php");
    // Retrieve all data from "books"
    $result = mysqli_query($mysqli, "SELECT * FROM books ORDER BY ISBN ASC");


    // Calculate the total number of pages
    $total_records = mysqli_num_rows($result);
    $per_page = 5; // Set the number of records per page
    $total_pages = ceil($total_records / $per_page);


    ?>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ISBN</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Year</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
												// Modify the SQL query to limit the results based on the current page
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $start = ($current_page - 1) * $per_page;
                        $result = mysqli_query($mysqli, "SELECT * FROM books ORDER BY ISBN ASC LIMIT $start, $per_page");


                        while($data = mysqli_fetch_array($result)) {         
                            echo "<tr>";
                            echo "<td>".$data['ISBN']."</td>";
                            echo "<td>".$data['author']."</td>";
                            echo "<td>".$data['title']."</td>";
                            echo "<td>".$data['price']."</td>"; 
                            echo "<td>".$data['type']."</td>";
                            echo "<td>".$data['year']."</td>";
                            echo "<td>".$data['description']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
                </table>
								
								
                <nav>
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <li class="page-item <?php if ($i == $current_page) { echo "active"; } ?>"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>
                    </ul>
                </nav>

                    
                

            </div>
        </div>
    </div>
</body>
</html>