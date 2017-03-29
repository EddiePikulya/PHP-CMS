<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php require_once("../includes/validation_function.php");?>
<?php confirm_logged_in();?>
<?php $current_admin = find_admin_by_id($_GET["id"]);?>
<?php
if (!$current_admin) {
    redirect_to("manage_admins.php");
}
?>
<?php
if (isset($_POST['submit'])) {
    $required_fields = array("admin_name", "password");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("admin_name" => 15, "password" => 15);
    validate_max_lengths($fields_with_max_lengths);

    if (empty($errors)) {
        $id = $current_admin["id"];
        $admin_name = mysql_prep($_POST["admin_name"]);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $query = "UPDATE admins SET
                  username = '{$admin_name}',
                  hased_password = '{$password}'
                  WHERE id = {$id}
                  LIMIT 1";
        $result = mysqli_query($connection, $query);
        if ($result && mysqli_affected_rows($connection) == 1) {
            $_SESSION["message"] = "Admin updated.";
            redirect_to("manage_admins.php");
        } else {
            $message = "Admin update failed";
        }
    }
} else {

}
?>
<?php include("../includes/layouts/header.php");?>

    <main id="main">
        <nav id="navigation">
        </nav>
        <div id="page">
            <?php
            if (!empty($message)) {
                echo "<div class=\"message\">" . htmlentities($message) . "</div>";
            }
            ?>
            <?php echo form_errors($errors);?>
            <h2>Edit Admin: <?php echo htmlentities($current_admin["username"]);?></h2>

            <form action="edit_admin.php?id=
            <?php echo urlencode($current_admin["id"]);?>" method="post">
                <p>Admin name:
                    <input type="text" name="admin_name" value="<?php echo htmlentities($current_admin["username"]);?>" >
                </p>
                <p>Password:
                    <input type="text" name="password" value="<?php echo htmlentities($current_admin["hased_password"]);?>" >
                </p>
                <input type="submit" name="submit" value="Edit Admin">
            </form>
            <br>
            <a href="manage_admins.php">Cancel</a>
        </div>
    </main>
<?php include("../includes/layouts/footer.php");?>