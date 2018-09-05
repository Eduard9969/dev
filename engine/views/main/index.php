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
                  <a href="#features" data-ui-scroll-to class="nav-link">
                    <span class="nav-text">Возможности</span>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="#demos" data-ui-scroll-to class="nav-link">
                    <span class="nav-text">Demos</span>
                  </a>
                </li> -->
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

<div class="row-col black">
<div class="col-sm-3"></div>
<div class="col-sm-6 text-center">
  <div class="p-t-lg">
    <h1 class="m-y-md text-white">Система Независимого Тестирования Сайта</h1>
    <h6 class="text-muted m-b-lg">Демонстрационная версия</h6>
    <a href="/dashboard" class="btn btn-lg rounded success p-x-md m-x">Приступить к работе</a>
    <a href="/account/register" class="btn btn-lg rounded p-x-md m-x">У меня нет аккаунта</a>
  </div>
</div>
<div class="col-sm-3"></div>
</div>
<div class="black">
<div>
  <canvas data-ui-jp="chart" data-ui-options="
  {
    type: 'line',
    data: {
        labels: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'],
        datasets: [
            {
                label: 'Dataset',
                data: [35, 30, 28, 32, 25, 22, 19, 30, 35, 41, 35, 40, 42, 45, 43, 50, 52, 55, 65, 60, 62, 60, 70, 77, 85, 100],
                fill: true,
                lineTension: 0.3,
                backgroundColor: '#2196f3',
                borderColor: '#41abff',
                borderWidth: 3,
                pointBorderColor: '#2196f3',
                pointBackgroundColor: '#fff',
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: '#fff',
                pointHoverBorderWidth: 2,
                pointRadius: 0,
                pointHitRadius: 10,
                spanGaps: false,
                barPercentage: 1
            }
        ]
    },
    options: {
        maintainAspectRatio: false,
        scales:{
          xAxes: [{
             display: false,
             barPercentage: 0.5
          }],
          yAxes: [{
             display: false
          }]
        },
        legend:{
          display: false
      },
      tooltips:{
        enabled: false
      }
    }
  }
  " height="280">
  </canvas>
  </div>
</div>
<div class="row-col info h-v p-t-lg">
<div class="col-sm-1"></div>
<div class="col-sm-5">
  <div class="p-a-lg">
    <h3 class="m-y-lg">Один простой шаг к тестированию</h3>
    <p class="text-muted m-b-lg text-md">Вам достаточно быть подтвержденным пользователем проекта, чтобы разместить проект и отправить его на тестирование.</p>
    <a href="/account/register" class="btn rounded btn-outline b-white b-2x m-b-lg p-x-md">Присоединиться сейчас</a>
  </div>
</div>
<div class="col-sm-6" style="min-height: 320px; background-image:url(/templ/images/test.png); background-size: cover">
</div>
</div>
<div class="p-y-lg b-b box-shadow-z0 dark-white" id="features">
<div class="container p-y-md">
  <h4 class="text-center m-b-lg">Возможности Системы Тестирования</h4>
  <div class="row">
    <div class="col-sm-4 m-y-md">
      <span class="text-muted">
        <i class="ion-ios-monitor-outline text-3x"></i>
      </span>
      <h6 class="_600 m-y">100% Гибкая</h6>
      <p class="text-muted">Система устроенна максимально просто, чтобы предоставить пользователям весь спектр возможностей по управлению своими проектами. </p>
    </div>
    <div class="col-sm-4 m-y-md">
      <span class="text-muted">
        <i class="ion-ios-paper-outline text-3x"></i>
      </span>
      <h6 class="_600 m-y">Многослойное тестирование</h6>
      <p class="text-muted">Мы обеспечивает проход в несколько шагов для тестирования сайта. От технической части - до визуальной обработки.</p>
    </div>
    <div class="col-sm-4 m-y-md">
      <span class="text-muted">
        <i class="ion-ios-pie-outline text-3x"></i>
      </span>
      <h6 class="_600 m-y">Удобное представление</h6>
      <p class="text-muted">Построение результатов тестирования происходит в удобном представлении с помощью графиков, таблиц и вывода данных. </p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 m-y-md">
      <span class="text-muted">
        <i class="ion-social-buffer text-3x"></i>
      </span>
      <h6 class="_600 m-y">Быстродействие</h6>
      <p class="text-muted">Инструменты по оптимизации страниц дают Вам право сосредоточиться на проектах, а не на медлительности самой системы.</p>
    </div>
    <div class="col-sm-4 m-y-md">
      <span class="text-muted">
        <i class="ion-android-people text-3x"></i>
      </span>
      <h6 class="_600 m-y">Иерархия команды</h6>
      <p class="text-muted">Полный доступ к функционалу распределения прав между участниками проекта, а также создание групп сопровождения и их обновление.</p>
    </div>
    <div class="col-sm-4 m-y-md">
      <span class="text-muted">
        <i class="ion-social-chrome-outline text-3x"></i>
      </span>
      <h6 class="_600 m-y">Кроссбраузерность</h6>
      <p class="text-muted">Поддержка адаптивного интерфейса позволяет следить за рядом своих проектов с различных устройств и браузеров.</p>
    </div>
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
    <div class="row p-y-lg p-b-0">
      <div class="col-md-5">
        <h6 class="text-sm text-u-c m-b text-muted">I'm</h6>
        <p>Modern, Clean &amp; Flat User Interface Kit, <br>Made with LOVE &amp; PASSION</p>
        <p class="m-t-md text-muted p-r-lg">
          <small class="text-muted">Вы находитесь на демострационной версии системы тестирования сайта... Возможны некоторые недочеты в обработке.</small>
        </p>
        <div class="text-muted m-y-lg">
          <h2 class="text-muted _600">
            <span class="text-muted">SeoPro</span>
          </h2>
        </div>
      </div>
      <div class="col-sm-2 col-xs-6">
        <h6 class="text-sm text-u-c m-b text-muted">Сообщество</h6>
        <div class="m-b-md">
          <ul class="nav l-h-2x">
            <li class="nav-item">
              <a class="nav-link" href="#">О системе</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Новости</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Раздел помощи</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Terms &amp; Policy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Cookies</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-2 col-xs-6">
        <h6 class="text-sm text-u-c m-b text-muted">Система</h6>
        <div class="m-b-md">
          <ul class="nav l-h-2x">
            <li class="nav-item">
              <a class="nav-link" href="/dashboard/">Главный Экран</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/project/">Проект</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/tickets/">Тикеты</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="app.contact.html">Контакты</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-sm-3 col-xs-6">
        <h6 class="text-sm text-u-c m-b text-muted">Присоединиться</h6>
        <div class="m-b-md">
          <ul class="nav l-h-2x">
            <li class="nav-item">
              <a class="nav-link" href="/account/login">Войти</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/account/register">Регистрация</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="p-y-lg p-b-0">
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
