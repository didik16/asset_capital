<?php include 'config/base_url.php'; ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Asset Capital Holdings Limited - <?php echo  $title ?></title>
    <meta name="description" content="Asset Capital Holdings Limited offers a wide range of investment solution,  we offer our clients services ranging from investment banking, private wealth management, asset management, stockbroking and more">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:site_name" content="https://assetcapitalholdingslimited" />

    <?php
    if (isset($title)) {
    ?>
        <meta property="og:title" content="Asset Capital Holdings Limited - <?php echo $title ?>" />
    <?php
    } else { ?>
        <meta property="og:title" content="Asset Capital Holdings Limited" />
    <?php } ?>

    <meta property="og:description" content="Asset Capital Holdings Limited offers a wide range of investment solution,  we offer our clients services ranging from investment banking, private wealth management, asset management, stockbroking and more" />
    <meta property="og:image" content="<?php echo ASSET_URL ?>img/favicon.png" />
    <meta property="og:url" content="<?php echo BASE_URL ?>" />
    <meta property="og:type" content="website" />

    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo ASSET_URL ?>img/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600" rel="stylesheet">

    <!-- All css here -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Montserrat:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ASSET_URL ?>css/styles-merged.css">
    <link rel="stylesheet" href="<?php echo ASSET_URL ?>css/style.min.css">
    <link rel="stylesheet" href="<?php echo ASSET_URL ?>css/custom.css">

    <!-- <?php
            if (isset($ipo)) {
                if ($ipo == "ipo") { ?>
            <link rel="stylesheet" href="<?php echo ASSET_URL ?>css/timeline/style.css">
    <?php }
            } ?> -->

</head>