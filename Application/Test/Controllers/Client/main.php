<?php

$action = $_GET['action'];

switch ($action)
{
	case 'add_client':
		include 'Test/Controllers/Client/client_add.php';
	break;
	case 'save_client':
		include 'Test/Controllers/Client/client_save.php';
	break;
	default:
		include 'Test/Controllers/Client/client_add.php';
	break;
}

?>