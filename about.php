<?php
# about.php
# Страница "О скрипте"
# v.:0.1.1
# © 2020 intervision

include_once('./conf/settings.php');

include_once($BASEDIR.'/header.php');

$TOOLS_COUNT = count(glob($BASEDIR.'/tools/*', GLOB_ONLYDIR));

echo '

<h1>'.ICO_QUESTION.' '.LNG_ABOUT.'</h1>
<h2>'.LNG_ABT_COMMON.'</h2>

<table class="table table-hover table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col">'.LNG_ABT_PARAM.'</th>
      <th scope="col">'.LNG_ABT_VALUE.'</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>'.LNG_ABT_VERSION.'</td>
      <td>'.$VERSION.'</td>
    </tr>
    <tr>
      <td>'.LNG_ABT_LANG.'</td>
      <td>'.$LANG.'</td>
    </tr>
    <tr>
      <td>'.LANGVERSION.'</td>
      <td>'.$LANG_VER.'</td>
    </tr>
    <tr>
      <td>'.LNG_TOOLS_COUNT.'</td>
      <td>'.$TOOLS_COUNT.'</td>
    </tr>
  </tbody>
</table>

<h2>'.LNG_ABT_TOOLS.'</h2>

<table class="table table-hover table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col">'.LNG_NAME.'</th>
      <th scope="col">'.LNG_DESCR.'</th>
    </tr>
  </thead>
  <tbody>
';

$TOOLS_LIST = array_diff(scandir($TOOLS_DIR),array('..', '.'));;
  foreach($TOOLS_LIST as $TOOL)  {
      include_once($BASEDIR.'/tools/'.$TOOL.'/lang/'.$LANG.'/lang.php');
      $TOOL_NAME = constant('TL_'.$TOOL.'_NAME');
      $TOOL_DESCR = constant('TL_'.$TOOL.'_DESCR');
      echo '
        <tr>
          <td>'.$TOOL_NAME.'</td>
          <td>'.$TOOL_DESCR.'</td>
          </tr>';
      }
echo '
  </tbody>
</table>
';

include_once($BASEDIR.'/footer.php');

?>
