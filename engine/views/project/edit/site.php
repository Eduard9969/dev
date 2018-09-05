<div class="row-col">
  <div class="col-sm-9 col-lg-12 light bg">
    <div class="tab-content pos-rlt">
      <div class="tab-pane active" id="tab-1">
        <div class="p-a-md b-b _600">Редактирования сайта <?= $vars[0]['name']; ?></div>
        <form role="form" action="/project/edit/site/<?= $this->route['id']; ?>" method="post" class="p-a-md offset-md-1 col-md-10">
          <div class="row">
            <div class="form-group col-md-6">
              <label>Название</label>
              <input type="text" name="name" placeholder="Название сайта" value="<?= $vars[0]['name']; ?>" class="form-control">
              <small class="text-muted">Не более 50 символов</small>
            </div>
            <div class="form-group col-md-6">
              <label>Адресс сайта</label>
              <input type="text" placeholder="Адрес сайта c http/https" readonly value="<?= $vars[0]['url']; ?>" class="form-control" required >
              <small class="text-muted">Изменить url невозможно</small>
            </div>
          </div>

          <button type="submit" name="edit_profile" class="btn btn-info m-t pull-right">Обновить</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
