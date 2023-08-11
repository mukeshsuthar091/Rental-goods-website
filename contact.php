<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- for icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Contact Page</title>
</head>

<body>

    <!------------ database connecting -------------->
    <?php include('partials/_dbconnect.php'); ?>

    <!------------ Navigation bar -------------->
    <?php include('partials/_navbar.php'); ?>


    <?php
    // INSERT INTO `contactus` (`sno`, `user_name`, `user_email`, `subject`, `message`, `timestamp`) VALUES ('1', 'Mukesh Suthar', 'mukesh.s.01@gmail.com', 'About website', 'This is a good website and the UI is awesome.', current_timestamp());

    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $uname = $_POST['uname'];
        $uemail = $_POST['uemail'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $sql = "INSERT INTO `contactus` (`user_name`, `user_email`, `subject`, `message`, `timestamp`) VALUES ('$uname', '$uemail', '$subject', '$message', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
    }
    // if ($showAlert == true) {
    //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //             <strong>Success!</strong> Your message has been send! Please wait for community to respond.
    //             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //         </div>';
    // }
    ?>



    <!------------ Message -------------->

    <section id="page-header" class="about-header">
        <?php
        if ($showAlert == true) {
            echo '
                <div id="showAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your message has been send! Please wait for community to respond.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        ?>

        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you!</p>
    </section>

    <section id="form-details">
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>
            <input type="text" placeholder="Your Name" name="uname" id="uname" required>
            <input type="email" placeholder="E-mail" name="uemail" id="uemail" required>
            <input type="text" placeholder="Subject" name="subject" id="subject" required>
            <textarea cols="30" rows="10" placeholder="Your Message" name="message" id="message" required></textarea>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </section>

    <!------------ Footer -------------->
    <?php include('partials/_footer.php'); ?>


    <!------------ Javascript -------------->

    <?php include('partials/_js_script.php') ?>


</body>

</html>