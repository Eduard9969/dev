<div class="row-col">
  <div class="col-sm-9 col-lg-12 light bg">
    <div class="tab-content pos-rlt">
      <div class="tab-pane active" id="tab-1">
        <div class="p-a-md b-b _600">Создание тестирования сайта</div>
        <form role="form" action="/project/add/test" method="post" class="p-a-md offset-md-1 col-md-10">
          <div class="row">
            <div class="form-group col-md-6">
              <label>Именование теста</label>
              <input type="text" name="name" placeholder="Название теста" class="form-control">
              <small class="text-muted">Может заполняться автоматически, не более 30 символов</small>
            </div>
            <div class="form-group col-md-6 select2-bootstrap-append">
              <label>Проект</label>
              <select id="single-append-text" name="project" class="form-control select2-allow-clear form-control" data-ui-jp="select2" data-ui-options="{theme: 'bootstrap'}">
                <optgroup label="Подтвержденные проекты">
                  <?php foreach ($vars['projects'] as $project): ?>
                  <option value="<?= $project[0]['id']; ?>"><?= $project[0]['name']; ?></option>
                  <?php endforeach; ?>
                </optgroup>
              </select>
              <small class="text-muted">Нельзя изменить при редактировании проекта</small>
            </div>
            <div class="form-group col-md-12">
              <label>Тип Тестирования проекта</label>
              <select name="type_test" class="form-control">
                <option value="1">Автоматическое тестирование</option>
              </select>
            </div>
          </div>

          <button type="submit" class="btn btn-info m-t pull-right">Добавить</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
