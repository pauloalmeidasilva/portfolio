<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Site Portfólio | <?=$title?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Base -->
    <link rel="stylesheet" href="<?=CSS.'normalize.css'?>">
    <link rel="stylesheet" href="<?=CSS.'animate.css'?>">

    <!-- Core -->
    <link rel="stylesheet" href="<?=CSS.'core/bootstrap.min.css'?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Plugin -->
    <link type="text/css" rel="stylesheet" href="<?=CSS.'plugins/dataTables.bootstrap4.min.css'?>">
    
    <!-- CSS Exclusivo da página -->
    <?php if (isset($stylesheets)) {
        foreach ($stylesheets as $stylesheet) {?>
            <link href="<?=CSS.$stylesheet?>" rel="stylesheet">
        <?php }
    } ?>

    <style type="text/css">

        img[alt="www.000webhost.com"]{
            display: none;
        }
    </style>
</head>