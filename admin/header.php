<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/admincss/index.css">
    <link rel="stylesheet" href="../assets/admincss/form.css">
    <link rel="stylesheet" href="../assets/admincss/footer.css">
    <link rel="stylesheet" href="../assets/admincss/header.css">
    <link rel="stylesheet" href="../assets/admincss/leftnav.css">
    <script>
    window.onscroll = function() {
        myFunction();
    };

    function myFunction() {
        var header = document.querySelector('.header');
        if (window.pageYOffset > 0) {
            header.classList.add('sticky');
        } else {
            header.classList.remove('sticky');
        }
    }
</script>


    <title>Your Library</title>
</head>
<body>
    <div class="header">
        <div class="logo">My Library</div>
        <div class="nav">
            <?php
                if(isset($_SESSION['admin_id']) || isset($_SESSION['user_id'])){
                    echo '<a href="../admin/logout.php">My Profile</a>';
                    echo '<a href="../admin/logout.php">Logout</a>';
                } else {
                    echo '<a href="user/login.php">Login</a>';
                }
            ?>
        </div>      
    </div>
    <div class="container">
