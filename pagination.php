<?php
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <table class="table">
            <thead class="bg-dark text-light">
                <tr>
                    <th scope="col">S1 no</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Mobile</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query to count the total number of records
                $sql = "Select * from exampledb";
                $result = mysqli_query($con, $sql);
                $num = mysqli_num_rows($result);
                $numberPages = 5;
                $totalPages = ceil($num / $numberPages);

                // Get the current page number from the query string or set to 1 by default
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                // Calculate the starting limit
                $startinglimit = ($page - 1) * $numberPages;

                // Query to get the records for the current page
                $sql = " Select * from exampledb LIMIT " . $startinglimit . ',' . $numberPages;
                $result = mysqli_query($conn, $sql);

                // Display the records
                while ($row = mysqli_fetch_assoc($result)) {
                    echo ' <tr>
                          <th scope="row">' . $row['id'] . '</th>
                          <td>' . $row['fname'] . '</td>
                          <td>' . $row['lname'] . '</td>
                          <td>' . $row['mobile'] . '</td>
                        </tr>';
                }
                ?>
            </tbody>
        </table>

        <!-- Centered Pagination Buttons with Previous and Next -->
        <div class="d-flex justify-content-center">
            <?php
            // "Previous" button - Disable if on the first page
            if ($page > 1) {
                echo '<button class="btn btn-dark mx-1 mb-3"><a href="pagination.php?page=' . ($page - 1) . '" class="text-light">Previous</a></button>';
            } else {
                echo '<button class="btn btn-dark mx-1 mb-3" disabled>Previous</button>';
            }

            // Numbered buttons for each page
            for ($btn = 1; $btn <= $totalPages; $btn++) {
                echo '<button class="btn btn-dark mx-1 mb-3"><a href="pagination.php?page=' . $btn . '" class="text-light">' . $btn . '</a></button>';
            }

            // "Next" button - Disable if on the last page
            if ($page < $totalPages) {
                echo '<button class="btn btn-dark mx-1 mb-3"><a href="pagination.php?page=' . ($page + 1) . '" class="text-light">Next</a></button>';
            } else {
                echo '<button class="btn btn-dark mx-1 mb-3" disabled>Next</button>';
            }
            ?>
        </div>
    </div>
</body>

</html>
