<?php
/**
 *	OUTRAGEbot - PHP 5.3 based IRC bot
 *
 *	Author:		David Weston <westie@typefish.co.uk>
 *
 *	Version:        2.0.0-Alpha
 *	Git commit:     a29fdc0da8885075d18511f41860d97c3923a140
 *	Committed at:   Sun, 30 Jan 2011 17:12:24 +0000
 *
 *	Licence:	http://www.typefish.co.uk/licences/
 */


/**
 *	Setting the error reporting.
 */
error_reporting(E_ALL | E_STRICT);


/**
 *	Set the tick rate.
 */
define("BOT_TICKRATE", 2600);


/**
 *	Some bot-brag-relating things.
 */
define("BOT_VERSION", "2.0.0-Alpha-a29fdc0");
define("BOT_RELDATE", "30/01/2011");


/**
 *	The ways of the bots of sending messages.
 */
define("SEND_DEF", 0);
define("SEND_MAST", 1);
define("SEND_CURR", 2);
define("SEND_DIST", 4);
define("SEND_ALL", 8);


/**
 *	Channel/user modes.
 */
define("MODE_USER_VOICE", 1);
define("MODE_USER_HOPER", 2);
define("MODE_USER_OPER", 4);
define("MODE_USER_ADMIN", 8);
define("MODE_USER_OWNER", 16);


/**
 *	A little trick to do with event handlers.
 */
define("END_EVENT_EXEC", 0x80000000);