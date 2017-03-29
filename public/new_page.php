<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php confirm_logged_in();?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php");?>
<?php find_selected_page(); ?>
<main id="main">
    <nav id="navigation">
        <?php echo navigation($current_subject, $current_page);?>
    </nav>
    <div id="page">
        <?php echo message(); ?>
        <?php $errors = errors(); ?>
        <?php echo form_errors($errors);?>
        <h2>Create Page</h2>
        <form action="create_page.php" method="post">
            <p>Page name:
                <input type="text" name="menu_name" value="" >
            </p>
            <p>Subject Name:
                <select name="subject_id">
                    <?php
                    $subject_set = find_all_subjects(false);
                    $subject_count = mysqli_num_rows($subject_set);
                    for($count=1; $count <= ($subject_count); $count++) {
                        echo "<option>";
                        echo find_subject_by_id($count)["id"] . ". " . find_subject_by_id($count)["menu_name"];
                        echo "</option>";
                    }
                    ?>
                </select>
            </p>
            <p>Visible:
                <input type="radio" name="visible" value="0"> No
                &nbsp;
                <input type="radio" name="visible" value="1"> Yes
            </p>
            <p>Content:
                <textarea name="content" value="" ></textarea>
            </p>
            <input type="submit" name="submit" value="Create Page">
        </form>
        <br>
        <a href="manage_content.php">Cancel</a>
    </div>
</main>
<?php include("../includes/layouts/footer.php");?>

