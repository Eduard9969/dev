<div class="padding">
  <div class="box">
    <div class="box-header">
      <h2>Пользователи системы</h2>
    </div>
    <div class="table-responsive" id="profile-list">
      <table data-ui-jp="dataTable" data-ui-options="{
          sAjaxSource: '/engine/lib/ServerSide/profile.class.php',
          aServerSide: true,
          lengthChange: false,
          buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
          language: {
            'emptyTable': 'Нет данных в базе',
            'info':           'Показано с _START_ по _END_ из _TOTAL_ пользователей',
            'infoEmpty':      'На данный момент в базе нет пользователей',
            'loadingRecords': 'Идет сбор данных пользователей',
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
          <th  style="width:20%">Имя</th>
          <th  style="width:20%">Фамилия</th>
          <th  style="width:20%">Номер телефона</th>
          <th  style="width:10%">Логин</th>
          <th  style="width:15%">Email</th>
          <th  style="width:15%">Специальность</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>