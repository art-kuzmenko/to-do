<?php 

require_once(ROOT . 'libs/rb-mysql.php');

try {
     R::setup( 
    'mysql:host=' . DB_HOST .';dbname='. DB_NAME,
     DB_USER, 
     DB_PASS
); 

if(!R::testConnection()){
    throw new Exception("Could not connect to database");
}

} catch(Exception $e) {
    die("Database connection error: " . $e->getMessage());
}
