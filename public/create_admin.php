<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php require_once("../includes/validation_function.php");?>
<?php confirm_logged_in();?>
<?php
if (isset($_POST['submit'])) {

    $required_fields = array("admin_name", "password");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("admin_name" => 15, "password" => 15);
    validate_max_lengths($fields_with_max_lengths);

    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        redirect_to("new_admin.php");
    }
    $admin_name = mysql_prep($_POST["admin_name"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $query = "INSERT INTO admins
              (username, hased_password)
              VALUES ('{$admin_name}', '{$password}')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION["message"] = "Admin created.";
        redirect_to("manage_admins.php");
    } else {
        $_SESSION["message"] = "Admin creation failed";
        redirect_to("new_admin.php");
    }
} else {
    redirect_to("new_admin.php");
}
?>


<?php
if (isset($connection)) { mysqli_close($connection); }
?>
