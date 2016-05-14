<?php
// Attogram - templates - header

namespace Attogram;

if( !isset($title) || !$title || !is_string($title) ) {
  $title = 'Attogram Framework';
}

?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php print $this->path; ?>/web/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php print $this->path; ?>/web/attogram.css">
<title><?php print $title; ?></title>
<script src="<?php print $this->path; ?>/web/jquery.min.js"></script>
<script src="<?php print $this->path; ?>/web/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$navbar = $this->templates_dir . '/navbar.php';
if( is_readable_file( $navbar, 'php' ) ) {
  include( $navbar );
} else {
  $this->error[] = "Missing navbar template: $navbar";
}
