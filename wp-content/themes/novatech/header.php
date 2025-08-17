<?php

/**
 * Header Template 
 * 
 * @package NovaTech
 */

?>

<!DOCTYPE html>
<html <?= language_attributes() ?>>
<head>
    <meta charset="<?= blogInfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Tech</title>

    <?php wp_head(); ?>
</head>
<body>
<?php wp_body_open() ?>

<header>This is the Header</header>
