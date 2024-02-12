<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/import.util.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php Import::layout('head'); ?>
    <title>Page1</title>
</head>

<body>
    <?php Import::layout('nav') ?>
    <?php Import::component('forms/register.form.php');?>
</body>

</html>