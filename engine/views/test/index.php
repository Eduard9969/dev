<div class="row-col">
	<div class="col-lg b-r">
		<div class="row no-gutter">
			<div class="col-xs-6 col-sm-3 b-r b-b">
				<div class="padding">
					<div>
						<?php
							if($vars['test_result']['page_load_time'] < 5000) {
								$status_class = "text-success";
							}
							elseif ($vars['test_result']['page_load_time'] > 5000 and $vars['test_result']['page_load_time'] < 10000) {
								$status_class = "text-warning";
							}
							elseif ($vars['test_result']['page_load_time'] > 10000) {
								$status_class = "text-danger";
							}
						?>
						<span class="pull-right"><i class="fa fa-circle-o <?= $status_class; ?> m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-ios-grid-view text-muted"></i></span>
					</div>
					<div class="text-center">
						<h2 class="text-center _600"><?= number_format($vars['test_result']['page_load_time']/1000, 1, ',', ' '); ?> <small class="text-md">СЕК</small></h2>
						<p class="text-muted m-b-md">Загрузка</p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[2,3,2,2,1,3,6,3,2,1], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
	        </div>
	        <div class="col-xs-6 col-sm-3 b-r b-b">
				<div class="padding">
					<div>
						<?php
							if($vars['test_result']['fully_loaded_time'] < 5000) {
								$status_class = "text-success";
							}
							elseif ($vars['test_result']['fully_loaded_time'] > 5000 and $vars['test_result']['fully_loaded_time'] < 10000) {
								$status_class = "text-warning";
							}
							elseif ($vars['test_result']['fully_loaded_time'] > 10000) {
								$status_class = "text-danger";
							}
						?>
						<span class="pull-right"><i class="fa fa-circle-o <?= $status_class; ?> m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-document text-muted"></i></span>
					</div>
					<div class="text-center">
						<h2 class="text-center _600"><?= number_format($vars['test_result']['fully_loaded_time']/1000, 1, ',', ' '); ?> <small class="text-md">СЕК</small></h2>
						<p class="text-muted m-b-md">Полная загрузка</p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[1,1,0,2,3,4,2,1,2,2], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
	        </div>
	        <div class="col-xs-6 col-sm-3 b-r b-b">
				<div class="padding">
					<div>
						<span class="pull-right"><i class="fa fa-circle-o m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-pie-graph text-muted"></i></span>
					</div>
					<div class="text-center">
						<h2 class="text-center _600"><?= number_format($vars['test_result']['page_bytes']/1048576, 2, ',', ' '); ?> <small class="text-md">МБ</small></h2>
						<p class="text-muted m-b-md">Размер страницы</p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[9,2,5,5,7,4,4,3,2,2], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
	        </div>
	        <div class="col-xs-6 col-sm-3 b-b">
				<div class="padding">
					<div>
						<?php
							if($vars['test_result']['page_elements'] < 20) {
								$status_class = "text-success";
							}
							elseif ($vars['test_result']['page_elements'] >20 and $vars['test_result']['page_elements'] < 50) {
								$status_class = "text-warning";
							}
							elseif ($vars['test_result']['page_elements'] > 50) {
								$status_class = "text-danger";
							}
						?>
						<span class="pull-right"><i class="fa fa-circle-o <?= $status_class; ?> m-y-xs"></i></span>
						<span class="text-muted l-h-1x"><i class="ion-paper-airplane text-muted"></i></span>
					</div>
					<div class="text-center">
						<h2 class="text-center _600">~ <?= $vars['test_result']['page_elements']; ?></h2>
						<p class="text-muted m-b-md">Запросов</p>
						<div>
							<span data-ui-jp="sparkline" data-ui-options="[3,3,1,62,4,3,7,3,2,5], {type:'line', height:20, width: '60', lineWidth:1, valueSpots:{'0:':'#818a91'}, lineColor:'#818a91', spotColor:'#818a91', fillColor:'', highlightLineColor:'rgba(120,130,140,0.3)', spotRadius:0}" class="sparkline inline"></span>
						</div>
					</div>
				</div>
	        </div>
        </div>
		<div class="padding">
			<div class="box">
				<div class="box-header b-b">
					<h3>Подробная информация</h3>
				</div>
				<div class="box-tool">
				</div>
				<div>
					<div class="row-col">
						<div class="col-sm-4 b-r light lt">
							<div class="text-center m-t">
								<span class="text text-muted">Сформированные отчеты</span>
							</div>
							<div class="p-a-md">
			          <a href="/templ/materials/test_report/<?= $vars['path_name']; ?>/report_pdf.pdf" class="btn btn-block success text-white m-b-sm">
			            <i class="fa fa-file-pdf-o pull-left"></i>
			            Скачать в PDF
			          </a>
								<div class="m-y text-sm text-center">или</div>
			          <a href="/templ/materials/test_report/<?= $vars['path_name']; ?>/report_pdf_full.pdf" class="btn btn-block info text-white">
			            <i class="fa fa-file-pdf-o pull-left"></i>
			            Скачать в PDF FULL
			          </a>
								<small class='text-muted text-center block m-t-xs'>Расширенный вариант отчета</small>
			        </div>
							<div class="p-a-md">
									<p class="text-muted m- text-sm">Данные представлены при помощи открытого API <a class="text-info" href='https://gtmetrix.com/'>GTMetrix.com</a></p>
									<p class="text-muted m-t-0 text-sm">Все данные, относительно проектов и информации о тестировании, хранятся в единственном экземпляре на серверах системы, данные на GTMetrix удаляются после подтверждения ответа.</p>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="row">
								<div class="col-xs-6 col-sm-6 b-r b-b">
									<div class="padding">
										<div>
											<span class="pull-right"><i class="fa fa-caret-up m-y-xs"></i></span>
											<span class="text-muted l-h-1x"><i class="fa fa-bar-chart text-muted"></i></span>
										</div>
										<div class="text-center">
											<h2 class="text-center _600"><?= $vars['test_result']['pagespeed_score']; ?> <small class="text-md">%</small></h2>
											<p class="text-muted m-b-xs">PageSpeed Рейтинг</p>
											<a class="text-info text-xs" target="_blank" href="https://developers.google.com/speed/pagespeed/insights/?url=<?= $vars['site'][0]['url']; ?>">Смотреть на PageSpeed</a>
										</div>
									</div>
						        </div>
					        <div class="col-xs-6 col-sm-6 b-b">
										<div class="padding">
											<div>
												<?php
													if($vars['test_result']['yslow_score'] < 60) {
														$status_class = "fa-caret-down text-danger";
													}
													elseif ($vars['test_result']['yslow_score'] > 60 and $vars['test_result']['yslow_score'] < 90) {
														$status_class = "fa-caret-up text-warning";
													}
													elseif ($vars['test_result']['yslow_score'] > 90) {
														$status_class = "fa-caret-up text-success";
													}
												?>
												<span class="pull-right"><i class="fa <?= $status_class; ?> m-y-xs"></i></span>
												<span class="text-muted l-h-1x"><i class="fa fa-bar-chart text-muted"></i></span>
											</div>
											<div class="text-center">
												<h2 class="text-center _600"><?= $vars['test_result']['yslow_score']; ?> <small class="text-md">%</small></h2>
												<p class="text-muted m-b-xs">YSlow Рейтинг</p>
												<a class="text-info text-xs" href="">Смотреть на YSlow</a>
											</div>
										</div>
					        </div>
								</div>
								<div class="row padding">
									<table class="table">
					          <tbody>
					            <tr>
					              <td>Начальная отрисовка:</td>
					              <td><?= number_format($vars['test_result']['first_contentful_paint_time']/1000, 1, ',', ' '); ?> <small>сек</small></td>
												<td>Время загрузки DOM:</td>
					              <td><?= number_format($vars['test_result']['dom_content_loaded_time']/1000, 1, ',', ' '); ?> <small>сек</small></td>
					            </tr>
					            <tr>
					              <td>Время загрузки:</td>
					              <td><?= number_format($vars['test_result']['page_load_time']/1000, 1, ',', ' '); ?> <small>сек</small></td>
												<td>Время полной загрузки:</td>
					              <td><?= number_format($vars['test_result']['fully_loaded_time']/1000, 1, ',', ' '); ?> <small>сек</small></td>
					            </tr>
					            <tr>
					              <td>Время ответа сервера:</td>
					              <td><?= number_format($vars['test_result']['backend_duration']/1000, 1, ',', ' '); ?> <small>сек</small></td>
												<td>Время соединения:</td>
					              <td><?= number_format($vars['test_result']['connect_duration']/1000, 1, ',', ' '); ?> <small>сек</small></td>
					            </tr>
					            <tr>
					              <td>Статус 301:</td>
					              <td>
													<?php if ($vars['test_result']['page_elements'] != 1): ?>
					              		-
													<?php else: ?>
														+
					              	<?php endif; ?>
												</td>
												<td>Количество запросов:</td>
					              <td><?= $vars['test_result']['page_elements']; ?></td>
					            </tr>
					            <tr>
					              <td>Размер страницы:</td>
					              <td><?= number_format($vars['test_result']['page_bytes']/1024); ?> <small>КБ</small></td>
					              <td>Размер ответа:</td>
					              <td><?= number_format($vars['test_result']['html_bytes']/1024); ?> <small>КБ</small></td>
					            </tr>
					          </tbody>
					        </table>
									<div class="col-md-6">
										<p class="m-b-0"> <span></p>
										<p> </p>
									</div>
									<div class="col-md-6"></div>
								</div>
						</div>
					</div>
				</div>
			</div>
	        <div class="box">
	        	<div class="box-header b-b">
	        		<h3>Тайминг загрузки страницы</h3>
	        	</div>
	        	<div>
	        		<div class="row-col">
	        			<div class="col-sm-12 b-r light lt">
	        				<div class="p-a-md">
												<?php
													$prc = number_format(($vars['test_result']['connect_duration']/$vars['test_result']['onload_time']*100), 1, '.', '');
												?>
				                <span class="pull-right"><?= number_format($vars['test_result']['connect_duration']/1000, 2, '.', ''); ?> сек</span>
				                <small>Время соединения</small>
					            <div class="progress progress-xs m-t-sm white bg">
					              <div class="progress-bar lime" data-toggle="tooltip" data-original-title="<?= $prc; ?>%" style="width: <?= $prc; ?>%"></div>
					            </div>

											<?php
												$prc = number_format(($vars['test_result']['backend_duration']/$vars['test_result']['onload_time']*100), 1, '.', '');
											?>
					            <span class="pull-right"><?= number_format($vars['test_result']['backend_duration']/1000, 2, '.', ''); ?> сек</span>
					            <small>Время ответа сервера</small>
					            <div class="progress progress-xs m-t-sm white bg">
					              <div class="progress-bar light-green" data-toggle="tooltip" data-original-title="<?= $prc; ?>%" style="width: <?= $prc; ?>%"></div>
					            </div>

											<?php
												$prc = number_format(($vars['test_result']['html_load_time']/$vars['test_result']['onload_time']*100), 1, '.', '');
											?>
					            <span class="pull-right"><?= number_format($vars['test_result']['html_load_time']/1000, 2, '.', ''); ?> сек</span>
					            <small>Первая загрузка</small>
					            <div class="progress progress-xs m-t-sm white bg">
					              <div class="progress-bar green" data-toggle="tooltip" data-original-title="<?= $prc; ?>%" style="width: <?= $prc; ?>%"></div>
					            </div>

											<?php
												$prc = number_format(($vars['test_result']['first_paint_time']/$vars['test_result']['onload_time']*100), 1, '.', '');
											?>
					            <span class="pull-right"><?= number_format($vars['test_result']['first_paint_time']/1000, 2, '.', ''); ?> сек</span>
					            <small>Начальная отрисовка</small>
					            <div class="progress progress-xs m-t-sm white bg">
					              <div class="progress-bar teal" data-toggle="tooltip" data-original-title="<?= $prc; ?>%" style="width: <?= $prc; ?>%"></div>
					            </div>

											<?php
												$prc = number_format(($vars['test_result']['dom_interactive_time']/$vars['test_result']['onload_time']*100), 1, '.', '');
											?>
					            <span class="pull-right"><?= number_format($vars['test_result']['dom_interactive_time']/1000, 2, '.', ''); ?> сек</span>
					            <small>Создание DOM</small>
					            <div class="progress progress-xs m-t-sm white bg">
					              <div class="progress-bar cyan" data-toggle="tooltip" data-original-title="<?= $prc; ?>%" style="width: <?= $prc; ?>%"></div>
					            </div>

											<?php
												$prc = number_format(($vars['test_result']['onload_time']/$vars['test_result']['onload_time']*100), 1, '.', '');
											?>
					            <span class="pull-right"><?= number_format($vars['test_result']['onload_time']/1000, 2, '.', ''); ?> сек</span>
					            <small>Страница загружена</small>
					            <div class="progress progress-xs m-t-sm white bg">
					              <div class="progress-bar blue" data-toggle="tooltip" data-original-title="<?= $prc; ?>%" style="width: <?= $prc; ?>%"></div>
					            </div>


					            <p class="text-muted m-t-md text-sm">Страница загружена, когда обработка страницы завершена, и все ресурсы на странице (изображения, CSS и т. д.) завершили загрузку. Равносильно событию JavaScript window.onload.</p>
					        </div>
	        			</div>
	        		</div>
	        	</div>
	        </div>
			<div class="row">
		    <div class="col-sm-12">
		    	<div class="row-col b-a white m-b-md">
				    <div class="col-md-8">
				      <div class="box-header b-b"><h3>Карта мира</h3></div>
				      <div class="box-body">
				        <p class="m-b-lg text-muted">Визуальное отображение клиентов тестирования на карте стран</p>
				        <div class="m-b-md" style="height:240px;" data-ui-jp="vectorMap" data-ui-options="{
				          map: 'world_mill_en',
				          markers: [<?php foreach ($vars['test_locations'] as $location): ?>{latLng: [<?= $location['geometry']['lat'].', '.$location['geometry']['lng']; ?>], name: '<?= $location['name']; ?>'},<?php endforeach; ?>],
				          normalizeFunction: 'polynomial',
				          backgroundColor: 'transparent',
				          regionsSelectable: true,
				          markersSelectable: true,
				          regionStyle: {
				            initial: {
				              fill: 'rgba(120,130,140,0.3)'
				            },
				            hover: {
				              fill: 'rgba(120,130,140,0.3)',
				              stroke: '#fff'
				            },
				          },
				          markerStyle: {
				            initial: {
				              fill: '#f3c111',
				              stroke: '#fff'
				            },
				            hover: {
				              fill: 'rgba(120,130,140,0.3)',
				              stroke: '#fff'
				            }
				          },
				          series: {
				            markers: [{
				              attribute: 'fill',
				              scale: ['#9c27b0', '#f3c111', '#ffeb3b', '#4caf50', '#009688', '#22b66e', '#e91e63'],
				              <!-- values: [ 700, 600, 500, 400, 300, 200, 100 ] -->
				            }]
				          }
				        }" >
				        </div>
				      </div>
				    </div>
				    <div class="col-md-4 b-l no-border-sm">
				      <div class="box-header b-b"><h3>Информация</h3></div>
				      <div class="list-group no-border no-radius">
								<?php $select_color = ['red', 'orange', 'yellow', 'green', 'teal', 'pink', 'purple', 'indigo', 'blue', 'light-green' ]; $p=0; ?>
								<?php foreach ($vars['test_locations'] as $location): ?>
									<div class="list-group-item">
					          <span class="pull-right text-muted">Firefox/Chrome</span>
					          <i class="label label-xs <?php #echo $select_color[$p]; ?> m-r-sm"></i>
					          <?= $location['name']; ?>
					        </div>
								<?php $p++; ?>
								<?php endforeach; ?>
				      </div>
				    </div>
				  </div>
		    </div>
			</div>

			<div class="box">
      	<div class="box-header b-b">
      		<h3>Рекомендации</h3>

					<div class="box-tool">
						<div class="nav-active-info">
							<ul class="nav nav-pills nav-rounded nav-xs">
								<li class="nav-item inline">
									<a class="nav-link active" href="#" data-toggle="tab" data-target="#tab-1">GTMetrix</a>
								</li>
                <?php if(sizeof($vars['test_pagespeed_desktop']) != 0): ?>
								<li class="nav-item inline">
									<a class="nav-link" href="#" data-toggle="tab" data-target="#tab-2">Desktop</a>
								</li>
                <?php endif; ?>
                <?php if(sizeof($vars['test_pagespeed_mobile']) != 0): ?>
                <li class="nav-item inline">
									<a class="nav-link" href="#" data-toggle="tab" data-target="#tab-3">Mobile</a>
								</li>
                <?php endif; ?>
							</ul>
						</div>
					</div>
      	</div>
      	<div>
      		<div class="row-col">
      			<div class="col-sm-12 b-r light lt">
								<div class="col-sm-12 col-lg-12">
							    <div id="accordion" class="tab-content pos-rlt">
							      <div class="tab-pane active" id="tab-1">
											<div class="row">
												<div class="col-sm-12">
										      <div class="m-b-md m-t-md">
														<?php $p = 0; ?>
														<?php foreach ($vars['test_pagespeed']['rules'] as $rule): ?>
															<?php
																if($rule['score'] < 30) {
																	$color = 'danger';
																}
																elseif ($rule['score'] > 30 and $rule['score'] < 70) {
																	$color = 'warning';
																}
																elseif ($rule['score'] > 70 and $rule['score'] < 90) {
																	$color = 'teal';
																}
																else {
																	$color = 'success';
																}

															?>

											        <div class="panel box no-border m-b-xs text-wrap">
											          <div class="box-header p-y-sm">
											            <span class="pull-right label <?= $color; ?> text-sm"><?= $rule['score']; ?>/100</span>
											            <a data-toggle="collapse" data-parent="#accordion" data-target="#c_<?= $p; ?>">
																		<?= $rule['name']; ?>
											            </a>
											          </div>
											          <div id="c_<?= $p; ?>" class="collapse">
											            <div class="box-body">
											              <div class="text-sm text-muted">
											                <p>
																				<?php if ($rule['warnings'] != NULL): ?>
																					<?= $rule['warnings'] ?>
																				<?php else: ?>
																					Сайт выполнил условие!
																				<?php endif; ?>
											                </p>
											              </div>
											            </div>
											          </div>
											        </div>
															<?php $p++; ?>
														<?php endforeach; ?>
										      </div>

										    </div>
											</div>
							      </div>
                    <?php if(sizeof($vars['test_pagespeed_desktop']) != 0): ?>
							      <div class="tab-pane" id="tab-2">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="m-b-md m-t-md">
                                <?php $p = 0; ?>
                                <?php foreach ($vars['test_pagespeed_desktop']['formattedResults']['ruleResults'] as $rule): ?>
                                    <div class="panel box no-border m-b-xs text-wrap">
                                        <div class="box-header p-y-sm">
                                            <span class="pull-right" >
                                            <?php if($rule['ruleImpact'] == 0): ?>

                                              <i class="fa fa-circle-o text-success m-y-xs"></i>
                                            <?php else: ?>
                                              <i class="fa fa-circle-o text-warning m-y-xs"></i>
                                            <?php endif; ?>
                                            </span>
