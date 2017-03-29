<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php include("../includes/layouts/header.php");?>
<?php confirm_logged_in();?>
<main id="main">
    <nav id="navigation">
    </nav>
    <div id="page">
        <?php echo message(); ?>
        <?php $errors = errors(); ?>
        <?php echo form_errors($errors);?>
        <h2>Create Admin</h2>

        <form action="create_admin.php" method="post">
            <p>Admin name:
                <input type="text" name="admin_name" value="" >
            </p>
            <p>Password:
                <input type="password" name="password" value="" >
            </p>
            <input type="submit" name="submit" value="Create Admin">
        </form>
        <br>
        <a href="manage_admins.php">Cancel</a>
    </div>
</main>
<?php include("../includes/layouts/footer.php");?>
