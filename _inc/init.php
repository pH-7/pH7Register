<?php
/**
 * @author         Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright      (c) 2013, Pierre-Henry Soria. All Rights Reserved.
 * @license        CC BY-NC-SA <http://creativecommons.org/licenses/by-nc-sa/3.0/>
 */
defined('PH7') or exit('Restricted access');

require 'config.php';
require 'class/Db.php';
require 'fns.php';
require 'db_fns.php';

// Verify and correct the time zone if necessary
if (!ini_get('date.timezone'))
    date_default_timezone_set(PH7_DEFAULT_TIMEZONE);


/*** Connection to the database ***/
try
{
    $aParams = array(
        'db_charset' => PH7_DB_CHARSET,
        'db_type' => PH7_DB_TYPE,
        'db_hostname' => PH7_DB_HOST,
        'db_name' => PH7_DB_NAME,
        'db_username' => PH7_DB_USR,
        'db_password' => PH7_DB_PWD
    );

    $DB = new Db($aParams);
}
catch (PDOException $oE)
{
    header('HTTP/1.1 500 Internal Server Error');
    exit('Could not connect to database server!');
}
