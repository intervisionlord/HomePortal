<?php
# nav.php
# Шаблон наивгационной панели
# v.:0.0.1
# @intervision

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
  <!--
    <li class="nav-item active">
      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Features</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Pricing</a>
    </li>
    -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        '.LNG_MODULES.'
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
';

# Генерация меню на основе установленных инструментов
$TOOLS_LIST = array_diff(scandir($TOOLS_DIR),array('..', '.'));;
foreach($TOOLS_LIST as $TOOL)  {
    $TOOL_NAME = file_get_contents($BASEDIR.'/tools/'.$TOOL.'/lang/'.$LANG.'/toolname');
    echo '<a class="dropdown-item" href="/tools/'.$TOOL.'/">'.$TOOL_NAME.'</a>';
    }

echo '
        </div>
      </li>
    </ul>
  </div>
</nav>
';

?>
