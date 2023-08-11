<!DOCTYPE html>
<html lang="en">

<head>
    <!------------ meta & css link -------------->
    <?php include('../Admin/partials/_head_link.php') ?>

    <title>Customers Page</title>
</head>

<body>

    <section id="main">

        <?php include('../Admin/partials/_sideMenuBar.php') ?>

        <div class="customers_table right_container">
            <div class="header">
                <h2>All Customers</h2>
                <button type="button" class="btn btn-outline-primary" onclick="logout()">Logout</button>
            </div>
            <div id="customer_info_table">
                <table id="MyTable">
                    <thead>
                        <tr>
                            <td>sno.</td>
                            <td>Username</td>
                            <td>Email</td>
                            <td>Contact no.</td>
                            <td>Joining Date&Time</td>
                        </tr>
                    </thead>
                    <tbody class="c-info">

                        <?php
                        $adminID = $_SESSION['admin_id'];   
                    
                        include('../Admin/partials/_dbconnect.php');
                        $sql3 = "SELECT * FROM `customers` WHERE `admin_id` = '$adminID'";
                        $result3 = mysqli_query($conn, $sql3);
                        $sno = 0;

                        while ($row = mysqli_fetch_assoc($result3)) {
                            $sno += 1;

                            echo '
                            <tr>
                                <td>' . $sno . '</td>
                                <td>' . $row['customer_name'] . '</td>
                                <td>' . $row['customer_email'] . '</td>
                                <td>' . $row['contact_no'] . '</td>
                                <td>' . $row['joining_date_time'] . '</td>
                            </tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>



    <!------------ Javascript -------------->

    <?php include('../Admin/partials/_js_script.php') ?>

</body>

</html>


