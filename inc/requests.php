<?php

function countAllVaccin(){
  global $pdo;
  $sql = "SELECT COUNT(*) FROM yjlv_vaccins";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $totalItems = $stmt->fetchColumn();

  return $totalItems;
}

function showAllVaccin(){
  global $pdo;
  $sql = "SELECT * FROM yjlv_vaccins";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $vaccins = $query -> fetchAll();

  return $vaccins;
}

function showVaccinInPagination($offset, $itemsPerPage){
  global $pdo;
  $sql = "SELECT * FROM yjlv_vaccins
          ORDER BY name ASC
          LIMIT $offset,$itemsPerPage";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $vaccins = $stmt->fetchAll();

  return $vaccins;
}
