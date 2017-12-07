<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
</head>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="http://bbs.hatoq.com/icon.png">
    <title>JVB Board | Index</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/css/formValidation.min.css">
    <link rel="stylesheet" type="text/css" href="/css/datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/css/cake.generic.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.ui.timepicker.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="/css/mycss.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
     <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <style type="text/css">
  .error{
    color: red;
  }
  </style>
</head>
<body>
    <header>
        <?php echo $this->element('header'); ?>
    </header>
    <!-- <?= $this->Flash->render() ?> -->
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
        <?php echo $this->element('footer'); ?>
    </footer>
</body>
</html>
