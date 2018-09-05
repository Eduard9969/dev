<div class="row-col">
  <div class="col-lg b-r">
    <div class="row no-gutter">
      <div class="col-xs-6 col-sm-3 b-r b-b">
        <div class="padding">
          <div>
            <span class="text-muted l-h-1x"><i class="ion-earth text-muted"></i></span>
          </div>
          <div class="text-center">
            <h2 class="text-center _600"><?= $count['sitesCount']; ?></h2>
            <p class="text-muted m-b-md">Сайтов</p>
            <div>
              <span data-ui-jp="sparkline" data-ui-options="[2,3,2,2,1,3,2,3,2,1], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-sm-3 b-r b-b">
        <div class="padding">
          <div>
            <span class="text-muted l-h-1x"><i class="ion-document text-muted"></i></span>
          </div>
          <div class="text-center">
            <h2 class="text-center _600"><?= $count['projectsCount']; ?></h2>
            <p class="text-muted m-b-md">Проектов</p>
            <div>
              <span data-ui-jp="sparkline" data-ui-options="[1,1,0,2,3,4,2,1,2,2], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-sm-3 b-r b-b">
        <div class="padding">
          <div>
            <span class="text-muted l-h-1x"><i class="ion-pie-graph text-muted"></i></span>
          </div>
          <div class="text-center">
            <h2 class="text-center _600"><?= $count['testsCount']; ?></h2>
            <p class="text-muted m-b-md">Тестов</p>
            <div>
              <span data-ui-jp="sparkline" data-ui-options="[9,2,5,5,7,4,4,3,2,2], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-sm-3 b-b">
        <div class="padding">
          <div>
            <span class="text-muted l-h-1x"><i class="ion-ios-people text-muted"></i></span>
          </div>
          <div class="text-center">
            <h2 class="text-center _600"><?= $count['usersCount']; ?></h2>
            <p class="text-muted m-b-md">Пользователей</p>
            <div>
              <span data-ui-jp="sparkline" data-ui-options="[3,3,1,62,4,3,7,3,2,5], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="padding">
      <div class="row">
        <div class="col-sm-12">
          <div class="box">
            <div class="box-header">
              <h3>Тестирование</h3>
              <small>Новые тесты за последние 30 дней</small>
            </div>

            <div>
              <canvas data-ui-jp="chart" data-ui-options="
				            {
				              type: 'line',
				              data: {
				                  labels: [''<?php foreach ($testsPerMonth as $value) { echo ", '".$value['date_init']."'"; }?>],
				                  datasets: [
				                      {
				                          label: 'Тестов',
				                          data: [0<?php foreach ($testsPerMonth as $value){ echo ", '".$value['count']."'"; } ?>],
				                          fill: true,
				                          backgroundColor: '#22b66e',
				                          borderColor: '#22b66e',
				                          borderWidth: 2,
				                          borderCapStyle: 'butt',
				                          borderDash: [],
				                          borderDashOffset: 0.0,
				                          borderJoinStyle: 'miter',
				                          pointBorderColor: '#22b66e',
				                          pointBackgroundColor: '#fff',
				                          pointBorderWidth: 2,
				                          pointHoverRadius: 4,
				                          pointHoverBackgroundColor: '#22b66e',
				                          pointHoverBorderColor: '#fff',
				                          pointHoverBorderWidth: 2,
				                          pointRadius: [0,4,4,4,4,4,0],
				                          pointHitRadius: 10,
				                          spanGaps: false
				                      }
				                  ]
				              },
				              options: {
				              	scales: {
				              		xAxes: [{
					                   display: false
					                }],
					                yAxes: [{
					                   display: false,
					                   ticks:{
					                   	 min: 0,
					                   	 max: 4
					               	   }
					                }]
				              	},
				              	legend: {
				              		display: false
				              	}
				              }
				            }
				            " height="150">
              </canvas>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="box">
            <div class="box-header">
              <span class="label success pull-right"><?= sizeof($usersLast); ?> последних</span>
              <h3>Новые пользователи</h3>
            </div>
            <div class="p-b-sm m-t-sm">
              <ul class="list no-border m-a-0">
                <?php foreach($usersLast as $user): ?>
                <li class="list-item">
                  <a href="/account/<?= $user['id']; ?>" class="list-left">
                    <?php
                      if(isset($user['color_select']) and !empty($user['color_select'])){
                        $color = $user['color_select'];
                      }
                      else{
                        $color = 'warn';
                      }
                    ?>
                    <span class="w-40 avatar <?= $color; ?> b-a">
                      <span><?= substr(strtoupper($user['username']), 0, 1); ?></span>
                    </span>
                  </a>
                  <div class="list-body">
                    <div><a href="/account/<?= $user['id']; ?>"><?= $user['name'].' '.$user['surname']; ?></a></div>
                    <small class="text-muted text-ellipsis">
                      <?php
                        if(isset($user['specialty_name']) and !empty($user['specialty_name'])){
                          echo $user['specialty_name'];
                        }
                        else{
                          echo 'Неопределенное божество';
                        }
                      ?>
                    </small>
                  </div>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="box">
            <div class="box-header">
              <h3>Сегмент специалистов</h3>
              <small>Соотношение специалистов в системе</small>
            </div>
            <div class="box-body">
              <div data-ui-jp="plot" data-ui-options="[
              <?php foreach ($specialtyPart as $value): ?>
                {data: <?= $value['count']; ?>, label: '<?= $value['name']; ?>'},
              <?php endforeach; ?>],
              {
                series: { pie: { show: true, innerRadius: 0.7, stroke: { width: 0 }, label: { show: false, threshold: 0.05 } } },
                legend: {backgroundColor: 'transparent'},
                colors: ['#009688','#8bc34a', '#e91e63', '#9c27b0', '#3f51b5', '#2196f3', '#cddc39', '#ffeb3b', '#ffc107', '#ff5722'],
                grid: { hoverable: true, clickable: true, borderWidth: 0, color: '#a0a0a0' },
                tooltip: true,
                tooltipOpts: { content: '%s: %p.0%' }
              }
            " style="height:200px"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg w-lg w-auto-md white bg">
    <div>
      <div class="p-a">
        <h6 class="text-muted m-a-0">План разработки</h6>
      </div>
      <div class="streamline streamline-theme m-b">
        <div class="sl-item b-success">
          <div class="sl-content">
            <div>Начало разработки <a href="#" class="text-info">#seopro</a>.</div>
            <div class="sl-date text-muted">Апрель</div>
          </div>
        </div>
        <div class="sl-item b-success">
          <div class="sl-content">
            <div>Разработка <a href="/account/" class="text-info">Личного кабинета</a>.</div>
            <div class="sl-date text-muted">Апрель</div>
          </div>
        </div>
        <div class="sl-item b-success">
          <div class="sl-content">
            <div>Разработка <a href="/project/" class="text-info">общей страницы проектов</a>.</div>
            <div class="sl-date text-muted">Апрель</div>
          </div>
        </div>
        <div class="sl-item b-success">
          <div class="sl-content">
            <div>Разработка функционала сайтов.</div>
            <div class="sl-date text-muted">Апрель</div>
          </div>
        </div>
        <div class="sl-item b-success">
          <div class="sl-content">
            <div>Разработка функционала проектов, системы делегирования прав, страницы проекта.</div>
            <div class="sl-date text-muted">Май</div>
          </div>
        </div>
        <div class="sl-item b-success">
          <div class="sl-content">
            <div>Разработка функционала тестов на основе <a href="http://gtmetrix.com/" rel="nofollow" class="text-info">GT Metrix</a>.</div>
            <div class="sl-date text-muted">Май</div>
          </div>
        </div>
        <div class="sl-item b-success">
          <div class="sl-content">
            <div>Разработка рекомендационной системы, страницы информации о тесте.</div>
            <div class="sl-date text-muted">Май</div>
          </div>
        </div>
        <div class="sl-item b-success active">
          <div class="sl-content">
            <div><a href="/account/1" class="text-info">Эдуард</a> проводит демонстрацию.</div>
            <div class="sl-date text-muted">Июнь</div>
          </div>
        </div>
        <div class="sl-item b-info">
          <div class="sl-content">
            <div>Администратор <a href="/account/1" class="text-info">Эдуард</a> ожидает отличной оценки диплома Кати.</div>
            <div class="sl-date text-muted">Июнь, 19</div>
          </div>
        </div>
        <div class="sl-item">
          <div class="sl-content">
            <div>Разработка системы тикетов, обратной связи.</div>
            <div class="sl-date text-muted">Июль</div>
          </div>
        </div>
        <div class="sl-item">
          <div class="sl-content">
            <div>Доработка системы уведомлений, личного кабинета.</div>
            <div class="sl-date text-muted">Июль</div>
          </div>
        </div>
        <div class="sl-item">
          <div class="sl-content">
            <div>Разработка модуля статических страниц, раздела Wiki.</div>
            <div class="sl-date text-muted">Август</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>