<div class="row-col">
  <div class="col-sm-3 col-lg-2 b-r">
    <div class="p-y">
      <div class="nav-active-border left b-primary">
        <ul class="nav nav-sm">
          <li class="nav-item">
            <a class="nav-link block active" href="#" data-toggle="tab" data-target="#tab-1">Профиль</a>
          </li>
          <li class="nav-item">
            <a class="nav-link block" href="#" data-toggle="tab" data-target="#tab-2">Социальные ссылки</a>
          </li>
          <li class="nav-item">
            <a class="nav-link block" href="#" data-toggle="tab" data-target="#tab-3">Email и Телефон</a>
          </li>
          <li class="nav-item">
            <a class="nav-link block" href="#" data-toggle="tab" data-target="#tab-4">Уведомление</a>
          </li>
          <li class="nav-item">
            <a class="nav-link block" href="#" data-toggle="tab" data-target="#tab-5">Безопасность</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-sm-9 col-lg-10 light bg">
    <div class="tab-content pos-rlt">
      <div class="tab-pane active" id="tab-1">
        <div class="p-a-md b-b _600">Информация о профиле | <?= $vars[0]['username']; ?></div>
        <form role="form" action="/account/edit" method="post" class="p-a-md col-md-6">
          <div class="form-group">
            <label>Имя</label>
            <input type="text" name="name" placeholder="Ваше имя *" value="<?= $vars[0]['name']; ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Фамилия</label>
            <input type="text" name="surname" placeholder="Ваша фамилия *" value="<?= $vars[0]['surname']; ?>" class="form-control" required>
          </div>
          <?php if(!empty($vars[0]['specialty'])): ?>
          <div class="form-group">
            <label>Специальность</label>
            <input type="text" name="specialty" readonly value="<?= $vars[2]['name']; ?>" class="form-control">
            <small class="text-muted">Информация Только для просмотра</small>
          </div>
          <?php endif; ?>
          <div class="form-group">
            <label>Пару слов о себе</label>
            <textarea name="about_text" class="form-control" rows='5' placeholder="Пару слов о себе"><?= $vars[0]['about_text']; ?></textarea>
          </div>

          <button type="submit" name="edit_profile" class="btn btn-info m-t">Обновить</button>
        </form>
      </div>
      <div class="tab-pane" id="tab-2">
        <div class="p-a-md b-b _600">Социальные ссылки</div>
        <form role="form" action="/account/edit" method="post" class="p-a-md col-md-6">
          <div class="form-group">
            <label>Facebook</label>
            <div class="input-group m-b">
              <span class="input-group-addon">www.facebook.com/</span>
              <input type="text" name="social_face" value="<?php if(!empty($vars[3]['facebook'])){ echo $vars[3]['facebook']; } ?>" class="form-control" placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <label>Twitter</label>
            <div class="input-group m-b">
              <span class="input-group-addon">twitter.com/</span>
              <input type="text" name="social_twi" value="<?php if(!empty($vars[3]['twitter'])){ echo $vars[3]['twitter']; } ?>" class="form-control" placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <label>Google+</label>
            <div class="input-group m-b">
              <span class="input-group-addon">plus.google.com/</span>
              <input type="text" name="social_goo" value="<?php if(!empty($vars[3]['google'])){ echo $vars[3]['google']; } ?>" class="form-control" placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <label>LinkedIn</label>
            <div class="input-group m-b">
              <span class="input-group-addon">www.linkedin.com/in/</span>
              <input type="text" name="social_link" value="<?php if(!empty($vars[3]['linkedin'])){ echo $vars[3]['linkedin']; } ?>" class="form-control" placeholder="Username">
            </div>
          </div>
          <button type="submit" name="edit_social" class="btn btn-info m-t">Сохранить</button>
        </form>
      </div>
      <div class="tab-pane" id="tab-3">
        <div class="p-a-md b-b _600">Email и Телефон</div>
        <form role="form" action="/account/edit" method="post" class="p-a-md col-md-6">
          <div class="form-group">
            <label>Ваш Email
              <?php
                if($vars[1]['access'] == 1) {
                  $access_ico = 'fa-check';
                  $access_color = 'success';
                  $access_text = 'Подтвержден';
                }
                else {
                  $access_ico = 'fa-close';
                  $access_color = 'warning';
                  $access_text = 'Не подтвержден';
                }
              ?>
              <small class="text-<?= $access_color; ?>">
                <i class="fa <?= $access_ico; ?> m-r-xs"></i><?= $access_text; ?>
              </small>
            </label>
            <input type="email" readonly value="<?= $vars[0]['email']; ?>" class="form-control">
            <small class="text-muted">Информация Только для просмотра</small>
          </div>
          <div class="form-group">
            <label>Ваш номер телефона</label>
            <input type="tel" name="phone" placeholder="Ваш номер телефона" value="<?= $vars[0]['phone']; ?>" class="form-control" required>
          </div>

          <button type="submit" name="edit_contact" class="btn btn-info m-t">Сохранить</button>
        </form>
      </div>
      <div class="tab-pane" id="tab-4">
        <div class="p-a-md b-b _600">Notifications</div>
        <form role="form" class="p-a-md col-md-6">
          <p>Notice me whenever</p>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone seeing my profile page
            </label>
          </div>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone follow me
            </label>
          </div>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone send me a message
            </label>
          </div>
          <div class="checkbox">
            <label class="ui-check">
              <input type="checkbox"><i class="dark-white"></i> Anyone invite me to group
            </label>
          </div>
          <button type="submit" class="btn btn-info m-t">Update</button>
        </form>
      </div>
      <div class="tab-pane" id="tab-5">
        <div class="p-a-md b-b _600">Безопасность</div>
        <div class="p-a-md">
          <div class="clearfix m-b-lg">
            <form role="form" action="/account/edit" method="post" class="col-md-6 p-a-0">
              <div class="form-group">
                <label>Текущий пароль *</label>
                <input type="password" name="pass" class="form-control">
              </div>
              <div class="form-group">
                <label>Новый пароль *</label>
                <input type="password" name="new_pass" class="form-control">
              </div>
              <div class="form-group">
                <label>Новый пароль снова *</label>
                <input type="password" name="new_pass_too" class="form-control">
              </div>
              <button type="submit" name="edit_password" class="btn btn-info m-t">Обновить</button>
            </form>
          </div>

          <p><strong>Хотите удалить аккаунт?</strong></p>
          <button type="submit" class="btn btn-danger m-t" data-toggle="modal" data-target="#modal">Удалить аккаунт</button>

        </div>
      </div>
    </div>
  </div>
</div>


<!-- .modal -->
<div id="modal" class="modal fade animate black-overlay" data-backdrop="false">
  <div class="row-col h-v">
    <div class="row-cell v-m">
      <div class="modal-dialog modal-sm">
        <div class="modal-content flip-y">
          <div class="modal-body text-center">
            <p class="p-y m-t"><i class="fa fa-remove text-warning fa-3x"></i></p>
            <p>Ничего не получится. К сожалению, данный функционал не завезли</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger p-x-md" data-dismiss="modal">Эх</button>
          </div>
        </div><!-- /.modal-content -->
      </div>
    </div>
  </div>
</div>
<!-- / .modal -->
