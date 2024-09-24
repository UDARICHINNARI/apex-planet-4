<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Search Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php
$data=$_GET['data'];
// echo $data;
$sql="Select * from exampledb where id=$data";
$result=mysqli_query($conn,$sql);
if($result){
    $row=mysqli_fetch_assoc($result);
    echo '<div class="container">
    <div class="jumbotron">
                    <h1 class="display-4 text-center font-weight-bold text-dark mb-4">' . htmlspecialchars($row['fname']) . ' ' . htmlspecialchars($row['lname']) . '</h1>
                    <p class="lead text-center text-danger font-weight-bold">Your email id is: 
                        <span class="text-primary"> ' . htmlspecialchars($row['email']) . ' </span>
                    </p>
                    <p class="lead text-center text-danger font-weight-bold">Your mobile number is: 
                        <span class="text-primary">' . htmlspecialchars($row['mobile']) . '</span>
                    </p>
                    <p class="lead text-center text-danger font-weight-bold">Your subject is: 
                        <span class="text-primary">' . htmlspecialchars($row['multipleData']) . '</span>
                    </p>
                    <p class="lead text-center text-danger font-weight-bold">Your gender is: 
                        <span class="text-primary">' . htmlspecialchars($row['gender']) . '</span>
                    </p>
                    <p class="lead text-center text-danger font-weight-bold">Your place is: 
                        <span class="text-primary">' . htmlspecialchars($row['place']) . '</span>
                    </p>
  <hr class="my-4">
  
  <a class="btn btn-dark btn-lg" href="search.php" role="button">Back</a>
</div>
    </div>';
}

?>

</div>
</body>
</html>