<?php
# settings.php
# Основные настройки и базовые переменные
# v.:0.0.1
# @intervision

### Базовые переменные
$LANG = 'RU_ru';

### Не редактируйте все, что ниже этого комментиря
### Системные переменные
$BASEDIR = $_SERVER['DOCUMENT_ROOT'];
$TOOLS_DIR = $BASEDIR.'/tools';

include_once($BASEDIR.'/conf/functions.php');
include_once($BASEDIR.'/conf/db_settings.php');
include_once($BASEDIR.'/lang/'.$LANG.'/lang.php');

?>
