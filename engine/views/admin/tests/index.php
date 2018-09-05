<div class="padding">
  <div class="box">
    <div class="box-header">
      <h2>Проекты пользователей системы</h2>
    </div>
    <div class="table-responsive" id="profile-list">
      <table data-ui-jp="dataTable" data-ui-options="{
          sAjaxSource: '/engine/lib/ServerSide/tests.class.php',
          aServerSide: true,
          lengthChange: false,
          buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
          language: {
            'emptyTable': 'Нет данных по тестам в базе',
            'info':           'Показано с _START_ по _END_ из _TOTAL_ тестов',
            'infoEmpty':      'На данный момент в базе нет тестов',
            'loadingRecords': 'Идет сбор данных о тестах',
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
          <th  style="width:20%">Тип тестирования</th>
          <th  style="width:15%">Проект</th>
          <th  style="width:20%">Дата проведения</th>
          <th  style="width:20%">Статус</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>