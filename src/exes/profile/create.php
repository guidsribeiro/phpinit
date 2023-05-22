<?php

require_once("../../connection.php");

$name = isset($_POST["name"]) ? $_POST["name"] : NULL;

if (!$name || $name == "") {
    header("Location: ../../profile.php?error=Nome é obrigatório");
    exit;
}

$sql = ("INSERT INTO `profile` (`name`) VALUES (:name)");
$stmt = Db::connection()->prepare($sql);
$stmt->bindParam(":name", $name, PDO::PARAM_STR);

if($stmt->execute()){
  header("Location: ../../profile.php?success=Perfil cadastrado com sucesso");
  exit;
}else{
  header("Location: ../../profile.php?error=Ocorreu um erro ao cadastrar o perfil");
  exit;
}

