<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php confirm_logged_in();?>
<?php
$current_admin = find_admin_by_id($_GET["id"]);
if (!$current_admin) {
    redirect_to("manage_admins.php");
}
$query = "DELETE FROM admins 
              WHERE id = {$current_admin["id"]}
              LIMIT 1";
$result = mysqli_query($connection, $query);
if ($result && mysqli_affected_rows($connection) == 1) {
    $_SESSION["message"] = "Admin deleted.";
    redirect_to("manage_admins.php");
} else {
    $_SESSION["message"] = "Admin deletion failed.";
    redirect_to("manage_admins.php");
}

?>
