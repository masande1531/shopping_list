<?php
include_once 'db_connection.php';

$objeto = new Database();
$connection = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);



$option = isset($_POST['option']) ?? '';
$id = isset($_POST['id']) ?? '';
$item = isset($_POST['item']) ?? '';
$is_checked = isset($_POST['is_checked']) ?? '';

switch($option){
	case 1:
        $sql = "SELECT id, item, date_added, is_checked FROM shopping_list";
        $result = $connection->prepare($sql);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2:
        $sql = "INSERT INTO shopping_list (item, date_added, is_checked) VALUES('$item',now() , '$is_checked') ";
        $result = $connection->prepare($sql);
        $result->execute();                
        break;
    case 3:
        $sql = "UPDATE shopping_list SET item='$item', is_checked='$is_checked' WHERE id='$id' ";		
        $result = $connection->prepare($sql);
        $result->execute();                        
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 4:
        $sql = "DELETE FROM shopping_list WHERE id='$id' ";		
        $result = $connection->prepare($sql);
        $result->execute();                           
        break;    
}

print json_encode($data, JSON_UNESCAPED_UNICODE);
$connection = NULL;
