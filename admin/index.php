<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin/adminLogin.php");
    exit();
}
?>

<?php include_once("../includes/header.php"); ?>

    <?php include_once("../includes/leftnav.php");?>
    <div class="main">
        <h2>Admin Dashboard</h2>
    </div>
    
<?php include_once("../includes/footer.php"); ?>
