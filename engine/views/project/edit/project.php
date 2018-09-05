<div class="row-col">
  <div class="col-sm-9 col-lg-12 light bg">
    <div class="tab-content pos-rlt">
      <div class="tab-pane active" id="tab-1">
        <div class="p-a-md b-b _600">
          Редактирования проекта <?= $vars['project'][0]['name'];  ?>
          <?php if ($vars['project'][0]['status'] != 1): ?>
            <span class="label warning pos-rlt m-l-sm">
              <b class="arrow left b-warning pull-in"></b>Ожидает модерации
            </span>
          <?php endif; ?>
        </div>
        <form role="form" action="/project/edit/project/<?= $this->route['id']; ?>" method="post" class="p-a-md offset-md-1 col-md-10">
          <div class="row">
            <div class="form-group col-md-6">
              <label>Название проекта</label>
              <input type="text" name="name" placeholder="Название проекта" value="<?= $vars['project'][0]['name'];  ?>" class="form-control">
              <small class="text-muted">Может заполняться автоматически</small>
            </div>
            <div class="form-group col-md-6 select2-bootstrap-append">
              <label>Сайт проекта</label>
              <input type="text" readonly placeholder="Сайт проекта" value="<?= $vars['site'][0]['name'];  ?>" class="form-control">
              <small class="text-muted">Нельзя изменить при редактировании проекта</small>
            </div>
            <div class="form-group col-md-6">
              <label>Менеджер проекта</label>
              <input type="text" name='manager' readonly placeholder="Сайт проекта" value="<?= $vars['manager'][0]['name'].' '.$vars['manager'][0]['surname'];  ?>" class="form-control">
            </div>
            <div class="form-group col-md-6">
              <label>Проект открыл:</label>
              <input type="text" hidden name="user" value="<?= $vars['project']['maker']; ?>">
              <input type="text" readonly placeholder="Участник проекта" value="<?= $vars['user'][0]['name'].' '.$vars['user'][0]['surname'];  ?>" class="form-control">
            </div>
          </div>
          <?php if (($vars['project'][0]['status'] != 1) and ($_SESSION['authorize']['id'] == $vars['project'][0]['manager_id'] )): ?>
            <div class="row">
              <div class="col-md-12">
                <label class="md-check">
                  <input type="checkbox" name="status" value="true" class="has-value">
                  <i class="green"></i>
                  Данные проекта заполнены верно. Я Подтверждаю проект
                </label>
              </div>
            </div>
            <button type="submit" name="edit_profile" class="btn btn-info m-t pull-right">Подтвердить</button>
          <?php else: ?>
            <button type="submit" name="edit_profile" class="btn btn-info m-t pull-right">Обновить</button>
          <?php endif; ?>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
