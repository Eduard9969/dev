<div class="item b-b">
  <div class="p-a-md">
    <div class="row m-t">
      <div class="col-sm-7">
        <a class="pull-left m-r-md">
          <div class="inline text-center">
            <span class="avatar w-56 lter text-lg b-a b-2x">
              P<?= $vars['project'][0]['id']; ?>
            </span>
        </div>
        </a>
        <div class="clear m-b">
          <h4 class="m-a-0 m-b-sm m-t-x"><?= $vars['project'][0]['name']; ?></h4>
          <p class="text-muted m-t-xs">
            <span class="m-r-md">
              <small class="m-r-xs">Cайт:</small>
              <small><?= $vars['site'][0]['name'].' - '.$vars['site'][0]['url']; ?></small>
            </span>

            <?php
              if($vars['project'][0]['status'] == 1 and $vars['project'][0]['archive_status'] != 1) {
                $access_ico = 'fa-check';
                $access_color = 'success';
                $access_text = 'Активный';
              }
              elseif($vars['project'][0]['archive_status'] == 1){
                $access_ico = '';
                $access_color = 'grey';
                $access_text = '<i class="material-icons md-18">layers</i> В архиве';
              }
              else {
                $access_ico = 'fa-clock-o';
                $access_color = 'warning';
                $access_text = 'Ожидает модерацию';
              }
            ?>

            <small class="text-<?= $access_color; ?>">
              <i class="fa <?= $access_ico; ?> m-r-xs"></i><?= $access_text; ?>
            </small>
          </p>
        </div>
      </div>
      <div class="col-sm-5">
        <div class="p-y-sm text-center text-sm-right">
          <a class="inline p-x b-l b-r text-center">
            <span class="h4 block m-a-0"><?= count($vars['members']); ?></span>
            <small class="text-xs text-muted">Участников</small>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="p-a-md b-b p-b-sm">
  <div class="row">
    <div class="col-sm-8 col-lg-9">
      <div class="tab-content">
        <div class="tab-pane p-v-sm active" id="tab_4">
          <div class="row m-b">
            <div class="col-xs-6">
              <small class="text-muted">Название проекта</small>
              <div class="_500">
                <?= $vars['project'][0]['name']; ?>
              </div>
            </div>
            <div class="col-xs-6">
              <small class="text-muted">URL Проекта</small>
              <div class="_500"><?= $vars['site'][0]['name'].' - '.$vars['site'][0]['url']; ?></div>
            </div>
          </div>
          <div class="row m-b">
            <div class="col-xs-6">
              <small class="text-muted">Статус проекта</small>
              <div class="_500">
                <?php if ($vars['project'][0]['status'] == 1 and $vars['project'][0]['archive_status'] != 1): ?>
                  Активный
                <?php elseif($vars['project'][0]['archive_status'] == 1): ?>
                  В архиве
                <?php else: ?>
                  Ожидает модерацию
                <?php endif; ?>
              </div>
            </div>
            <div class="col-xs-6">
              <small class="text-muted">Число участников</small>
              <div class="_500">
                <?= count($vars['members']);  ?>
              </div>
            </div>
          </div>
          <div class="row m-b">
            <div class="col-xs-6">
              <small class="text-muted">Создатель проекта</small>
              <div class="_500"><?= $vars['maker'][0]['name'].' '.$vars['maker'][0]['surname']; ?></div>
            </div>
            <div class="col-xs-6">
              <small class="text-muted">Менеджер проекта</small>
              <div class="_500"><?= $vars['manager']['profile'][0]['name'].' '.$vars['manager']['profile'][0]['surname']; ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-lg-3">
		  <div class="box text-center">
		    <div class="p-a-md">
		    	<div class="w-56 text-center">
            <span class="avatar w-56 <?php if(!empty($vars['manager']['profile_social'][0]['color_select'])) { echo $vars['manager']['profile_social'][0]['color_select'];} else {echo "blue-grey";} ?>">
              <?= substr(strtoupper($vars['manager']['profile'][0]['username']), 0, 1); ?>
            </span>
          </div>
		    	<a href="/account/<?= $vars['manager']['profile'][0]['id']; ?>" class="text-md block"><?= $vars['manager']['profile'][0]['name'].' '.$vars['manager']['profile'][0]['surname']; ?></a>
		    	<p><small>Менеджер проекта</small></p>
		    	<div>
            <?php if(!empty($vars['manager']['profile_social'][0]['facebook'])): ?>
            <a href="https://www.facebook.com/<?= $vars['manager']['profile_social'][0]['facebook']; ?>" title="Страница Facebook" class="btn btn-icon btn-social rounded b-a btn-sm">
              <i class="fa fa-facebook"></i>
              <i class="fa fa-facebook indigo"></i>
            </a>
            <?php endif; ?>
            <?php if(!empty($vars['manager']['profile_social'][0]['twitter'])): ?>
            <a href="https://twitter.com/<?= $vars['manager']['profile_social'][0]['twitter']; ?>" title="Страница Twitter" class="btn btn-icon btn-social rounded b-a btn-sm">
              <i class="fa fa-twitter"></i>
              <i class="fa fa-twitter light-blue"></i>
            </a>
            <?php endif; ?>
            <?php if(!empty($vars['manager']['profile_social'][0]['google'])): ?>
            <a href="https://plus.google.com/<?= $vars['manager']['profile_social'][0]['google']; ?>" title="Страница Google+" class="btn btn-icon btn-social rounded b-a btn-sm">
              <i class="fa fa-google-plus"></i>
              <i class="fa fa-google-plus red"></i>
            </a>
            <?php endif; ?>
            <?php if(!empty($vars['manager']['profile_social'][0]['linkedin'])): ?>
            <a href="https://www.linkedin.com/in/<?= $vars['manager']['profile_social'][0]['linkedin']; ?>" title="Страница LinkedIn" class="btn btn-icon btn-social rounded b-a btn-sm">
              <i class="fa fa-linkedin"></i>
              <i class="fa fa-linkedin cyan-600"></i>
            </a>
            <?php endif; ?>
		    	</div>
		    </div>
		    <div class="row no-gutter b-t no-print">
          <div class="col-xs-12 b-r">
  			    <a href="/account/<?= $vars['manager']['profile'][0]['id']; ?>" class="p-a block text-center">
              <i class="material-icons md-24 text-muted m-v-sm inline">people</i>
  			      <span class="block">Профиль</span>
  			    </a>
  			  </div>
			 </div>
		  </div>
		</div>
  </div>
</div>
<div class="padding">
  <div class="row m-t-sm">
    <div class="col-sm-12">
      <div>
        <div class="box">
            <div class="box-header">
              <h3>Участники проекта</h3>
            </div>
            <div class="box-divider m-a-0"></div>
            <ul class="row m-x-sm list no-border p-b">
              <?php foreach ($vars['members'] as $member): ?>
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
                      <?php
                        if ($member['profile'][0]['specialty'] != 1 and $member['profile'][0]['specialty'] != 0) {
                          echo $member['profile'][1]['name'].', ';
                        }
                      ?>
                      </span>
                      <?php if($member['profile'][0]['id'] == $vars['project'][0]['maker']): ?>
                      <span class="text-success">Создатель проекта</span>
                      <?php else: ?>
                      <span>Обычный пользователь</span>
                      <?php endif; ?>
                    </small>
                  </div>
                </li>
              <?php endforeach; ?>
            </ul>
        </div>
      </div>
    </div>
  </div>
</div>
