<?php

session_start();

include_once("../database/config.php");

// Check if admin is already logged in
if(isset($_SESSION['admin_id'])){ 
    header("Location: index.php");
    exit();
}

// Check if form submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Input validation
    if(empty($username) || empty($password)){
        $error = "Username and Password Required";
    } else {
        // Check login credentials
        $stmt = $conn->prepare("SELECT AdminID, Password FROM Admins WHERE Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0){
            $stmt->bind_result($AdminID, $storedPassword);
            $stmt->fetch();

            // Verify password (assuming plain text)/ not encypted
            
            if($password == $storedPassword){
                $_SESSION['admin_id'] = $AdminID;
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid Password";
            }
        } else {
            $error = "Invalid Username";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/admincss/index.css">
    <link rel="stylesheet" href="../assets/admincss/form.css">
    <link rel="stylesheet" href="../assets/admincss/footer.css">

    <title>Admin Login</title>
</head>
<body>

<div>
        <div class="container">

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h2>Admin Login</h2>
                <?php if (isset($error)){ ?>
                    <p class ="error"><?php echo $error; ?><p>        
                <?php } ?>
                <div class="input">
                    <input type="text" id="username" placeholder="Username" name="username" required>
                </div>
                <div class="input">
                    <input type="password" id="password" placeholder="Password" name="password" required>
                    <div class="forgot">
                        <a href="#">Forgot Password?</a>
                    </div>
                </div>

                <button type="submit">Login</button>
            </form>


        </div>
    <?php include_once("footer.php"); ?>
