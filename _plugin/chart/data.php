<?php
// Connect to MySQL
$link = mysql_connect( 'localhost', 'root', '' );
if ( !$link ) {
  die( 'Could not connect: ' . mysql_error() );
}

// Select the data base
$db = mysql_select_db( 'db_pokoko_4', $link );
if ( !$db ) {
  die ( 'Error selecting database \'test\' : ' . mysql_error() );
}

// Fetch the data
$query = "
  SELECT DATE_FORMAT(DATE, '%Y-%m-%d') AS date, SUM(qty) AS value FROM order_product GROUP BY DAY(DATE) ORDER BY DATE ASC";
$result = mysql_query( $query );

// All good?
if ( !$result ) {
  // Nope
  $message  = 'Invalid query: ' . mysql_error() . "\n";
  $message .= 'Whole query: ' . $query;
  die( $message );
}

// Print out rows
$data = array();
while ( $row = mysql_fetch_assoc( $result ) ) {
  $data[] = $row;
}
echo json_encode( $data );

// Close the connection
mysql_close($link);
?>