<!--                                            <span class="pull-right label success text-sm"></span>-->
                                            <a data-toggle="collapse" data-parent="#accordion" data-target="#d_<?= $p; ?>">
                                              <?= $rule['localizedRuleName']; ?>
                                            </a>
                                        </div>
                                        <div id="d_<?= $p; ?>" class="collapse">
                                            <div class="box-body">
                                                <div class="text-sm text-muted">
                                                    <p>
                                                      <?php if (!array_key_exists('urlBlocks', $rule)): ?>
                                                        <?php
                                                          $string = str_replace('{{END_LINK}}', '</a>', $rule['summary']['format']);
                                                          if(preg_match("/{{BEGIN_LINK}}/iU", $string)) {
                                                            foreach ($rule['summary']['args'] as $link) {
                                                              $string = str_replace('{{BEGIN_LINK}}', '<a href="'.$link['value'].'" class="text-info" >', $string);
                                                            }
                                                          }
//                                                        $string = str_replace('{{BEGIN_LINK}}', '<a href="/project/" class="text-info">',str_replace('{{END_LINK}}', '</a>', $rule['summary']['format']));
                                                          echo $string;
                                                        ?>
                                                      <?php else: ?>
                                                        <?php
                                                          foreach ($rule['urlBlocks'] as $key) {
                                                            $string = str_replace('{{END_LINK}}', '</a>', $key['header']['format']);
                                                            if(!array_key_exists('args', $key)) {
                                                              foreach ($key['header']['args'] as $item) {
                                                                if($item['type'] == 'HYPERLINK') {
                                                                  $item['value'] = ' <a href="'.$item['value'].'" class="text-info">';
                                                                }

                                                                $string = preg_replace('|{{(.+)}}|isU', $item['value'], $string, 1);
                                                              }
                                                            }
                                                            echo $string;

                                                            if(!array_key_exists('urls', $rule['urlBlocks']) and isset($key['urls']) and sizeof($key['urls']) != 0) {
                                                              foreach ($key['urls'] as $item) {
                                                                $recomend = $item['result']['format'];

                                                                foreach ($item['result']['args'] as $value) {
                                                                  if($value['type'] == 'URL') {
                                                                    $value['value'] = '<a href="'.$value['value'].'" class="text-info">'.$value['value'].'</a>';
                                                                  }

                                                                  $recomend = preg_replace('|{{(.+)}}|isU', $value['value'], $recomend, 1);
                                                                }

                                                                $recomend = '<li>'.$recomend.'</li>';
                                                              }
                                                              echo '<ul>'.$recomend.'</ul>';
                                                            }
                                                          }
                                                        ?>
                                                      <?php endif; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  <?php $p++; ?>
                                <?php endforeach; ?>

                                <div class="m-t text-sm">
                                  <span class="m-r-md"><i class="fa fa-circle-o text-success m-y-xs"></i> - Выполнено</span>
                                  <span><i class="fa fa-circle-o text-warning m-y-xs"></i> - Требует особого внимания</span>
                                </div>
                              </div>

                          </div>
                      </div>
							      </div>
                    <?php endif; ?>
                    <?php if(sizeof($vars['test_pagespeed_mobile']) != 0): ?>
                      <div class="tab-pane" id="tab-3">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="m-b-md m-t-md">
                              <?php $p = 0; ?>
                              <?php foreach ($vars['test_pagespeed_mobile']['formattedResults']['ruleResults'] as $rule): ?>
                                <div class="panel box no-border m-b-xs text-wrap">
                                  <div class="box-header p-y-sm">
                                            <span class="pull-right" >
                                            <?php if($rule['ruleImpact'] == 0): ?>

                                              <i class="fa fa-circle-o text-success m-y-xs"></i>
                                            <?php else: ?>
                                              <i class="fa fa-circle-o text-warning m-y-xs"></i>
                                            <?php endif; ?>
                                            </span>
                                    <!--                                            <span class="pull-right label success text-sm"></span>-->
                                    <a data-toggle="collapse" data-parent="#accordion" data-target="#m_<?= $p; ?>">
                                      <?= $rule['localizedRuleName']; ?>
                                    </a>
                                  </div>
                                  <div id="m_<?= $p; ?>" class="collapse">
                                    <div class="box-body">
                                      <div class="text-sm text-muted">
                                        <p>
                                          <?php if (!array_key_exists('urlBlocks', $rule)): ?>
                                            <?php
                                            $string = str_replace('{{END_LINK}}', '</a>', $rule['summary']['format']);
                                            if(preg_match("/{{BEGIN_LINK}}/iU", $string)) {
                                              foreach ($rule['summary']['args'] as $link) {
                                                $string = str_replace('{{BEGIN_LINK}}', '<a href="'.$link['value'].'" class="text-info" >', $string);
                                              }
                                            }
