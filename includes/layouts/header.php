<?php
    if (!isset($layout_context)) {
        $layout_context = "public";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Widget Corp <?php if ($layout_context == "admin") { echo
        "Admin"; }?></title>
    <link href="css/public.css" type="text/css" rel="stylesheet">
</head>
<body>
    <header id="header">
        <h1>Widget Corp <?php if ($layout_context == "admin") { echo
    "Admin"; }?></h1>
    </header>
