<div class="padding">
  <form action="/search/" method="get" class="m-b-md">
    <div class="input-group input-group-lg">
      <input type="text" name="a" required class="form-control" value="<?= $vars['search_info']['name']; ?>" placeholder="Введите запрос для поиска">
      <span class="input-group-btn">
        <button class="btn b-a no-shadow white" type="submit">Поиск</button>
      </span>
    </div>
  </form>
  <p class="text-sm m-b-md"><strong><?= $vars['search_info']['all_count']; ?></strong> - cовпадений найдено для: <strong><?= $vars['search_info']['name']; ?></strong></p>

  <ul class="nav nav-sm nav-pills nav-active-primary clearfix">
    <li class="nav-item">
      <a class="nav-link active" href="#" data-toggle="tab" data-target="#tab_1">Проекты<span class="label label-sm primary m-l-xs"><?= $vars['search_info']['project_count']; ?></span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_2">Пользователи<span class="label label-sm primary m-l-xs"><?= $vars['search_info']['users_count']; ?></span></a>
    </li>
  </ul>

  <div class="tab-content">
    <div class="tab-pane p-v-sm active" id="tab_1">
      <div class="box m-t p-a-sm">
        <ul class="list">
					<?php if (sizeof($vars['projects']) != 0): ?>
						<?php foreach ($vars['projects'] as $project): ?>
							<li class="list-item b-b">
		            <div class="clear">
		              <h5 class="m-a-0 m-b-sm"><a href="/project/<?= $project[0]['id']; ?>"><?= $project[0]['name']; ?></a></h5>
									<p class="text-muted text-sm">
										Статус проекта:
										<span>
											<?php if ($project[0]['status'] == 1): ?>
												Активен
											<?php else: ?>
												На модерации
											<?php endif; ?>
										</span>
									</p>
		              <p>
											<?php if ($_SESSION['authorize']['id'] != $project[0]['maker']): ?>
												<span class="label blue-grey m-r p-x-sm">
													Разрешен доступ
												</span>
											<?php else: ?>
												<span class="label teal m-r p-x-sm">
													Создатель
												</span>
											<?php endif; ?>
										</span>
									</p>
		            </div>
		          </li>
						<?php endforeach; ?>
					<?php else: ?>
						<li class="list-item">
	            <div class="clear m-t text-center">
	              <p class="text-muted">
									<?php if (empty($_GET)): ?>
										Введите свой запрос, чтобы найти нужный проект
									<?php else: ?>
										По данному запросу нет найденных проектов. Уточните свой запрос или повторите позже
									<?php endif; ?>
								</p>
	            </div>
	          </li>
					<?php endif; ?>

        </ul>
      </div>
    </div>
    <div class="tab-pane p-v-sm" id="tab_2">
			<div class="box m-t p-a-sm">
        <ul class="list row m-x-sm">
					<?php if (sizeof($vars['users']) != 0): ?>
						<?php foreach ($vars['users'] as $member): ?>
							<li class="list-item col-xs-12 col-md-6 col-lg-4">
								<a href="/account/<?= $member['profile'][0]['id']; ?>" class="list-left">
									<span class="w-40 avatar <?php if(!empty($member['profile_social'][0]['color_select'])) { echo $member['profile_social'][0]['color_select'];} else {echo "blue-grey";} ?>">
										<?= substr(strtoupper($member['profile'][0]['username']), 0, 1); ?>
									</span>
								</a>
								<div class="list-body">
									<div>
										<a href="/account/<?= $member['profile'][0]['id']; ?>">
										<?= $member['profile'][0]['name'].' '.$member['profile'][0]['surname']; ?>
										</a>
									</div>
									<small class="text-muted">
										<span>
										<?= $member['profile'][1]['name']; ?>
										</span>
									</small>
								</div>
							</li>
						<?php endforeach; ?>
					<?php else: ?>
						<li class="list-item">
							<div class="clear m-t text-center">
	              <p class="text-muted">
									<?php if (empty($_GET)): ?>
										Введите Имя или Фамилию в запрос, чтобы найти пользователя системы
									<?php else: ?>
										По данному запросу не найдено пользователя (-ей) системы. Уточните свой запрос или повторите позже
									<?php endif; ?>
								</p>
	            </div>
	          </li>
					<?php endif; ?>

        </ul>
      </div>
    </div>
  </div>
</div>
