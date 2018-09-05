<div class="padding">
  <div class="box">
    <div class="box-header">
      <h2>Сайты пользователей системы</h2>
    </div>
    <div class="table-responsive" id="profile-list">
      <table data-ui-jp="dataTable" data-ui-options="{
          sAjaxSource: '/engine/lib/ServerSide/sites.class.php',
          aServerSide: true,
          lengthChange: false,
          buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
          language: {
            'emptyTable': 'Нет данных по сайтам в базе',
            'info':           'Показано с _START_ по _END_ из _TOTAL_ сайтов',
            'infoEmpty':      'На данный момент в базе нет веб-ресурсов',
            'loadingRecords': 'Идет сбор данных о веб-ресурсах',
            'search':         '',
            'searchPlaceholder': 'Найти',
            'copyButton': 'Копировать',
            'buttons.copy': 'Копировать',
            'paginate': {
              'first':      'Первая',
              'last':       'Последняя',
              'next':       'Далее',
              'previous':   'Назад'
            },
            'buttons': {
              'copy': 'Копировать',
              'excel': 'В Excel',
              'pdf': 'В PDF',
              'print': 'Печать',
              'colvis': 'Видимость колонок'
            }
          },
          'initComplete': function () {
            this.api().buttons().container()
              .appendTo( '#profile-list .col-md-6:eq(0)' );
          }
        }" class="table table-striped b-t b-b">
        <thead>
        <tr>
          <th  style="width:25%">Название</th>
          <th  style="width:30%">Ссылка на сайт</th>
          <th  style="width:25%">Статус</th>
          <th  style="width:20%">Добавил</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>