<?php

	// $Id$

	require_once 'Net/Ident.php';
	$ident   = new Net_Ident;
	$user    = $ident->getUser();
	$os_type = $ident->getOsType();
	echo "user: $user, operating system: $os_type\n";
?>
