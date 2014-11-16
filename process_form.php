<?php
/**
 * @author         Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright      (c) 2013-2014, Pierre-Henry Soria. All Rights Reserved.
 * @link           http://github.com/pH-7/
 * @license        CC BY-NC-SA <http://creativecommons.org/licenses/by-nc-sa/3.0/>
 */
defined('PH7') or exit('Restricted access');

require '_inc/init.php';

$sFirstName = (!empty($_POST['first_name'])) ? escape($_POST['first_name']) : null;
$sLastName = (!empty($_POST['last_name'])) ? escape($_POST['last_name']) : null;
$sEmail = (!empty($_POST['email'])) ? escape($_POST['email']) : null;
$sUrl = (!empty($_POST['url'])) ? escape($_POST['url']) : null;
$sHowHearAboutSoft = (!empty($_POST['how_hear_about_software'])) ? escape($_POST['how_hear_about_software']) : null;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $sCurrentTime = date('Y-m-d H:i:s');
    $sIp = client_ip();

    if (isset($sFirstName, $sLastName, $sEmail, $sUrl, $sHowHearAboutSoft))
    {
        if (!validate_email($sEmail))
        {
            $sError = 'Your Email address is not valid.';
        }
        elseif (!validate_url($sUrl))
        {
            $sError = 'Your software URL is not valid.';
        }
        elseif (!validate_name($sFirstName))
        {
            $sError = 'Your First Name must be between 2 and 20 characters.';
        }
        elseif (!validate_name($sLastName))
        {
            $sError = 'Your Last Name must be between 2 and 20 characters.';
        }
        elseif (!validate_how_about($sHowHearAboutSoft))
        {
            $sError = 'Please say where you heard about the software.';
        }
        elseif (is_email_exists($sEmail))
        {
            $sError = 'You have already requested a license key with this email address.';
        }
        elseif (!check_wait($sIp, 1440, $sCurrentTime))
        {
            $sError = 'The registration batch are not allowed! Please wait.';
        }
        else
        {
            $aData = array(
                'firstName' => $sFirstName,
                'lastName' => $sLastName,
                'email' => $sEmail,
                'url' => $sUrl,
                'howHearAboutSoftware' => $sHowHearAboutSoft,
                'joinDate' => $sCurrentTime,
                'ip' => $sIp
            );

            if (add_user($aData))
            {
                $sSuccess = 'Your pH7CMS license key is: ' . generate_license();
            }
            else
            {
                $sError = 'Oops! An error has occurred, please try again later.';
            }
        }
    }
    else
    {
        $sError = 'All fields are required!';
    }
}
