<?php

//Compte le nombre de vaccins dans la BDD
function countAllVaccin(){
  global $pdo;
  $sql = "SELECT COUNT(*) FROM yjlv_vaccins";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $totalItems = $stmt->fetchColumn();

  return $totalItems;
}
//Fin fonction


//Compte le nombre d'utilisateurs dans la BDD
function countAllUsers(){
  global $pdo;
  $sql = "SELECT COUNT(*) FROM yjlv_users";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $totalItems = $stmt->fetchColumn();

  return $totalItems;
}
//Fin fonction


//Affiche tous les vaccins présents en BDD
function showAllVaccin(){
  global $pdo;
  $sql = "SELECT * FROM yjlv_vaccins";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $vaccins = $query -> fetchAll();

  return $vaccins;
}
//Fin fonction


//Affiche les vaccins présents en BDD en prenant en compte les paramètres de pagination
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
//Fin fonction


//Affiche les vaccins présents en BDD en prenant en compte les paramètres de pagination
function showUsersInPagination($offset, $itemsPerPage){
  global $pdo;
  $sql = "SELECT * FROM yjlv_users
          ORDER BY id ASC
          LIMIT $offset,$itemsPerPage";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $users = $stmt->fetchAll();

  return $users;
}
//Fin fonction


//Affiche tous les utilisateurs présents dans la BDD
function showAllUsers() {
  global $pdo;
  $sql = "SELECT * FROM yjlv_users";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $users = $query -> fetchAll();

  return $users;
}
//Fin fonction


//Affiche les données de l'utilisateur connecté
function showConnectedUserInfo($id) {
  global $pdo;
  $sql ="SELECT * FROM yjlv_users WHERE id = :id";
  $query = $pdo -> prepare($sql);
  $query -> bindValue(':id', $id, PDO::PARAM_INT);
  $query -> execute();
  $user = $query -> fetch();

  return $user;
}
//Fin fonction


//Met à jour les données du profil de l'utilisateur
function updateProfileUserInfo(){
  global $pdo;
  $sql = "UPDATE yjlv_users SET (age,sex,weight,height,modified_at)
          VALUES (:age, :sex, :weight, :height, NOW())";
  $query = $pdo->prepare($sql);
  $query->bindValue(':age',$age, PDO::PARAM_INT);
  $query->bindValue(':sex',$sex, PDO::PARAM_STR);
  $query->bindValue(':weight',$weight, PDO::PARAM_INT);
  $query->bindValue(':height',$height, PDO::PARAM_INT);
  $query->execute();
}
//Fin fonction
