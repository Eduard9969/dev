<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>505</title>
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

    <div class="p-a black">
          <div class="navbar" data-pjax>
                <a data-toggle="collapse" data-target="#navbar" class="navbar-item pull-right hidden-md-up m-a-0 m-l">
                  <i class="ion-android-menu"></i>
                </a>
                <!-- brand -->
                <a href="/" class="navbar-brand">
                  <div data-ui-include="'/templ/images/logo.svg'"></div>
                  <img src="/templ/images/logo.png" alt="." class="hide">
                  <span class="hidden-folded inline">SeoPro</span>
                </a>
                <!-- / brand -->

                <!-- navbar collapse -->
                <div class="collapse navbar-toggleable-sm pull-right pull-none-xs" id="navbar">
                  <!-- link and dropdown -->
                  <ul class="nav navbar-nav text-info-hover" data-ui-nav>
                    <li class="nav-item">
                      <a href="/account/register" class="nav-link">
                        <span class="nav-text text-info">
                          Присоединиться
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/account/login" class="nav-link">
                        <span class="btn btn-md rounded info">
                          Войти
                        </span>
                      </a>
                    </li>
                  </ul>
                  <!-- / link and dropdown -->
                </div>
                <!-- / navbar collapse -->
          </div>
    </div>

  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-body">

<!-- ############ PAGE START-->

<div class="row-col indigo h-v">
  <div class="row-cell v-m">
    <div class="text-center col-sm-6 offset-sm-3 p-y-lg">
      <h1 class="display-3 m-y-lg">Без Паники! Мы все починим.</h1>
      <p class="m-y text-muted h4">
        -- 505 --
      </p>
    </div>
  </div>
</div>

<!-- ############ PAGE END-->

    </div>
  </div>
  <!-- / -->

  <div class="footer black text-info-hover">
    <div class="container">
      <div class="p-y-lg b-b">
        <a href="/account/login" class="btn info rounded pull-right pull-none-xs">Войти в систему</a>
        <div class="m-r">
          <div class="text-md p-y-sm">Система независимого тестирования представлена в рамках демонстрационной версии!</div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="p-y-lg">
        <div class="m-b-lg text-sm">

          <div class="text-muted pull-right pull-none-xs m-b">
            <span class="text-muted">&copy; SeoPro. All rights reserved.</span>
          </div>
          <div>
            <a href="#" class="btn btn-sm btn-icon btn-social rounded lt" title="Facebook">
                  <i class="fa fa-facebook"></i>
                  <i class="fa fa-facebook indigo"></i>
              </a>
              <a href="#" class="btn btn-sm btn-icon btn-social rounded lt" title="Twitter">
                  <i class="fa fa-twitter"></i>
                  <i class="fa fa-twitter light-blue"></i>
              </a>
              <a href="#" class="btn btn-sm btn-icon btn-social rounded lt" title="Google+">
                  <i class="fa fa-google-plus"></i>
                  <i class="fa fa-google-plus red-600"></i>
              </a>
          </div>
            </div>
      </div>
    </div>
  </div>

<!-- ############ LAYOUT END-->
  </div>

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
      <!-- endbuild -->
    </body>
  </html>
