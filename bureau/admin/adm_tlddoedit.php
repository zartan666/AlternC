<?php
/*
 ----------------------------------------------------------------------
 LICENSE

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License (GPL)
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 To read the license please visit http://www.gnu.org/copyleft/gpl.html
 ----------------------------------------------------------------------
*/

/** 
 * Manage allowed TLDs to be installed as domain on the server
 * 
 * @copyright AlternC-Team 2000-2017 https://alternc.com/  
 */

require_once("../class/config.php");
$fields = array (
        "tld"                 => array ("post", "string", ""),
        "mode"                => array ("post", "integer", ""),
);      
getFields($fields);


if (!$admin->enabled) {
	$msg->raise("ERROR", "admin", _("This page is restricted to authorized staff"));
	echo $msg->msg_html_all();
        exit();
}

if (!$admin->edittld($tld,$mode)) {
        include("adm_tldedit.php");
        exit();
} else {
        $msg->raise("INFO", "admin", _("The TLD has been successfully edited"));
        include("adm_tld.php");
        exit();
}
?>