//                                                        $string = str_replace('{{BEGIN_LINK}}', '<a href="/project/" class="text-info">',str_replace('{{END_LINK}}', '</a>', $rule['summary']['format']));
                                            echo $string;
                                            ?>
                                          <?php else: ?>
                                            <?php
                                            foreach ($rule['urlBlocks'] as $key) {
                                              $string = str_replace('{{END_LINK}}', '</a>', $key['header']['format']);
                                              if(!array_key_exists('args', $key)) {
                                                foreach ($key['header']['args'] as $item) {
                                                  if($item['type'] == 'HYPERLINK') {
                                                    $item['value'] = ' <a href="'.$item['value'].'" class="text-info">';
                                                  }

                                                  $string = preg_replace('|{{(.+)}}|isU', $item['value'], $string, 1);
                                                }
                                              }
                                              echo $string;

                                              if(!array_key_exists('urls', $rule['urlBlocks']) and isset($key['urls']) and sizeof($key['urls']) != 0) {
                                                foreach ($key['urls'] as $item) {
                                                  $recomend = $item['result']['format'];

                                                  foreach ($item['result']['args'] as $value) {
                                                    if($value['type'] == 'URL') {
                                                      $value['value'] = '<a href="'.$value['value'].'" class="text-info">'.$value['value'].'</a>';
                                                    }

                                                    $recomend = preg_replace('|{{(.+)}}|isU', $value['value'], $recomend, 1);
                                                  }

                                                  $recomend = '<li>'.$recomend.'</li>';
                                                }
                                                echo '<ul>'.$recomend.'</ul>';
                                              }
                                            }
                                            ?>
                                          <?php endif; ?>
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <?php $p++; ?>
                              <?php endforeach; ?>

                              <div class="m-t text-sm">
                                <span class="m-r-md"><i class="fa fa-circle-o text-success m-y-xs"></i> - Выполнено</span>
                                <span><i class="fa fa-circle-o text-warning m-y-xs"></i> - Требует особого внимания</span>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    <?php endif; ?>
							    </div>
			        </div>
              <div class="col-sm-12 col-lg-12 b-t p-a m-b-0 box">
                <div class="row">
                  <div class="col-sm-8 text-sm">Мы собрали в один архив проблемные ресурсы и оптимизировали их. <br>Нужно лишь заменить ими оригинальные (рекомендуем делать бекап)</div>
                  <div class="col-sm-4">
                    <a href="/templ/materials/test_report/<?= $vars['path_name']; ?>/pagespeed_files.tar" class="btn btn-block blue-grey text-white">
                      <i class="fa  fa-file-zip-o pull-left"></i>
                      Скачать архив
                    </a>
                  </div>
                </div>
              </div>
      			</div>
      		</div>
      	</div>
      </div>

		</div>
	</div>
	<div class="col-lg w-lg w-auto-md white bg">
		<div>
			<div class="p-a">
				<h6 class="text-muted m-a-0"><?= $vars['project'][0]['name']; ?></h6>
				<small class="text-muted"><?= $vars['site'][0]['url']; ?></small>
			</div>
			<div class="col-md-12 m-b">
				<img class="w-full " src="/templ/materials/test_report/<?= $vars['path_name']; ?>/screenshot.jpg" alt="<?= $project[0]['name']; ?>" >
			</div>
	        <div class="p-a">
	        	<h6 class="text-muted m-a-0">Информация</h6>
	        </div>
	        <div class="streamline streamline-theme m-b">
	          <div class="sl-item b-success">
	            <div class="sl-content">
	              <div><?= $vars['test'][0]['name']; ?></div>
	              <div class="sl-date text-muted">Название теста</div>
	            </div>
	          </div>
	          <div class="sl-item b-success">
	            <div class="sl-content">
	              <div>
									<?php if ($vars['test'][0]['type_test'] == 1): ?>
										Автоматическое
									<?php elseif($vars['test'][0]['type_test'] == 2): ?>
										Ручное
									<?php endif; ?>
								</div>
	              <div class="sl-date text-muted">Тип тестирования</div>
	            </div>
	          </div>
	          <div class="sl-item b-success">
	            <div class="sl-content">
	              <div><a href="/project/<?= $vars['project'][0]['id']; ?>" class="text-info"><?= $vars['project'][0]['name']; ?></a></div>
	              <div class="sl-date text-muted">Проект</div>
	            </div>
	          </div>
	          <div class="sl-item b-success">
	            <div class="sl-content">
	              <div><?= gmdate("H:i A Y-m-d", $vars['test'][0]['date_init']); ?></div>
	              <div class="sl-date text-muted">Начало тестирования</div>
	            </div>
	          </div>
	          <div class="sl-item success <?php if($vars['test'][0]['status'] != 1) { echo "warning";} ?>">
	            <div class="sl-content">
	              <div>
									<?php if($vars['test'][0]['status'] == 1): ?>
										Выполнено
									<?php else: ?>
										В ожидании
									<?php endif; ?>

								</div>
	              <div class="sl-date text-muted">Статус тестирования</div>
	            </div>
	          </div>
	        </div>
        </div>
	</div>
</div>
