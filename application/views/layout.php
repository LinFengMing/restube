<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>restube</title>
    <base href="<?=base_url();?>">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:400,700&display=swap&subset=chinese-traditional" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/w3.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/plugin/unslider.css"> -->
    <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div class="wrap">
        <?php include('header.php'); ?>
        <?php include($page); ?>
        <?php include('footer.php'); ?>
    </div>
</body>
</html>