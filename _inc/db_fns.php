<?php
/**
 * @author         Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright      (c) 2013, Pierre-Henry Soria. All Rights Reserved.
 * @license        CC BY-NC-SA <http://creativecommons.org/licenses/by-nc-sa/3.0/>
 */
defined('PH7') or exit('Restricted access');

function is_email_exists($sEmail)
{
    global $DB;

    $rStmt = $DB->prepare('SELECT COUNT(email) FROM '.PH7_DB_PREFIX.'User WHERE email = :email LIMIT 1');
    $rStmt->execute(array('email' => $sEmail));
    return ($rStmt->fetchColumn() == 1);
}

function add_user($aData)
{
    global $DB;

    $rStmt = $DB->prepare('INSERT INTO '.PH7_DB_PREFIX.'User (firstName, lastName, email, url, howHearAboutSoftware, joinDate, ip) VALUES (:firstName, :lastName, :email, :url, :howHearAboutSoftware, :joinDate, :ip)');
    return $rStmt->execute($aData);
}

function check_wait($sIp, $iWaitTime, $sCurrentTime)
{
    global $DB;

    $rStmt = $DB->prepare('SELECT profileId FROM '.PH7_DB_PREFIX.'User WHERE ip = :ip AND DATE_ADD(joinDate, INTERVAL :waitTime MINUTE) > :currentTime LIMIT 1');
    $rStmt->execute(array(
        'ip' => $sIp,
        'waitTime' => $iWaitTime,
        'currentTime' => $sCurrentTime
    ));
    return ($rStmt->rowCount() === 0);
}
