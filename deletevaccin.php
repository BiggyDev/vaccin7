<?php
include('inc/pdo.php');
include('inc/functions.php');
include('inc/requests.php');

$nomTable = 'yjlv_vaccins';

if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];
  delete($nomTable,$id);
  header('Location: datavaccins.php');
  }
