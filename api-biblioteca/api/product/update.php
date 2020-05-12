<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
$db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  
// prepare product object
$product = new Product($db);
  
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
  
// set ID property of product to be edited
$product->id = $data->id;
  
// set product property values
$product->name = $data->name;

$product->description = $data->description;

$product->isbn = $data->isbn;

$product->author = $data->author;
$product->publisher = $data->publisher;
$product->category_id = $data->category_id;
$product->modified = $data->modified;

  // update the product
if($product->update()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "Book was updated."));
}else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    // var_dump($product->update());
    echo json_encode(array("message" => "Unable to update Book.")); //
}
?>