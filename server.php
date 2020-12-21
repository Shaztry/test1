<?php
define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'shas3');

define('DB_PASSWORD', 'shas3@123');

define('DB_NAME', 'mydb');

$table = 'form';

$primaryKey = 'fname';

$columns = array(
    array('db' => 'fname', 'dt' => 0),
    array('db' => 'mname', 'dt' => 1),
    array('db' => 'address', 'dt' => 2),
    array('db' => 'phone', 'dt' => 3),
    array('db' => 'date_of_birth', 'dt' => 4,
        'formatter' => function ($d, $row) {
            return date('d-m-Y', strtotime($d));
        },
    ),

);

$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db' => 'blog_samples',
    'host' => 'localhost',
);

require 'vendor/datatables/ssp.class.php';

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
