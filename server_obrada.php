<?php
include "konekcija.php";
 

$table = $db_table;
$primaryKey = 'idCountry';
 
// Niz sa nazivima kolona iz baze. Prvi niz dodaje id atribut u svaki <tr>
$columns = array(
array(
        'db' => 'idCountry',
        'dt' => 'DT_RowId',
        'formatter' => function( $d, $row ) {
            return $d;
        }
      ),
    array( 'db' => 'idCountry', 'dt' => 0 ),
    array( 'db' => 'countryCode',  'dt' => 1 ),
    array( 'db' => 'countryName',   'dt' => 2 ),
    array( 'db' => 'currencyCode',     'dt' => 3 ),
    array( 'db' => 'capital',     'dt' => 4 ),
    array( 'db' => 'continentName',     'dt' => 5 ),

);
 
// SQL server connection information
$sql_details = array(
    'user' => $db_user,
    'pass' => $db_pass,
    'db'   => $db_db,
    'host' => $db_server
);
 
 
//Treba postaviti putanju do ssp.class.php (proveriti folder gde se nalazi DataTables)
 
require( 'DataTables-1.10.4/examples/server_side/scripts/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
