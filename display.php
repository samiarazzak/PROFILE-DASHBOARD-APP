<?php

include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD-PROFILE-APP</title>
    <!-- ============== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="header text-center text-white p-2" style="background-color: black; border-top: 8px solid orange;">
        <h2><b><u>DASHBOARD-PROFILE-APP</u></b></h2>
    </div>


    <div class="container">

        
        <div class="btn mt-3">
        <a href="./index.php" ><button class="btn btn-dark">Add User</button></a>
        </div>

        <div class="card p-3 mt-3 text-center">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">number</th>
                        <th scope="col">Password</th>
                        <th scope="col">Option</th>

                    </tr>
                </thead>
                <tbody>

                    <?php

                    $sql = "select * from  `dashboarddesign`.`userprofile`";
                    $result = mysqli_query($connect, $sql);
                    if ($result) {
                        // $row = mysqli_fetch_assoc($result);
                        // echo $row['username'];

                        while ($row = mysqli_fetch_assoc($result)) {

                            $id = $row['id'];
                            $username = $row['username'];
                            $email = $row['email'];
                            $number = $row['number'];
                            $password = $row['password'];

                            echo '
                            
                             <tr>
                                <th scope="row">'.$id.'</th>
                                <td>'.$username.'</td>
                                <td>'.$email.'</td>
                                <td>'.$number.'</td>
                                <td>'.$password.'</td>
                                <td>
                            <a href="./dashboard.php?updateid='.$id.'"><button class="btn btn-success">view</button></a>
                            <a href="./delete.php?deleteid='.$id.'"><button class="btn btn-danger">Delete</button></a>
                        </td>

                    </tr>
                            
                            
                            ';
                        }
                    }

                    ?>



                </tbody>
            </table>

        </div>



    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>