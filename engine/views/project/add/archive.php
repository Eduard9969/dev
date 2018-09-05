<div class="row-col">
  <div class="col-sm-9 col-lg-12 light bg">
    <div class="tab-content pos-rlt">
      <div class="tab-pane active" id="tab-1">
        <div class="p-a-md b-b _600">Добавление нового проекта</div>

        <div class="p-a-md col-md-12">
          <div class="box">
            <div class="box-header amber-600">
              <h3>Добавления <?= $this->route['type'] == "site" ? "сайта" : "проекта"; ?> в архив</h3>
            </div>
            <div class="box-body">
              <p class="m-a-0">
                После добавления <?= $this->route['type'] == "site" ? "сайта" : "проекта"; ?> он перемещается в раздел "Архив" и становится недоступным для дальнейшего тестирования. <?= $this->route['type'] == "project" ? "После добавления проекта в архив все проведенные тесты удаляются со всеми данными." : "После добавления сайта все проекты сайта перемащаются в архив, все проведенные тесты удаляются со всеми данными."; ?> <br> Проект не может быть восстановлен из архива, в отличии от сайта. <?= $this->route['type'] == "site" ? "Сайт" : "Проект"; ?> хранится в архиве 60 дней, затем бесследно удаляются из системы.
              </p>
            </div>
          </div>

          <button type="submit" data-content="submit" class="btn btn-warning m-t-xs pull-right" onclick="SendData($(this).attr('data-content'));">Подтвердить</button>
          <button type="submit" data-content="cancel" class="btn lt m-t-xs pull-right m-r" onclick="SendData($(this).attr('data-content'));">Отменить</button>
        </div>

        <script>
          function SendData(data) {
            if(data == "cancel") { window.location.href = '/project/'; }
            $.ajax({
              url: "/project/archive/<?= $this->route['type'].'/'.$this->route['id']; ?>",
              type: "post",
              data: {temp: data}
            }).done(function () {window.location.href = '/project/archive/';});
          }
        </script>
      </div>
      </div>
    </div>
  </div>
</div>
