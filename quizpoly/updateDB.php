<?php
include_once( 'config/db.php' );

$db = new db();
$connect = $db->connect();

$courseNameList = array();

$myfile = fopen( 'courseNameList.txt', 'r' ) or die( 'Unable to open file!' );

while( !feof( $myfile ) ) {
    array_push( $courseNameList, fgets( $myfile ));
}
fclose( $myfile );

$courseNameList = array_values( array_filter( $courseNameList ) );

unset( $courseNameList[ 75 ] );

foreach ( $courseNameList as &$value ) {
    $filename = "c:\\Data\\".trim($value).".json";
    echo $filename;
    $myfile = fopen($filename , 'r' ) or die( 'Unable to open file!' );
    $data = fread( $myfile, filesize( $filename) );
    fclose( $myfile );
    $sql = "UPDATE `quiz_data` SET `Data`=? WHERE CourseName=?";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(1, $data);
    $stmt->bindParam(2, trim($value));
    $stmt->execute();
    echo 'update done'.$value;
}

?>