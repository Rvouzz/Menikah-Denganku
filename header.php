<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $judul ?? 'Halaman' ?></title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>

  <?php
  error_reporting(false);
  $scriptname = explode('/', $_SERVER['PHP_SELF']);
  $current_file = end($scriptname) ?? ''; ?>