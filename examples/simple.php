<?php

	// $Id$

	// TODO: change to require_once 'Net/Ident.php';
	require_once '../../Net_Ident/Ident.php';
	$ident   = new Net_Ident;
	$user    = $ident->getUser();
	$os_type = $ident->getOsType();
	echo "user: $user, operating system: $os_type\n";
?>
