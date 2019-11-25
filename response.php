<?php
//include connection file 
include_once("./connect/db_cls_connect.php");
$db = new dbObj();
$connString =  $db->getConnstring();
$params = $_POST;
// echo $params['login'];
$username = filter_input(INPUT_POST, "name");
echo $username;
$action = $params['action'] !='' ? $params['action'] : '';
$userCls = new User($connString);

switch($action) {
    case 'login':
       $userCls->login();
    break;
    case 'register':
       $userCls->register();
    break;
    case 'logout':
       $userCls->logout();
    break;
    default:
    return;
}

class User{
    protected $conn;
	protected $data = array();
	function __construct($connString) {
		$this->conn = $connString;
    }
    
    function login() {
        echo $_POST["email"];
        echo $_POST["password"];
    }
}
?>