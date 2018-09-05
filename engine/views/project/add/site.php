<div class="row-col">
  <div class="col-sm-9 col-lg-12 light bg">
    <div class="tab-content pos-rlt">
      <div class="tab-pane active" id="tab-1">
        <div class="p-a-md b-b _600">Добавление нового сайта</div>
        <form role="form" action="/project/add/site" method="post" class="p-a-md offset-md-1 col-md-10">
          <div class="row">
            <div class="form-group col-md-6">
              <label>Название</label>
              <input type="text" name="name" placeholder="Название сайта" class="form-control">
              <small class="text-muted">Может заполняться автоматически исходя из домена</small>
            </div>
            <div class="form-group col-md-6">
              <label>Адресс сайта</label>
              <input type="text" name="url" placeholder="Адрес сайта c http/https" class="form-control" required >
              <small class="text-muted">Пример: seopro.com</small>
            </div>
          </div>

          <button type="submit" name="edit_profile" class="btn btn-info m-t pull-right">Добавить</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
