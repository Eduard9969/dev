<?php #debug($vars); ?>
<div class="row-col">
  <div class="col-sm-9 col-lg-12 light bg">
    <div class="tab-content pos-rlt">
      <div class="tab-pane active" id="tab-1">
        <div class="p-a-md b-b _600">Редактирования группы проекта <?= $vars['group'][0]['name']; ?></div>
        <form role="form" action="/project/edit/group/<?= $this->route['id']; ?>" method="post" class="p-a-md offset-md-1 col-md-10">
          <div class="row">
            <div class="form-group col-md-6">
              <label>Название группы</label>
              <input type="text" name="name" placeholder="Название группы" value="<?= $vars['group'][0]['name']; ?>" class="form-control">
              <small class="text-muted">Не более 25 символов</small>
            </div>
            <div class="form-group col-md-6">
              <label>Менеджер проекта</label>
              <input type="text" placeholder="Адрес сайта c http/https" readonly value="<?= $vars['manager'][0]['name'].' '.$vars['manager'][0]['surname']; ?>" class="form-control" required >
              <small class="text-muted">Только для ознакомления</small>
            </div>
            <div class="form-group col-md-12">
              <label for="multiple">Выберите участников проекта</label>
              <select id="multiple" name="members[]" class="form-control select2-multiple" multiple data-ui-jp="select2" data-ui-options="{theme: 'bootstrap'}">
                <optgroup label="Подтвержденные участники">
                  <?php foreach ($vars['users'] as $user): ?>
                    <?php if ($user['id'] == $vars['project'][0]['maker']){ continue; } ?>
                    <option value="<?= $user['id']; ?>" <?php if(in_array($user['id'], $vars['members'])) { echo "selected"; } ?>><?= $user['name'].' '.$user['surname']; ?></option>
                  <?php endforeach; ?>
                </optgroup>
              </select>
              <small class="text-muted text-xs">
                Проект создал: <?= $vars['maker'][0]['name'].' '.$vars['maker'][0]['surname']; ?>
              </small>
            </div>
          </div>

          <button type="submit" name="edit_profile" class="btn btn-info m-t pull-right">Обновить</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
