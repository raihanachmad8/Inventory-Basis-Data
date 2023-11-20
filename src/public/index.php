<?php
// phpinfo();
// require_once __DIR__ . '/../Config/App.php';
// $host = APP::Env('DB_HOST');
// $port = APP::Env('DB_PORT');
// $database = APP::Env('DB_DATABASE');
// $username = APP::Env('DB_USERNAME');
// $password = APP::Env('DB_PASSWORD');

// try {
//     // Connection string for Microsoft SQL Server
//     $connectionString = "sqlsrv:Server=$host,$port;Database=$database";
//     $connection = new PDO($connectionString, $username, $password);
    
//     // Set PDO to throw exceptions on errors
//     $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     // Handle connection errors
//     die("Connection failed: " . $e->getMessage());
// }

require_once __DIR__ . '/../App/Router.php';
require_once __DIR__ . '/../App/View.php';
require_once __DIR__ . '/../Controllers/Home.php';
require_once __DIR__ . '/../Controllers/InventoryController.php';

Router::get('/', HomeController::class, 'index');

Router::get('/inventory', InventoryController::class, 'index');

Router::get('/inventory/create', InventoryController::class, 'createForm');
Router::post('/inventory/create', InventoryController::class, 'create');

Router::post('/inventory/update', InventoryController::class, 'update');
Router::get('/inventory/update', InventoryController::class, 'updateForm');

Router::delete('/inventory/delete', InventoryController::class, 'delete');
Router::post('/inventory/search', InventoryController::class, 'search');



Router::run();