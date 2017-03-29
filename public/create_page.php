<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php require_once("../includes/validation_function.php");?>
<?php confirm_logged_in();?>
<?php
if (isset($_POST['submit'])) {
    $menu_name = mysql_prep($_POST["menu_name"]);
    $subject_id = substr($_POST["subject_id"], 0, 1);
    $position = 1;
    $visible = (int) $_POST["visible"];
    $content = mysql_prep($_POST["content"]);

    $required_fields = array("menu_name", "subject_id", "visible", "content");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("menu_name" => 30);
    validate_max_lengths($fields_with_max_lengths);

    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        redirect_to("new_page.php");
    }

    $query = "INSERT INTO pages
              (subject_id, menu_name, position, visible, content)
              VALUES ({$subject_id}, '{$menu_name}', {$position}, {$visible}, '{$content}')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION["message"] = "Page created.";
        redirect_to("manage_content.php");
    } else {
        $_SESSION["message"] = "Page creation failed";
        redirect_to("new_page.php");
    }
} else {
    redirect_to("new_page.php");
}
?>









<?php
if (isset($connection)) { mysqli_close($connection); }
?>

