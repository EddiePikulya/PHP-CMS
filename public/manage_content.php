<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/functions.php");?>
<?php confirm_logged_in();?>
<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php");?>

<?php find_selected_page(); ?>
<main id="main">
    <nav id="navigation">
        <br>
        <a href="admin.php">&laquo; Main menu</a><br>
        <?php echo navigation($current_subject, $current_page);?>
        <br>
        <a href="new_subject.php">+ Add a subject</a>
        <br>
        <a href="new_page.php">+ Add a page</a>
    </nav>
    <div id="page">
        <?php echo message(); ?>
        <?php if ($current_subject) {?>
            <h2>Manage subject</h2>
            <?echo "Menu name: " . htmlentities($current_subject["menu_name"]) . "<br>";?>
            <?echo "Position: " . $current_subject["position"] . "<br>";?>
            <?echo $current_subject["visible"] == 1 ? 'Visible: yes' : 'Visible: no';?><br>
            <a href="edit_subject.php?subject=<?php echo
            urlencode($current_subject["id"]); ?>">Edit Subject</a>
        <?} elseif ($current_page) {?>
            <h2>Manage page</h2>
            <?echo "Menu name: " . htmlentities($current_page["menu_name"]) . "<br>";?>
            <?echo "Position: " . $current_page["position"] . "<br>";?>
            <?echo $current_page["visible"] == 1 ? 'Visible: yes' : 'Visible: no';?><br>
            Content:<br>
            <div class="view-content">
                <?php echo htmlentities($current_page["content"]); ?>
            </div>
            <a href="edit_page.php?page=<?php echo
            urlencode($current_page["id"]); ?>&subject_id=<?php echo urlencode($current_page["subject_id"]);?>">Edit Page</a>
        <?} else {
            echo "Please select a subject";
        }?>
    </div>
</main>
<?php include("../includes/layouts/footer.php");?>