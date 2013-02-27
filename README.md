Contao LTS mysqli socket connection support

### Installation

#### Files
copy the content of the src folder to your Installation (PLEASE NOT WITH APPLE FINDER), merge the data, not overwrite all

#### Configuration

Modify your system/config/localconfig.php
```php
$GLOBALS['TL_CONFIG']['dbDriver'] = 'mysqliwithsocketsupport';
$GLOBALS['TL_CONFIG']['dbSocket'] = 'path/to/the/mysql.sock';
```