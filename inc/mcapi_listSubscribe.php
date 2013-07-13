<?php
/**
Subscribes a New Member to a List using the MCAPI.php class and do some basic error checking.
**/
require_once 'MCAPI.class.php';
require_once 'config.php'; //contains apikey

$api = new MCAPI($apikey);

$subscriberemailID = $_POST["EMAIL"];

$retval = $api->listSubscribe( $listId, $subscriberemailID, $merge_vars = null );

if ($api->errorCode){
	header( '#' );
} else {
    header( '#' );
}

?>
