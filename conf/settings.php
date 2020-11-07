<?php
# settings.php
# Основные настройки и базовые переменные
# v.:0.2.0
# © 2020 intervision

### Базовые переменные
$LANG = 'RU_ru';
$BASEDIR = $_SERVER['DOCUMENT_ROOT'];

### Не редактируйте все, что ниже этого комментиря
### Системные переменные
$TOOLS_DIR = $BASEDIR.'/tools';
$VERSION = '0.2.0';

### Подключение зависимостей
include_once($BASEDIR.'/lang/'.$LANG.'/lang.php');
include_once($BASEDIR.'/lib/icons/icons.php');

### Проверка наличия тестового конфига
if (file_exists($BASEDIR.'/conf/tst_db_settings.php')) {
    include_once($BASEDIR.'/conf/tst_db_settings.php');
    $WARN_TESTCONFIG = '1';
  } else {
    include_once($BASEDIR.'/conf/db_settings.php');
    $WARN_TESTCONFIG = '0';
}

?>
