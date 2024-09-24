<?php
include 'connection.php';
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Arial', sans-serif;
    }

    .container {
      margin-top: 50px;
    }

    table {
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    table th {
      background-color: #343a40;
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    table td {
      text-align: center;
      padding: 10px;
      vertical-align: middle;
    }

    .btn-dark {
      background-color: #343a40;
      color: #fff;
      border-radius: 5px;
      padding: 5px 10px;
    }

    .btn-dark:hover {
      background-color: #495057;
      color: #fff;
    }

    .btn-danger {
      background-color: #dc3545;
      color: #fff;
      border-radius: 5px;
      padding: 5px 10px;
    }

    .btn-danger:hover {
      background-color: #c82333;
    }

    table tbody tr:nth-child(odd) {
      background-color: #f2f2f2;
    }

    table tbody tr:nth-child(even) {
      background-color: #e9ecef;
    }

    table tbody tr:hover {
      background-color: #dee2e6;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
      table {
        font-size: 14px;
      }
      table th, table td {
        padding: 5px;
      }
    }
  </style>

  <title>Display Data</title>
</head>

<body>
  <div class="container">
    <h2 class="text-center mb-4">User Information</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">S1 No</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
          <th scope="col">Mobile</th>
          <th scope="col">Subjects</th>
          <th scope="col">Gender</th>
          <th scope="col">Place</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "Select * from exampledb";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $fname = $row['fname'];
          $lname = $row['lname'];
          $email = $row['email'];
          $mobile = $row['mobile'];
          $datas = $row['multipleData'];
          $gender = $row['gender'];
          $place = $row['place'];
          echo '<tr>
            <th scope="row">' . $id . '</th>
            <td>' . $fname . '</td>
            <td>' . $lname . '</td>
            <td>' . $email . '</td>
            <td>' . $mobile . '</td>
            <td>' . $datas . '</td>
            <td>' . $gender . '</td>
            <td>' . $place . '</td>
            <td>
              <a href="update.php?updateid=' . $id . '" class="btn btn-dark">Update</a>
              <a href="delete.php?deleteid=' . $id . '" class="btn btn-danger">Delete</a>
            </td>
          </tr>';
        }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>
