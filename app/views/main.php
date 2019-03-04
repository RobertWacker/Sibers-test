<?php
  function printNav(){

    // Навигация в зависимости от авторизации
    if (isset($_SESSION['login'])) {
      echo '<a href="/users">users</a><a href="/logout"><i class="fas fa-sign-in-alt"></i> logout</a>';
    } else {
      echo '<a href="/login"><i class="fas fa-sign-in-alt"></i> login</a>';
    }
  }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Sibers example</title>
  
  <!-- meta tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- css style sheets -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link rel="stylesheet" type="text/css" href="/css/common.css">
  <link rel="stylesheet" type="text/css" href="/css/login.css">
  <link rel="stylesheet" type="text/css" href="/css/users.css">
  <link rel="stylesheet" type="text/css" href="/css/profile.css">

  <!-- js files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="/js/common.js"></script>

</head>
<body>
  <!-- Modal window for informing about actions with user accounts -->
  <div class="modal__layout" style="display: none;">
    <div class="modal__box">
      <div class="modal__header">
        Do you want to continue?
      </div><!-- /modal__header -->
      <div class="modal__content">
        Are you sure you want to delete this account?<br>
        <b id="modal-name"></b>
      </div><!-- /modal__content -->
      <div class="modal__actions">
        <a id="modal-yes">Yes</a>
        <a id="modal-no">No</a>
    </div><!-- /modal__actions -->
    </div><!-- /modal__box -->
  </div><!-- /modal__layout -->

  <header>
    <div class="header__wrap">
      <div class="logo"><a href="/">Sibers example</a></div>
      <nav>

        <?php printNav(); ?>
        
      </nav>
    </div><!-- /header__wrap -->
  </header>

  <?php print_r($content); ?>

  <footer>
    Sibers example &copy; 2019
  </footer>
</body>
</html>