<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title><?php echo $title; ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo $description; ?>">
  <link rel="stylesheet" href="<?php echo $path; ?>css/a_modern_css_rest.css?<?php filemtime($path, 'css/a_modern_css_rest.css'); ?>">
  <link rel="stylesheet" href="<?php echo $path; ?>css/style.css?<?php echo filemtime($path, 'style.css'); ?>">
  
  <!-- filemtime が効かない理由を見つける @1.26.2023 -->