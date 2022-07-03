<?php require './config/database.php'; ?>

<?php
    // for toggling active mark in nav
    $active_page = basename($_SERVER['PHP_SELF'], '.php');
?>

<section class="header">
    <ul class="nav-list">
        <li><a href="index.php" class="nav-home <?php echo ($active_page == 'index') ? 'nav-active' : ''; ?>">Home</a></li>
        <li><a href="comment.php" class="nav-comments <?php echo ($active_page == 'comment') ? 'nav-active' : ''; ?>">Comments</a></li>
        <li><a href="about.php" class="nav-about <?php echo ($active_page == 'about') ? 'nav-active' : ''; ?>">About</a></li>
    </ul>
</section>