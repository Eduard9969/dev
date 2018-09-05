<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title><?= $title; ?></title>
    <meta name="description" content="Responsive, Bootstrap, BS4" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="/templ/images/logo.png">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="/templ/images/logo.png">

    <!-- style -->
    <link rel="stylesheet" href="/templ/css/animate.css/animate.min.css" type="text/css" />
    <link rel="stylesheet" href="/templ/css/glyphicons/glyphicons.css" type="text/css" />
    <link rel="stylesheet" href="/templ/css/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="/templ/css/material-design-icons/material-design-icons.css" type="text/css" />
    <link rel="stylesheet" href="/templ/css/ionicons/css/ionicons.min.css" type="text/css" />
    <link rel="stylesheet" href="/templ/css/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="/templ/css/bootstrap/dist/css/bootstrap.min.css" type="text/css" />

    <!-- build:css css/styles/app.min.css -->
    <link rel="stylesheet" href="/templ/css/styles/app.css" type="text/css" />
    <link rel="stylesheet" href="/templ/css/styles/style.css" type="text/css" />
    <!-- endbuild -->
    <link rel="stylesheet" href="/templ/css/styles/font.css" type="text/css" />
  </head>

  <body>
  <div class="app" id="app">
        <?= $content; ?>
  </div>

  <?php if ($this->route['controller'] != 'main' and $this->route['action'] != 'index'): ?>
  <!-- ############ SWITHCHER START-->
    <div id="switcher">
      <div class="switcher dark-white" id="sw-theme">
        <a href="#" data-ui-toggle-class="active" data-ui-target="#sw-theme" class="dark-white sw-btn">
          <i class="fa fa-gear fa-paint-brush text-muted"></i>
        </a>
        <div class="box-header">
          <strong>Настройка Внешнего Вида</strong>
        </div>
        <div class="box-divider"></div>
        <div class="box-body">
          <p>Цветовая схема:</p>
          <p data-target="color">
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="primary">
              <i class="primary"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="accent">
              <i class="accent"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="warn">
              <i class="warn"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="success">
              <i class="success"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="info">
              <i class="info"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="warning">
              <i class="warning"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="danger">
              <i class="danger"></i>
            </label>
          </p>
          <p>Оформление:</p>
          <div data-target="bg" class="clearfix">
            <label class="radio radio-inline m-a-0 ui-check ui-check-lg">
              <input type="radio" name="theme" value="">
              <i class="light"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-lg">
              <input type="radio" name="theme" value="grey">
              <i class="grey"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-lg">
              <input type="radio" name="theme" value="dark">
              <i class="dark"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-lg">
              <input type="radio" name="theme" value="black">
              <i class="black"></i>
            </label>
          </div>
        </div>
      </div>
    </div>
  <!-- ############ SWITHCHER END-->
  <?php endif; ?>

    <script src="/templ/libs/jquery/dist/jquery.js"></script>
    <!-- Bootstrap -->
    <script src="/templ/libs/tether/dist/js/tether.min.js"></script>
    <script src="/templ/libs/bootstrap/dist/js/bootstrap.js"></script>
    <!-- core -->
    <script src="/templ/libs/jQuery-Storage-API/jquery.storageapi.min.js"></script>
    <script src="/templ/libs/PACE/pace.min.js"></script>
    <script src="/templ/libs/jquery-pjax/jquery.pjax.js"></script>
    <script src="/templ/libs/blockUI/jquery.blockUI.js"></script>
    <script src="/templ/libs/jscroll/jquery.jscroll.min.js"></script>

    <script src="/templ/scripts/config.lazyload.js"></script>
    <script src="/templ/scripts/ui-load.js"></script>
    <script src="/templ/scripts/ui-jp.js"></script>
    <script src="/templ/scripts/ui-include.js"></script>
    <script src="/templ/scripts/ui-device.js"></script>
    <script src="/templ/scripts/ui-form.js"></script>
    <script src="/templ/scripts/ui-modal.js"></script>
    <script src="/templ/scripts/ui-nav.js"></script>
    <script src="/templ/scripts/ui-list.js"></script>
    <script src="/templ/scripts/ui-screenfull.js"></script>
    <script src="/templ/scripts/ui-scroll-to.js"></script>
    <script src="/templ/scripts/ui-toggle-class.js"></script>
    <script src="/templ/scripts/ui-taburl.js"></script>
    <script src="/templ/scripts/app.js"></script>
    <script src="/templ/scripts/ajax.js"></script>
    <!-- <script src="/templ/scripts/form.js"></script> -->
    <!-- endbuild -->
  </body>
</html>
