<div class="padding">
    <div class="navbar">
      <div class="pull-center">
        <!-- brand -->
        <a href="/" class="navbar-brand">
        	<div data-ui-include="'/templ/images/logo.svg'"></div>
        	<img src="/templ/images/logo.png" alt="." class="hide">
        	<span class="hidden-folded inline">SeoPro</span>
        </a>
        <!-- / brand -->
      </div>
    </div>
  </div>
  <div class="b-t">
    <div class="center-block w-xxl w-auto-xs p-y-md text-center">
      <div class="p-a-md">
        <!-- <div>
          <a href="#" class="btn btn-block indigo text-white m-b-sm">
            <i class="fa fa-facebook pull-left"></i>
            Sign in with Facebook
          </a>
          <a href="#" class="btn btn-block red text-white">
            <i class="fa fa-google-plus pull-left"></i>
            Sign in with Google+
          </a>
        </div>
        <div class="m-y text-sm">
          OR
        </div> -->
        <form name="form" action="/account/login" method="post" >
          <div class="form-group">
            <input type="text" name='name' class="form-control" placeholder="Email или Логин" required>
          </div>
          <div class="form-group">
            <input type="password" name='password' class="form-control" placeholder="Пароль" required>
          </div>
          <div class="m-b-md">
            <label class="md-check">
              <input type="checkbox"><i class="primary"></i> Запомнить меня
            </label>
          </div>
          <button type="submit" class="btn btn-lg black p-x-lg">Войти</button>
        </form>
        <div class="m-y">
          <a href="/account/forgot-password/" class="_600">Забыли пароль?</a>
        </div>
        <div>
          У Вас нет аккаунта?
          <a href="/account/register" class="text-primary _600">Зарегистрироваться</a>
        </div>
      </div>
    </div>
  </div>
