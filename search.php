<?php
include 'connection.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <input type="text" placeholder="search data" name="search">
            <button class="btn btn-dark btn-sm" name="submit">Search</button>
        </form>
        <div class="container my-5">
            <table class="table">
                <?php
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];

                    $sql = "Select * from exampledb where id like '%$search%' or fname like '%$search%' or lname like '%$search%'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<thead>
            <tr>
            <th>S1 no</th>
             <th>First Name</th>
            <th>Last Name</th>
            </tr>
            </thead>';
                            while($row = mysqli_fetch_assoc($result)){
                            echo '<tbody>
            <tr>
           <td><a href="searchData.php?data=' . $row['id'] . '">' . $row['id'] . '</a></td>
            <td>' . $row['fname'] . '</td>
            <td>' . $row['lname'] . '</td>
            
            </tr>
           <tbody> ';
                            }
                        }else{
                            echo '<h2 class=text-danger>Data Not Found</h2>';
                        }
                    }
                }

                ?>
                 

            </table>
        </div>
    </div>
</body>

</html>