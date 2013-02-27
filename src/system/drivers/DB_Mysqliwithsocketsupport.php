<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

require(TL_ROOT . '/system/drivers/DB_Mysqli.php');

class DB_Mysqliwithsocketsupport extends DB_Mysqli
{
    /**
     * Connect to the database server and select the database
     */
    protected function connect()
    {
        if(!array_key_exists('dbSocket', $GLOBALS['TL_CONFIG']))
        {
            throw new ErrorException("With this driver \$GLOBALS['TL_CONFIG']['dbSocket'] must be set!");
        }

        @$this->resConnection = new mysqli(
            $GLOBALS['TL_CONFIG']['dbHost'],
            $GLOBALS['TL_CONFIG']['dbUser'],
            $GLOBALS['TL_CONFIG']['dbPass'],
            $GLOBALS['TL_CONFIG']['dbDatabase'],
            $GLOBALS['TL_CONFIG']['dbPort'],
            $GLOBALS['TL_CONFIG']['dbSocket']
        );
        @$this->resConnection->set_charset($GLOBALS['TL_CONFIG']['dbCharset']);
    }

    /**
     * Change the current database
     * @param string
     * @return boolean
     */
    protected function set_database($strDatabase)
    {
        if(!array_key_exists('dbSocket', $GLOBALS['TL_CONFIG']))
        {
            throw new ErrorException("With this driver \$GLOBALS['TL_CONFIG']['dbSocket'] must be set!");
        }

        @$this->resConnection = new mysqli(
            $GLOBALS['TL_CONFIG']['dbHost'],
            $GLOBALS['TL_CONFIG']['dbUser'],
            $GLOBALS['TL_CONFIG']['dbPass'],
            $strDatabase,
            $GLOBALS['TL_CONFIG']['dbPort'],
            $GLOBALS['TL_CONFIG']['dbSocket']
        );
    }
}