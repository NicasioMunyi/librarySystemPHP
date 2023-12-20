<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin/adminLogin.php");
    exit();
}
?>

<?php include_once("header.php"); ?>

    <?php include_once("leftnav.php");?>
    <div class="main">
        <h1>Returned Books </h1>
    </div>
    
<?php include_once("footer.php"); ?>
