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
      <form name="form" action="/account/register" method="post">
        <div class="form-group">
          <input type="text" name="name" class="form-control" placeholder="Логин *" required>
        </div>
        <div class="form-group">
          <input type="email" name='email' class="form-control" placeholder="Email *" required>
        </div>
        <div class="form-group">
          <input type="password" name='password' class="form-control" placeholder="Пароль *" required>
        </div>
        <div class="m-b-md text-sm">
          <span class="text-muted">Нажимая «Зарегистрироваться», я соглашаюсь с</span>
          <a href="#">Условиями пользования</a>
          <span class="text-muted">и</span>
          <a href="#">Политикой конфиденциальности.</a>
        </div>
        <button type="submit" class="btn btn-lg black p-x-lg">Зарегистрироваться</button>
      </form>
      <div class="p-y-lg text-center">
        <div>У Вас уже есть аккаунт? <a href="/account/login" class="text-primary _600">Войти</a></div>
      </div>
    </div>
  </div>
</div>
