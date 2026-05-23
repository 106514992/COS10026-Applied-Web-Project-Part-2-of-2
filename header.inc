<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>

    <link rel="stylesheet" href="assets/style.css" />
    <link rel="icon" href="assets/favicon.ico">

    <?php
    if (isset($pageStyles)) {
        echo $pageStyles;
    }
    ?>
</head>

<body>