<?php
/**
 * @author         Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright      (c) 2013-2014, Pierre-Henry Soria. All Rights Reserved.
 * @link           http://github.com/pH-7/
 * @license        CC BY-NC-SA <http://creativecommons.org/licenses/by-nc-sa/3.0/>
 */
defined('PH7') or exit('Restricted access');

/**
 * Escape string with htmlspecialchars() PHP function.
 *
 * @param string $sVal
 * @return string
 */
function escape($sVal)
{
    return htmlspecialchars($sVal, ENT_QUOTES);
}

/**
 * Validate name (first and last name).
 *
 * @param string $sName
 * @param integer $iMin Default 2
 * @param integer $iMax Default 20
 * @return boolean
 */
function validate_name($sName, $iMin = 2, $iMax = 20)
{
    return (is_string($sName) && mb_strlen($sName) >= $iMin && mb_strlen($sName) <= $iMax);
}

/**
 * Validate email.
 *
 * @param string $sEmail
 * @return boolean
 */
function validate_email($sEmail)
{
    return (filter_var($sEmail, FILTER_VALIDATE_EMAIL) && mb_strlen($sEmail) < 120);
}

/**
 * Validate URL.
 *
 * @param string $sUrl
 * @return boolean
 */
function validate_url($sUrl)
{
    return (filter_var($sUrl, FILTER_VALIDATE_URL) && mb_strlen($sUrl) < 120);
}

/**
 * Validate How Hear About our Software text.
 *
 * @param string $sHowHearAboutSoft
 * @return boolean
 */
function validate_how_about($sHowHearAboutSoft)
{
    return (mb_strlen($sHowHearAboutSoft) > 5);
}

/**
 * Get the client IP address.
 *
 * @return string
 */
function client_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        $sIp = $_SERVER['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        $sIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else
        $sIp = $_SERVER['REMOTE_ADDR'];

    return preg_match('/^[a-z0-9:.]{7,}$/', $sIp) ? $sIp : '0.0.0.0';
}

/**
 * Generate the license key.
 *
 * @return string The license key.
 */
function generate_license()
{
    $iRandNum = mt_rand(0,9);
    $aKeys = array('9-7'.$iRandNum.'65', '7-9'.$iRandNum.'65', '9-6'.$iRandNum.'57', '9-7'.$iRandNum.'56');
    return mt_rand(1000,9999) . '-' . mt_rand(100,999) . $aKeys[mt_rand(0,3)] . '-1890';
}
