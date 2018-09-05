<!-- aside -->
<div id="aside" class="app-aside fade nav-dropdown black">
  <!-- fluid app aside -->
  <div class="navside dk" data-layout="column">
    <div class="navbar no-radius">
      <!-- brand -->
      <a href="/" class="navbar-brand">
        <div data-ui-include="'/templ/images/logo.svg'"></div>
        <img src="/templ/images/logo.png" alt="." class="hide">
        <span class="hidden-folded inline">SeoPro</span>
      </a>
      <!-- / brand -->
    </div>
    <div data-flex class="hide-scroll">
        <nav class="scroll nav-stacked nav-stacked-rounded nav-color">

          <ul class="nav" data-ui-nav>
            <!-- Главное меню -->
            <li class="nav-header hidden-folded">
              <span class="text-xs">Главное меню</span>
            </li>
            <li>
              <a href="/dashboard/" class="b-danger">
                <span class="nav-icon text-white no-fade">
                  <i class="ion-filing"></i>
                </span>
                <span class="nav-text">Главный экран</span>
              </a>
            </li>
            <li>
              <a class="b-success">
                <?php if($vars['manager']['countWaitProjects'] > 0): ?>
                <span class="nav-label">
                  <b class="label label-xs rounded success"></b>
                </span>
                <?php endif; ?>
                <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                <span class="nav-icon text-white no-fade">
                  <i class="ion-android-apps"></i>
                </span>
                <span class="nav-text">Проекты</span>
              </a>
              <ul class="nav-sub nav-mega nav-mega-3 text-sm">
                <li>
                  <a href="/project/" title="Панель Обозрение" >
                    <span class="nav-text">Обзор</span>
                  </a>
                </li>
                <li>
                  <a href="/project/archive/" title="Архив сайтов и проектов">
                    <span class="nav-text">Архив</span>
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="app.inbox.html" class="b-info">
                <span class="nav-icon text-white no-fade">
                  <i class="ion-email fa fa-ticket"></i>
                </span>
                <span class="nav-text">Тикеты</span>
              </a>
            </li>
            <!-- <li>
              <a href="app.message.html" class="b-default">
                <span class="nav-label">
                  <b class="label label-xs rounded danger"></b>
                </span>
                <span class="nav-icon">
                  <i class="ion-chatbubble-working"></i>
                </span>
                <span class="nav-text">Messages</span>
              </a>
            </li> -->
            <li>
              <a href="#" class="b-default">
                <span class="nav-icon">
                  <i class="ion-person"></i>
                </span>
                <span class="nav-text">Контакты</span>
              </a>
            </li>

            <!-- Меню администратора -->
            <?php if(isset($_SESSION['admin']['id'])): ?>
            <li class="nav-header hidden-folded m-t">
              <span class="text-xs">Меню администратора</span>
            </li>
            <li>
              <a href="/admin/users">
                <span class="nav-icon">
                  <i class="ion-ios-people"></i>
                </span>
                <span class="nav-text">Пользователи</span>
              </a>
            </li>
            <li>
              <a href="/admin/sites">
                <span class="nav-icon">
                  <i class="ion-earth"></i>
                </span>
                <span class="nav-text">Сайты</span>
              </a>
            </li>
            <li>
              <a href="/admin/projects">
                <span class="nav-icon">
                  <i class="ion-document"></i>
                </span>
                <span class="nav-text">Проекты</span>
              </a>
            </li>
            <li>
              <a href="/admin/tests">
                <span class="nav-icon">
                  <i class="ion-pie-graph"></i>
                </span>
                <span class="nav-text">Тесты</span>
              </a>
            </li>
            <?php endif; ?>
          </ul>
        </nav>
    </div>
    <div data-flex-no-shrink>
      <div class="nav-fold dropup">
        <a data-toggle="dropdown">
            <div class="pull-left">
              <div class="inline">
                <span class="avatar w-40 grey">
                  <?= substr(strtoupper($_SESSION['authorize']['username']), 0, 1); ?>
                </span>
              </div>
              <img src="/templ/images/a0.jpg" alt="..." class="w-40 img-circle hide">
            </div>
            <div class="clear hidden-folded p-x">
              <span class="block _500 text-muted">
                <?= $_SESSION['authorize']['username']; ?>
              </span>
              <div class="progress-xxs m-y-sm lt progress">
                  <div class="progress-bar info" style="width: 15%;">
                  </div>
              </div>
            </div>
        </a>
        <div class="dropdown-menu w dropdown-menu-scale ">
          <a class="dropdown-item" href="/account/<?= $_SESSION['authorize']['id']; ?>">
            <span>Профиль</span>
          </a>
          <a class="dropdown-item" href="/account/edit">
            <span>Настройки</span>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/docs">
            Нужна помощь?
          </a>
          <a class="dropdown-item" href="/account/logout">Выйти</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / -->
