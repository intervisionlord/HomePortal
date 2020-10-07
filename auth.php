<?php
# auth.php
# Скрипт авторизации, форма запроса логина и пароля
# v.:0.1.1
# ©2020 intervision

include_once('./conf/settings.php');

include_once($BASEDIR.'/header.php');

echo '
<div class="col d-flex justify-content-center m-5">
<div class="card shadow bg-white rounded" style="width: 18rem;">
<img src="./lib/media/images/padlock.png" class="card-img-top" alt="Padlock image">
  <form>
    <div class="card-body">

      <div class="form-group">
        <label for="LoginField">'.LNG_LOGIN.'</label>
        <input type="text" id="LoginField" class="form-control" aria-describedby="passwordHelpBlock">
        <small id="LoginHelpBlock" class="form-text text-muted">
        '.LNG_LOGIN_DESCR.'
        </small>
      </div>

      <div class="form-group">
        <label for="PasswordField">'.LNG_PASSWORD.'</label>
        <input type="password" id="PasswordField" class="form-control" aria-describedby="passwordHelpBlock">
        <small id="passwordHelpBlock" class="form-text text-muted">
        '.LNG_PASSWORD_DESCR.'
        </small>
      </div>

      <button type="submit" class="btn btn-primary">'.LNG_BTN_LOGIN.'</button>

    </div>
  </form>
</div>
</div>
';

include_once($BASEDIR.'/footer.php');
?>
