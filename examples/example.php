<?php

// $Id$

/* Here's an example of libident in use. Site visitors connecting from a host
   with an ident server running will get their username and os type displayed,
   or an error message if no server is running.

   This script shows some of the methods available:
   user(), getOsType(), and identError()
 */

// TODO: change to require_once 'Net/Ident.php';
require_once '../../Net_Ident/Ident.php';

// some users will be going through a proxy - this attempts to work out their
// real IP address:
if (getenv('HTTP_X_FORWARDED_FOR') != '') {
	$addr = getenv('HTTP_X_FORWARDED_FOR');
} else {
	$addr = $_SERVER['REMOTE_ADDR'];
}

// Object construction
$ident = new Net_Ident($addr, $_SERVER['REMOTE_PORT'],
		$_SERVER['SERVER_PORT']);

if (PEAR::isError($err = $ident->query())) {
	die(htmlspecialchars($err->getMessage()));
}

if ($ident->user() === false) {
	print 'Ident query failed: '.htmlspecialchars($ident->identError())
		.'.<br>'."\n";
} else {
	print 'Ident query OK, username "'.htmlspecialchars($ident->user())
		.'", operating system type "'.htmlspecialchars($ident->getOsType())
		.'".<br>'."\n";
}

?>
