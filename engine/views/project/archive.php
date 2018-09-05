<div class="app-body-inner">
	<div class="row-col">
    <div class="col-xs-3 w-xl modal fade aside aside-lg">
			<div class="row-col light b-r bg">
				<div class="b-b">
					<div class="navbar no-radius">
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
                    <?php if(sizeof($vars['sites']) != 0): ?>
										<?php foreach ($vars['sites'] as $site): ?>
				      			    <div class="list-item ">
				      			      <div class="list-left">
				      			        <span class="w-40 circle lt b-a">
                                            <img src="/templ/materials/favicons/<?= $site['id']; ?>.png" width="16" height="16" class="rounded w-auto" alt="<?= $site['name']; ?>">
				      			            <!-- <span class="fa fa-twitter text-md"></span> -->
				      			        </span>
				      			      </div>
				      			      <div class="list-body">
<!--				      			          <div class="pull-right dropdown">-->
<!--				      			            <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-h"></i></a>-->
<!--				      			            <div class="dropdown-menu pull-right text-color" role="menu">-->
<!--				      			              <a href="/project/edit/site/--><?//= $site['id']; ?><!--"class="dropdown-item">-->
<!--				      			              	<i class="fa fa-pencil"></i>-->
<!--				      			              	Редактировать-->
<!--				      			              </a>-->
<!--																	<div class="dropdown-divider"></div>-->
<!--				      			              <a href="/project/archive/site/--><?//= $site['id']; ?><!--" class="dropdown-item">-->
<!--				      			              	<i class="fa fa-trash"></i>-->
<!--				      			              	В архив-->
<!--				      			              </a>-->
<!--				      			            </div>-->
<!--				      			          </div>-->
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
                      <?php else: ?>
                        <div class="text-muted m-y-lg">
                          <h5 class="text-muted text-center">
                            <span class="text-muted">На данный момент в архиве нет сайтов</span>
                          </h5>
                        </div>
                      <?php endif; ?>
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
		<div class="col-xs-3 w-xl modal fade aside aside-lg">
			<div class="row-col white b-r bg">
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
                      <?php if(sizeof($vars['projects']) != 0): ?>
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
				      			        <div class="item-title">
				      			          <a href="/project/<?= $project[0]['id']; ?>" class="_500">
																<?= $project[0]['name']; ?>
															</a>
				      			        </div>
														<?php if (($project[0]['maker'] != $_SESSION['authorize']['id']) and ($project[0]['manager_id'] != $_SESSION['authorize']['id'])): ?>
														<small class="block text-ellipsis m-b-xl">
															 <span class="text-xs text-muted">
																 Разрешен доступ
															 </span>
													 	</small>
														<?php endif; ?>

													 <?php if ($project[0]['status'] == 1): ?>
														 <div class="progress-xxs m-y-sm lter progress w-sm">
 				      			            <div class="progress-bar warning" data-toggle="tooltip" title="Finished: 44%" style="width: 19%;">
 				      			            </div>
 				      			        </div>
													 <?php endif; ?>
				      			      </div>
				      			    </div>
											<?php endforeach; ?>
                      <?php else: ?>
                        <div class="text-muted m-y-lg">
                          <h5 class="text-muted text-center">
                            <span class="text-muted">На данный момент в архиве нет проектов</span>
                          </h5>
                        </div>
                      <?php endif; ?>
				        	</div>
				        	<!-- / -->
				      	</div>
				    </div>
		      	</div>
		      	<!-- / -->
			    <!-- footer -->
			    <div class="p-a b-t clearfix">
			      	<span class="text-sm text-muted">Всего: <strong><?= count($vars['projects']); ?></strong></span>
			    </div>
			    <!-- / -->
		    </div>
		</div>
	</div>
</div>
