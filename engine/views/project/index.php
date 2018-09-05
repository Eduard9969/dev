<div class="app-body-inner">
	<div class="row-col">
    <div class="col-xs-3 w-xl modal fade aside aside-lg" id="sitenav">
			<div class="row-col light b-r bg">
				<div class="b-b">
					<div class="navbar no-radius">
					    <!-- nabar right -->
					    <ul class="nav navbar-nav pull-right m-l">
						    <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown">
                      <span class="btn btn-xs white rounded dropdown-toggle">
                        Добавить
                      </span>
                  </a>
                  <div class="dropdown-menu text-color pull-right" role="menu">
								  <a href="/project/add/project" title="Добавить новый проект" class="dropdown-item">
								  	<i class="fa fa-inbox"></i>
								  	Новый проект
								  </a>
								  <a href="/project/add/test" title="Добавить новый тест" class="dropdown-item">
								  	<i class="fa fa-check-square-o"></i>
								  	Новое тестирование
								  </a>
								  <a href="/project/add/site" title="Добавить новый сайт" class="dropdown-item">
								  	<i class="fa fa-tablet"></i>
								  	Новый сайт
								  </a>
								</div>
						    </li>
					    </ul>
					    <!-- / navbar right -->
					    <!-- link and dropdown -->
					    <ul class="nav navbar-nav">
					        <li class="nav-item">
					          	<span class="navbar-item text-md">Сайты</span>
					        </li>
					    </ul>
					    <!-- / link and dropdown -->
					</div>
				</div>
		      	<!-- flex content -->
		      	<div class="row-row">
			      	<div class="row-body scrollable hover">
				      	<div class="row-inner">
				      		<!-- left content -->
				      		<div class="list" data-ui-list="b-r b-2x b-theme">
										<?php foreach ($vars['sites'] as $site): ?>
				      			    <div class="list-item ">
				      			      <div class="list-left">
				      			        <span class="w-40 circle lt b-a">
                                            <img src="/templ/materials/favicons/<?= $site['id']; ?>.png" width="16" height="16" class="rounded w-auto" alt="<?= $site['name']; ?>">
				      			            <!-- <span class="fa fa-twitter text-md"></span> -->
				      			        </span>
				      			      </div>
				      			      <div class="list-body">
				      			          <div class="pull-right dropdown">
				      			            <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-h"></i></a>
				      			            <div class="dropdown-menu pull-right text-color" role="menu">
				      			              <a href="/project/edit/site/<?= $site['id']; ?>"class="dropdown-item">
				      			              	<i class="fa fa-pencil"></i>
				      			              	Редактировать
				      			              </a>
																	<div class="dropdown-divider"></div>
				      			              <a href="/project/archive/site/<?= $site['id']; ?>" class="dropdown-item">
                                    <i class="material-icons md-18">layers</i>
				      			              	В архив
				      			              </a>
				      			            </div>
				      			          </div>
				      			        <div class="item-title">
				      			          <a class="_500"><?= $site['name']; ?></a>
				      			        </div>
				      			        <small class="block text-ellipsis">
				      			          <span class="text-xs">
				      			              URL:
				      			          </span> <span class="text-muted"><?= $site['url']; ?></span>
				      			        </small>
				      			      </div>
				      			    </div>
											<?php endforeach; ?>
				        	</div>
				        	<!-- / -->
				      	</div>
				    </div>
		      	</div>
		      	<!-- / -->
			    <!-- footer -->
			    <div class="p-a b-t clearfix">
			      	<span class="text-sm text-muted">Всего: <strong><?= count($vars['sites']); ?></strong></span>
			    </div>
			    <!-- / -->
		    </div>
		</div>
		<div class="col-xs-3 w-xl modal fade aside aside-lg" id="subnav">
			<div class="row-col light b-r bg">
				<div class="b-b">
					<div class="navbar no-radius">
					    <!-- link and dropdown -->
					    <ul class="nav navbar-nav">
					        <li class="nav-item">
					          	<span class="navbar-item text-md">Проекты</span>
					        </li>
					    </ul>
					    <!-- / link and dropdown -->
					</div>
				</div>
		      	<!-- flex content -->
		      	<div class="row-row">
			      	<div class="row-body scrollable hover">
				      	<div class="row-inner">
				      		<!-- left content -->
				      		<div class="list" data-ui-list="b-r b-2x b-theme">
											<?php foreach ($vars['projects'] as $project): ?>
				      			    <div class="list-item " data-model="<?= $project[0]['id'] ?>">
				      			      <div class="list-left">
														<?php
															if($project[0]['status'] != 1 ) { $class = "teal"; }
															else { $class = "lt"; }
														?>
				      			        <span class="w-40 avatar circle b-a b-2x <?= $class; ?>">
				      			            <span class="text-sm">P<?= $project[0]['id'] ?></span>
																<?php if ($project[0]['status'] != 1): ?>
																	<i class="away b-white"></i>
																<?php endif; ?>
				      			        </span>
				      			      </div>
				      			      <div class="list-body">
				      			          <div class="pull-right dropdown">
				      			            <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-h"></i></a>
				      			            <div class="dropdown-menu pull-right text-color" role="menu">
				      			              <a href="/project/<?= $project[0]['id']; ?>" class="dropdown-item">
				      			              	<i class="fa fa-eye"></i>
				      			              	Просмотр сведений
				      			              </a>
																	<?php if ($project[0]['maker'] == $_SESSION['authorize']['id']): ?>
				      			              <a href="/project/edit/group/<?= $project[0]['supp_group']; ?>" class="dropdown-item">
				      			              	<i class="fa fa-shield"></i>
				      			              	Делегировать права
				      			              </a>
																	<?php endif; ?>
																	<?php if ($project[0]['manager_id'] == $_SESSION['authorize']['id']): ?>
				      			              <a href="/project/edit/group/<?= $project[0]['supp_group']; ?>" class="dropdown-item">
				      			              	<i class="fa fa-shield"></i>
				      			              	Доступы к проекту
				      			              </a>
																	<?php endif; ?>
				      			              <a href="/project/edit/project/<?= $project[0]['id']; ?>" class="dropdown-item">
				      			              	<i class="fa fa-pencil"></i>
				      			              	Редактировать проект
				      			              </a>
																	<div class="dropdown-divider"></div>
				      			              <a href="/project/archive/project/<?= $project[0]['id']; ?>" class="dropdown-item">
                                    <i class="material-icons md-18">layers</i>
				      			              	В архив
				      			              </a>
				      			            </div>
				      			          </div>
				      			        <div data-content="<?= $project[0]['id'] ?>" class="item-title">
				      			          <a href="#" class="_500">
																<?= $project[0]['name']; ?>
																<?php if ($project[0]['status'] != 1 and $project[0]['manager_id'] != $_SESSION['authorize']['id']): ?>
																	<span class="label warning pos-rlt m-l-xs">
																		<b class="arrow left b-warning pull-in"></b>
																		В Обработке
																	</span>
																<?php endif; ?>
															</a>
				      			        </div>
														<?php if (($project[0]['maker'] != $_SESSION['authorize']['id']) and ($project[0]['manager_id'] != $_SESSION['authorize']['id'])): ?>
														<small class="block text-ellipsis m-b-xl">
															 <span class="text-xs text-muted">
																 Разрешен доступ
															 </span>
													 	</small>
														<?php endif; ?>
														<?php if ($project[0]['status'] != 1 and $project[0]['manager_id'] == $_SESSION['authorize']['id']): ?>
														<a href="/project/edit/project/<?= $project[0]['id']; ?>" title="Просмотр проекта">
															<span class="label teal">Ожидает модерацию</span>
														</a>
														<?php endif; ?>
														<small class="block text-ellipsis">
															 <span class="text-xs" data-id="all_tests">
																 <?= $vars['test_count'][$project[0]['id']]['all']; ?>
															 </span> <span class="text-muted">
																<?php if ($vars['test_count'][$project[0]['id']]['all'] == 1): ?>
																	тест
																<?php elseif($vars['test_count'][$project[0]['id']]['all'] < 5 and $vars['test_count'][$project[0]['id']]['all'] != 0): ?>
																	теста
																<?php else: ?>
																	тестов
																<?php endif; ?>
																 ,</span>
														 <span class="text-xs" data-id="run_tests">
															 	<?= $vars['test_count'][$project[0]['id']]['compl']; ?>
														 </span> <span class="text-muted">в процессе</span>
													 </small>
													 <?php if ($project[0]['status'] == 1): ?>
														 <div class="progress-xxs m-y-sm lter progress w-sm">
 				      			            <div class="progress-bar success" data-toggle="tooltip" title="Finished: 44%" style="width: 19%;">
 				      			            </div>
 				      			        </div>
													 <?php endif; ?>
				      			      </div>
				      			    </div>
											<?php endforeach; ?>
				        	</div>
				        	<!-- / -->
				      	</div>
				    </div>
		      	</div>
		      	<!-- / -->
			    <!-- footer -->
			    <div class="p-a b-t clearfix">
			      	<!-- <div class="btn-group pull-right">
			            <a href="#" class="btn btn-xs white circle"><i class="fa fa-fw fa-angle-left"></i></a>
			            <a href="#" class="btn btn-xs white circle"><i class="fa fa-fw fa-angle-right"></i></a>
			        </div> -->
			      	<span class="text-sm text-muted">Всего: <strong><?= count($vars['projects']); ?></strong></span>
			    </div>
			    <!-- / -->
		    </div>
		</div>
		<div class="col-xs-4 modal fade aside aside-sm test_list" id="list">
			<div class="row-col b-r white lt">
				<div class="b-b">
					<div class="navbar no-radius">
						<a data-toggle="modal" data-target="#subnav" data-ui-modal class="navbar-item pull-left hidden-xl-up hidden-sm-down">
							<span class="btn btn-sm btn-icon blue">
					      		<i class="fa fa-th"></i>
					        </span>
					  </a>
              <!-- nabar right -->
					    <ul class="nav navbar-nav pull-right m-l">
                <li class="nav-item">
                  <a class="nav-link text-muted del-test" title="Очистить весь тест лист" href="#" data-toggle="dropdown">
                    <i class="fa fa-trash"></i>
                  </a>
                </li>
					    </ul>
					    <!-- / navbar right -->
					    <!-- link and dropdown -->
					    <ul class="nav navbar-nav">
					        <li class="nav-item">
					          	<span class="navbar-item m-r-0 text-md">Тестирование</span>
					        </li>
                            <li class="nav-item">
                                <a class="nav-link">
						            <span class="label circle w-20 p-t-xs">
                                        <span class="text-sm" data-id="all_tests">-</span>
						            </span>
                                </a>
                            </li>
					    </ul>
					    <!-- / link and dropdown -->
					</div>
				</div>
		      	<!-- flex content -->
		      	<div class="row-row">
			      	<div class="row-body scrollable hover">
				      	<div class="row-inner">
				      		<!-- content -->
				      		<div class="list" data-ui-list="b-r b-2x b-theme" data-id="tests_list">
										<div class="text-muted m-y-lg">
											<h5 class="text-muted text-center">
												<span class="text-muted">Выберите проект из списка</span>
											</h5>
										</div>
				      			<div class="list-item row-col padding">
				      				<div class="padding col-xs">

				      				</div>
				      			</div>
				        	</div>
				        	<!-- / -->
				      	</div>
				    </div>
		      	</div>
		      	<!-- / -->
			    <!-- footer -->
			    <div class="p-a b-t clearfix test_stat">
			      	<!-- <div class="btn-group pull-right">
			            <a href="#" class="btn btn-xs white circle"><i class="fa fa-fw fa-angle-left"></i></a>
			            <a href="#" class="btn btn-xs white circle"><i class="fa fa-fw fa-angle-right"></i></a>
			        </div> -->
			      	<span class="text-sm text-muted">
                  Всего: <strong class="all" data-id="all_tests" >-</strong> ,
                  В процессе: <strong data-id="run_tests">-</strong>
              </span>
			    </div>

          <!-- / -->
		    </div>
		</div>
	</div>
</div>
