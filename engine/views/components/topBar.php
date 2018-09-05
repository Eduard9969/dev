<div class="app-header white bg b-b">
      <div class="navbar" data-pjax>
            <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
              <i class="ion-navicon"></i>
            </a>
            <div class="navbar-item pull-left h5" id="pageTitle"><?= $title; ?></div>
            <!-- nabar right -->
            <ul class="nav navbar-nav pull-right">
              <?php
                $controllers = ['project', 'test', 'account'];
                if((isset($_SESSION['admin']['id']) or $_SESSION['authorize']['specialty'] == 1) and (in_array($this->route['controller'], $controllers) and $this->route['action'] == 'index' and isset($this->route['id']))):
              ?>
              <li class="nav-item pos-stc-xs">
                <a class="nav-link" onclick="window.print()" data-toggle="dropdown">
                  <i class="ion-ios-printer w-24"></i>
                </a>
              </li>
              <?php endif; ?>
              <li class="nav-item dropdown pos-stc-xs">
                <a class="nav-link" data-toggle="dropdown">
                  <i class="ion-android-search w-24"></i>
                </a>
                <div class="dropdown-menu  dropdown-menu-scale text-color w-md animated pull-right">
                  <!-- search form -->
                  <form action="/search/" method="get" class="navbar-form form-inline navbar-item m-a-0 p-x v-m" role="search">
                    <div class="form-group l-h m-a-0">
                      <div class="input-group">
                        <input type="text" name='a' required class="form-control" placeholder="Поиск">
                        <span class="input-group-btn">
                          <button type="submit" class="btn white b-a no-shadow">
                            <i class="fa fa-search"></i>
                          </button>
                        </span>
                      </div>
                    </div>
                  </form>
                  <!-- / search form -->
                </div>
              </li>
              <li class="nav-item dropdown pos-stc-xs">
                <a class="nav-link clear" data-toggle="dropdown">
                  <i class="ion-android-notifications-none w-24"></i>
                  <?php if($vars['manager']['countWaitProjects'] > 0): ?>
                  <span class="label up p-a-0 danger"></span>
                  <?php endif; ?>
                </a>
                <!-- dropdown -->
                <div class="dropdown-menu pull-right w-xl animated fadeIn no-bg no-border no-shadow">
                    <div class="scrollable" style="max-height: 220px">
                      <ul class="list-group list-group-gap m-a-0">
                        <li class="list-group-item dark-white box-shadow-z0 b">
                          <!-- <span class="pull-left m-r">
                            <img src="/templ/images/a0.jpg" alt="..." class="w-40 img-circle">
                          </span> -->
                          <?php if($vars['manager']['countWaitProjects'] > 0): ?>
                          <a href="/project/" class="clear block">
                            Новые проекты ожидают модерации
                            <small class="block text-muted">Количество: <?= $vars['manager']['countWaitProjects']; ?></small>
                          </a>
                          <?php else: ?>
                          <span class="clear block">
                            Новых уведомлений сейчас нет
                            <small class="block text-muted">Как так? - А вот так  ¯＼_(ツ)_/¯</small>
                          </span>
                          <?php endif; ?>
                        </li>
                        <!-- <li class="list-group-item dark-white box-shadow-z0 b">
                          <span class="pull-left m-r">
                            <img src="/templ/images/a1.jpg" alt="..." class="w-40 img-circle">
                          </span>
                          <span class="clear block">
                            <a href="#" class="text-primary">Joe</a> Added you as friend<br>
                            <small class="text-muted">2 hours ago</small>
                          </span>
                        </li>
                        <li class="list-group-item dark-white text-color box-shadow-z0 b">
                          <span class="pull-left m-r">
                            <img src="/templ/images/a2.jpg" alt="..." class="w-40 img-circle">
                          </span>
                          <span class="clear block">
                            <a href="#" class="text-primary">Danie</a> sent you a message<br>
                            <small class="text-muted">1 day ago</small>
                          </span>
                        </li> -->
                      </ul>
                    </div>
                </div>
                <!-- / dropdown -->
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link clear" data-toggle="dropdown">
                  <span class="avatar w-32 <?= $_SESSION['authorize']['select_color']; ?>">
                    <?= substr(strtoupper($_SESSION['authorize']['username']), 0, 1); ?>
                    <!-- <i class="on b-white"></i> -->
                  </span>
                </a>
                <div class="dropdown-menu w dropdown-menu-scale pull-right">
                  <a class="dropdown-item" href="/account/<?= $_SESSION['authorize']['id']; ?>">
                    <span>Профиль</span>
                  </a>
                  <a class="dropdown-item" href="/account/edit">
                    <span>Настройки</span>
                  </a>
                  <!-- <a class="dropdown-item" href="app.inbox.html">
                    <span>Inbox</span>
                  </a>
                  <a class="dropdown-item" href="app.message.html">
                    <span>Message</span>
                  </a> -->
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/docs">
                    Нужна помощь?
                  </a>
                  <a class="dropdown-item" href="/account/logout">Выйти</a>
                </div>
              </li>
            </ul>
            <!-- / navbar right -->
      </div>
</div>
