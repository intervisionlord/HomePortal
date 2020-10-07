<?php
# nav.php
# Шаблон наивгационной панели
# v.:0.0.1
# @intervision

if ($WARN_TESTCONFIG == '1') {
  echo '
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>'.LNG_WARNING.'</strong> '.LNG_TESTCONFIG_USED.'
    <br>
    <small>'.LNG_DONTUSEDBG.'</small>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  ';
}

echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">
    <img src="/lib/media/images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="'.LNG_TITLE.' logo">
    '.LNG_TITLE.'
  </a>
';

# Статические пукнты меню
echo '
<div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        '.ICO_STAR.' '.LNG_MODULES.'
      </a>
      <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
';

# Генерация меню на основе установленных инструментов
$TOOLS_LIST = array_diff(scandir($TOOLS_DIR),array('..', '.'));;
foreach($TOOLS_LIST as $TOOL)  {
    include_once($BASEDIR.'/tools/'.$TOOL.'/lang/'.$LANG.'/lang.php');
    $TOOL_NAME = constant('TL_'.$TOOL.'_NAME');
    echo '<a class="dropdown-item bg-dark text-light" href="/tools/'.$TOOL.'/">'.ICO_FORWARD.' '.$TOOL_NAME.'</a>';
    }

# Прочие элементы меню
echo '
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/lib/doc/'.$LANG.'/doc">'.ICO_DOC.' '.LNG_DOCUMENTATION.'</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/about">'.ICO_QUESTION.' '.LNG_ABOUT.'</a>
      </li>

    </ul>
  </div>
</nav>

<div class="container">
';

?>
