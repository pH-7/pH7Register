<?php
/**
 * @title          Helper PDO Database Class
 *
 * @author         Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright      (c) 2012-2013, Pierre-Henry Soria. All Rights Reserved.
 * @license        GNU General Public License <http://www.gnu.org/licenses/gpl.html>
 */
defined('PH7') or exit('Restricted access');

class Db extends PDO
{

    public function __construct(array $aParams)
    {
        $aDriverOptions[PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES ' . $aParams['db_charset'];
        parent::__construct("{$aParams['db_type']}:host={$aParams['db_hostname']};dbname={$aParams['db_name']};", $aParams['db_username'], $aParams['db_password'], $aDriverOptions);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

}
