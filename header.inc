<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    if (isset($author)) {
        echo '<meta name="author" content="'. htmlspecialchars($author) . '">';
    }
    ?>
    <title><?php echo $pageTitle; ?></title>

    <link rel="stylesheet" href="styles/style.css" />
    <link rel="icon" href="favicon.ico">

    <?php
    if (isset($pageStyles)) {
        echo $pageStyles;
    }
    ?>
</head>

<body>