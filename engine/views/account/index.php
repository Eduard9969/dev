<div class="item white bg">
  <!-- <div class="item-bg">
    <img src="/templ/images/a2.jpg" class="blur opacity-3">
  </div> -->
  <div class="p-a-md">
    <div class="row m-t">
      <div class="col-sm-7">
        <a href="#" class="pull-left m-r-md">
          <div class="inline text-center">
            <span class="avatar w-110 <?= $vars['profile_social'][0]['color_select']; ?> text-3x">
              <?= substr(strtoupper($vars['profile'][0]['username']), 0, 1); ?>
              <!-- <i class="on b-white"></i> -->
            </span>
        </div>
        </a>
        <div class="clear m-b">
          <h4 class="m-a-0 m-b-sm">
            <?php
              if(!empty($vars['profile'][0]['name']) or !empty($vars['profile'][0]['surname'])) {
                echo $vars['profile'][0]['name'].' '.$vars['profile'][0]['surname'];
              }
              else {
                echo $vars['profile'][0]['username'];
              }
            ?>
          </h4>
          <p class="text-muted">
            <span class="m-r">
              <?
                if(!empty($vars['profile'][0]['specialty'])) {
                  echo $vars['profile'][1]['name'];
                }
                else {
                  echo "Род деятельности неизвестен";
                }
              ?>
            </span>
            <?php
              if($vars['profile_access'][0]['access'] == 1) {
                $access_ico = 'fa-check';
                $access_color = 'success';
                $access_text = 'Подтвержден';
              }
              else {
                $access_ico = 'fa-close';
                $access_color = 'warning';
                $access_text = 'Не подтвержден';
              }
            ?>
            <small class="text-<?= $access_color; ?>" title="Статус аккаунта">
              <i class="fa <?= $access_ico; ?> m-r-xs"></i><?= $access_text; ?>
            </small>
          </p>
          <div class="block clearfix m-b">
            <?php if(!empty($vars['profile_social'][0]['facebook'])): ?>
            <a href="https://www.facebook.com/<?= $vars['profile_social'][0]['facebook']; ?>" title="Страница Facebook" class="btn btn-icon btn-social rounded b-a btn-sm">
              <i class="fa fa-facebook"></i>
              <i class="fa fa-facebook indigo"></i>
            </a>
            <?php endif; ?>
            <?php if(!empty($vars['profile_social'][0]['twitter'])): ?>
            <a href="https://twitter.com/<?= $vars['profile_social'][0]['twitter']; ?>" title="Страница Twitter" class="btn btn-icon btn-social rounded b-a btn-sm">
              <i class="fa fa-twitter"></i>
              <i class="fa fa-twitter light-blue"></i>
            </a>
            <?php endif; ?>
            <?php if(!empty($vars['profile_social'][0]['google'])): ?>
            <a href="https://plus.google.com/<?= $vars['profile_social'][0]['google']; ?>" title="Страница Google+" class="btn btn-icon btn-social rounded b-a btn-sm">
              <i class="fa fa-google-plus"></i>
              <i class="fa fa-google-plus red"></i>
            </a>
            <?php endif; ?>
            <?php if(!empty($vars['profile_social'][0]['linkedin'])): ?>
            <a href="https://www.linkedin.com/in/<?= $vars['profile_social'][0]['linkedin']; ?>" title="Страница LinkedIn" class="btn btn-icon btn-social rounded b-a btn-sm">
              <i class="fa fa-linkedin"></i>
              <i class="fa fa-linkedin cyan-600"></i>
            </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-sm-5">
        <p class="text-md profile-status" id="status_text">
          <?php
            if($vars['profile'][0]['status_text']) {
              echo $vars['profile'][0]['status_text'];
            }
            else {
              echo "#SEOProOneLOVE";
            }
          ?>
        </p>

        <?php if($_SESSION['authorize']['id'] == $vars['profile'][0]['id']): ?>
        <button onclick="edit_status()" class="btn btn-sm rounded btn-outline b-success" data-toggle="collapse" data-target="#editor">Редактировать</button>
        <div class="collapse box m-t-sm" id="editor">
          <textarea class="form-control no-border" rows="2" placeholder="Ваш статус (не более 50 символов)"></textarea>
        </div>

        <script>
          function edit_status() {
            var id_status = $('#editor textarea')
                status = id_status.val();

            if(status != '') {
              var request = $.ajax({
                type: "POST",
                url: "/account/<?= $vars['profile'][0]['id']; ?>",
                data: {id: <?= $vars['profile'][0]['id']; ?>, text: status},
                dataType: "html"
              })

              request.done(function( msg ) {
                id_status.val('');
                $("#status_text").html(msg);
              });
            }
          }
        </script>
      <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<div class="white bg b-b p-x">
  <div class="row">
    <div class="col-sm-6 push-sm-6">
      <div class="p-y text-center text-sm-right">
        <!-- <a href="#" class="inline p-x text-center">
          <span class="h4 block m-a-0">2k</span>
          <small class="text-xs text-muted">Followers</small>
        </a>-->
        <?php if(sizeof($vars['profile_groups']) != 0): ?>
        <a href="#" class="inline p-x b-l b-r text-center">
          <span class="h4 block m-a-0"><?= count($vars['profile_groups']); ?></span>
          <small class="text-xs text-muted">Проектов</small>
        </a>
        <?php endif; ?>
        <a href="#" class="inline p-x text-center">
          <span class="h4 block m-a-0"><?= floor($vars['howGet'] / (60 * 60 * 24)); ?></span>
          <small class="text-xs text-muted">Дней с нами</small>
        </a>
      </div>
    </div>
    <div class="col-sm-6 pull-sm-6">
      <div class="p-y-md clearfix nav-active-info">
        <ul class="nav nav-pills nav-sm">
          <li class="nav-item"  >
            <a class="nav-link disabled" >Сообщество</a>
          </li>
          <li class="nav-item" >
            <a class="nav-link disabled" >Активность</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" >Друзья</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_4">Профиль</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="padding">
  <div class="row">
    <?php if($_SESSION['authorize']['id'] == $vars['profile'][0]['id']): ?>
    <?php if($vars['profile_access'][0]['access'] != 1): ?>
    <div class="col-sm-12">
      <div class="box-color white pos-rlt">

        <div class="box-body">
<div class="row"><div class="col-sm-10">Ваш email не подтвержден. Просьба воспользуйтесь почтой и подтвердите свою личность!<br>
В случае, если письмо не пришло - проверьте папку Спам или повторите отправку.</div>
<div class="col-sm-2"><button class="btn btn-outline b-success text-success">Отправить ещё раз</button></div></div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php endif; ?>
    <div class="col-sm-8 col-lg-9">
      <div class="tab-content">
        <div class="tab-pane p-v-sm" id="tab_1">
          <div class="streamline m-b">
            <div class="sl-item">
              <div class="sl-left">
                <img src="/templ/images/a0.jpg" class="img-circle">
              </div>
              <div class="sl-content">
                <div class="sl-date text-muted">2 minutes ago</div>
                <div class="sl-author">
                  <a href="#">Peter Joo</a>
                </div>
                <div>
                  <p>Check your Internet connection</p>
                </div>
                <div class="sl-footer">
                  <a href="#" data-ui-toggle-class class="btn white btn-xs">
                    <i class="fa fa-fw fa-star-o text-muted inline"></i>
                    <i class="fa fa-fw fa-star text-danger none"></i>
                  </a>
                  <a href="#" class="btn white btn-xs" data-toggle="collapse" data-target="#reply-1">
                    <i class="fa fa-fw fa-mail-reply text-muted"></i>
                  </a>
                </div>
                <div class="box collapse m-a-0" id="reply-1">
                  <form>
                    <textarea class="form-control no-border" rows="3" placeholder="Type something..."></textarea>
                  </form>
                  <div class="box-footer clearfix">
                    <button class="btn btn-info pull-right btn-sm">Post</button>
                    <ul class="nav nav-pills nav-sm">
                      <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-camera text-muted"></i></a></li>
                      <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-video-camera text-muted"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-left">
                <img src="/templ/images/a1.jpg" class="img-circle">
              </div>
              <div class="sl-content">
                <div class="sl-date text-muted">9:30</div>
                <div class="sl-author">
                  <a href="#">Mike</a>
                </div>
                <div>
                  <p>Meeting with tech leader</p>
                </div>
                <div class="sl-footer">
                  <a href="#" data-ui-toggle-class class="btn white btn-xs">
                    <i class="fa fa-fw fa-star-o text-muted inline"></i>
                    <i class="fa fa-fw fa-star text-danger none"></i>
                  </a>
                  <a href="#" class="btn white btn-xs" data-toggle="collapse" data-target="#reply-2">
                    <i class="fa fa-fw fa-mail-reply text-muted"></i>
                  </a>
                </div>
                <div class="box collapse in m-a-0" id="reply-2">
                  <form>
                    <textarea class="form-control no-border" rows="3" placeholder="Type something..."></textarea>
                  </form>
                  <div class="box-footer clearfix">
                    <button class="btn btn-info pull-right btn-sm">Post</button>
                    <ul class="nav nav-pills nav-sm">
                      <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-camera text-muted"></i></a></li>
                      <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-video-camera text-muted"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-left">
                <img src="/templ/images/a2.jpg" class="img-circle">
              </div>
              <div class="sl-content">
                <div class="sl-date text-muted">8:30</div>
                <div class="sl-author">
                  <a href="#">Moke</a>
                </div>
                <div>
                  <p>Call to customer <a href="#" class="text-info">Jacob</a> and discuss the detail.</p>
                </div>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-left">
                <img src="/templ/images/a3.jpg" class="img-circle">
              </div>
              <div class="sl-content">
                <div class="sl-date text-muted">Wed, 25 Mar</div>
                <p>Finished task <a href="#" class="text-info">Testing</a>.</p>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-left">
                <img src="/templ/images/a4.jpg" class="img-circle">
              </div>
              <div class="sl-content">
                <div class="sl-date text-muted">Thu, 10 Mar</div>
                <p>Trip to the moon</p>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-left">
                <img src="/templ/images/a3.jpg" class="img-circle">
              </div>
              <div class="sl-content">
                <div class="sl-date text-muted">Sat, 5 Mar</div>
                <p>Prepare for presentation</p>
                <blockquote>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante soe aiea ose dos soois.</p>
                  <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                </blockquote>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-left">
                <img src="/templ/images/a2.jpg" class="img-circle">
              </div>
              <div class="sl-content">
                <div class="sl-date text-muted">Sun, 11 Feb</div>
                <p><a href="#" class="text-info">Jessi</a> assign you a task <a href="#" class="text-info">Mockup Design</a>.</p>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-left">
                <img src="/templ/images/a5.jpg" class="img-circle">
              </div>
              <div class="sl-content">
                <div class="sl-date text-muted">Thu, 17 Jan</div>
                <p>Follow up to close deal</p>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane p-v-sm" id="tab_2">
          <div class="streamline">
            <div class="sl-item">
              <div class="sl-content">
                <div class="sl-date text-muted">2 minutes ago</div>
                <p>Check your Internet connection</p>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-content">
                <div class="sl-date text-muted">9:30</div>
                <p>Meeting with tech leader</p>
              </div>
            </div>
            <div class="sl-item b-success">
              <div class="sl-content">
                <div class="sl-date text-muted">8:30</div>
                <p>Call to customer <a href="#" class="text-info">Jacob</a> and discuss the detail.</p>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-content">
                <div class="sl-date text-muted">Wed, 25 Mar</div>
                <p>Finished task <a href="#" class="text-info">Testing</a>.</p>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-content">
                <div class="sl-date text-muted">Thu, 10 Mar</div>
                <p>Trip to the moon</p>
              </div>
            </div>
            <div class="sl-item b-info">
              <div class="sl-content">
                <div class="sl-date text-muted">Sat, 5 Mar</div>
                <p>Prepare for presentation</p>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-content">
                <div class="sl-date text-muted">Sun, 11 Feb</div>
                <p><a href="#" class="text-info">Jessi</a> assign you a task <a href="#" class="text-info">Mockup Design</a>.</p>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-content">
                <div class="sl-date text-muted">Thu, 17 Jan</div>
                <p>Follow up to close deal</p>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane p-v-sm" id="tab_3">
            <div class="row row-sm">
              <div class="col-xs-6 col-lg-4">
                <div class="list-item box r m-b">
                  <a herf class="list-left">
                    <span class="w-40 avatar">
                      <img src="/templ/images/a0.jpg" alt="...">
                      <i class="on b-white bottom"></i>
                    </span>
                  </a>
                  <div class="list-body">
                    <div class="text-ellipsis"><a href="#">Crystal Guerrero</a></div>
                    <small class="text-muted text-ellipsis">Designer, Blogger</small>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-4">
                <div class="list-item box r m-b">
                  <a herf="" class="list-left">
                    <span class="w-40 avatar">
                      <img src="/templ/images/a1.jpg" alt="...">
                      <i class="on b-white bottom"></i>
                    </span>
                  </a>
                  <div class="list-body">
                    <div class="text-ellipsis"><a href="#">James Garcia</a></div>
                    <small class="text-muted text-ellipsis">Writter, Mag Editor</small>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-4">
                <div class="list-item box r m-b">
                  <a herf="" class="list-left">
                    <span class="w-40 avatar">
                      <img src="/templ/images/a2.jpg" alt="...">
                      <i class="away b-white bottom"></i>
                    </span>
                  </a>
                  <div class="list-body">
                    <div class="text-ellipsis"><a href="#">Jean Schneider</a></div>
                    <small class="text-muted text-ellipsis">Designer, Blogger</small>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-4">
                <div class="list-item box r m-b">
                  <a herf="" class="list-left">
                    <span class="w-40 avatar">
                      <img src="/templ/images/a3.jpg" alt="...">
                      <i class="busy b-white bottom"></i>
                    </span>
                  </a>
                  <div class="list-body">
                    <div class="text-ellipsis"><a href="#">Joe Holmes</a></div>
                    <small class="text-muted text-ellipsis">Designer, Blogger</small>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-4">
                <div class="list-item box r m-b">
                  <a herf="" class="list-left">
                    <span class="w-40 avatar">
                      <img src="/templ/images/a4.jpg" alt="...">
                      <i class="on b-white bottom"></i>
                    </span>
                  </a>
                  <div class="list-body">
                    <div class="text-ellipsis"><a href="#">Judith Garcia</a></div>
                    <small class="text-muted text-ellipsis">Writter, Mag Editor</small>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-4">
                <div class="list-item box r m-b">
                  <a herf="" class="list-left">
                    <span class="w-40 avatar">
                      <img src="/templ/images/a5.jpg" alt="...">
                      <i class="on b-white bottom"></i>
                    </span>
                  </a>
                  <div class="list-body">
                    <div class="text-ellipsis"><a href="#">Judy Woods</a></div>
                    <small class="text-muted text-ellipsis">Designer, Blogger</small>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-4">
                <div class="list-item box r m-b">
                  <a herf="" class="list-left">
                    <span class="w-40 avatar">
                      <img src="/templ/images/a6.jpg" alt="...">
                      <i class="on b-white bottom"></i>
                    </span>
                  </a>
                  <div class="list-body">
                    <div class="text-ellipsis"><a href="#">OlsJesse Russell</a></div>
                    <small class="text-muted text-ellipsis">Designer, Blogger</small>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-4">
                <div class="list-item box r m-b">
                  <a herf="" class="list-left">
                    <span class="w-40 avatar">
                      <img src="/templ/images/a7.jpg" alt="...">
                      <i class="away b-white bottom"></i>
                    </span>
                  </a>
                  <div class="list-body">
                    <div class="text-ellipsis"><a href="#">Richard Carr</a></div>
                    <small class="text-muted text-ellipsis">Writter, Mag Editor</small>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-4">
                <div class="list-item box r m-b">
                  <a herf="" class="list-left">
                    <span class="w-40 avatar">
                      <img src="/templ/images/a8.jpg" alt="...">
                      <i class="busy b-white bottom"></i>
                    </span>
                  </a>
                  <div class="list-body">
                    <div class="text-ellipsis"><a href="#">Sara King</a></div>
                    <small class="text-muted text-ellipsis">Designer, Blogger</small>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-4">
                <div class="list-item box r m-b">
                  <a herf="" class="list-left">
                    <span class="w-40 circle amber avatar">
                      D
                      <i class="busy b-white bottom"></i>
                    </span>
                  </a>
                  <div class="list-body">
                    <div class="text-ellipsis"><a href="#">Douglas Torres</a></div>
                    <small class="text-muted text-ellipsis">Blogger</small>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-4">
                <div class="list-item box r m-b">
                  <a herf="" class="list-left">
                    <span class="w-40 circle blue">
                      J
                    </span>
                  </a>
                  <div class="list-body">
                    <div class="text-ellipsis"><a href="#">Jeremy Scott</a></div>
                    <small class="text-muted text-ellipsis">Blogger</small>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-4">
                <div class="list-item box r m-b">
                  <a herf="" class="list-left">
                    <span class="w-40 circle green">M</span>
                  </a>
                  <div class="list-body">
                    <div class="text-ellipsis"><a href="#">Melissa Garza</a></div>
                    <small class="text-muted text-ellipsis">Blogger</small>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="tab-pane p-v-sm active" id="tab_4">
          <div class="row m-b">
            <div class="col-xs-6">
              <small class="text-muted">Имя Фамилия</small>
              <div class="_500">
                <?php
                  if(!empty($vars['profile']['profile'][0]['name']) or !empty($vars['profile'][0]['surname'])) {
                    echo $vars['profile'][0]['name'].' '.$vars['profile'][0]['surname'];
                  }
                  else {
                    echo "Не заполнено";
                  }
                ?>
              </div>
            </div>
            <div class="col-xs-6">
              <small class="text-muted">Дата регистрации</small>
              <div class="_500"><?= date("d.m.y", $vars['profile_access'][0]['reg_day']); ?></div>
            </div>
          </div>
          <div class="row m-b">
            <?php if(!empty($vars['profile'][0]['email'])): ?>
            <div class="col-xs-6">
              <small class="text-muted">Email</small>
              <div class="_500"><?= $vars['profile'][0]['email']; ?></div>
            </div>
            <?php endif; ?>
            <div class="col-xs-6">
              <small class="text-muted">Номер Телефона</small>
              <div class="_500">
                <?php
                  if(!empty($vars['profile'][0]['phone'])) {
                    echo $vars['profile'][0]['phone'];
                  }
                  else {
                    echo "Не указано";
                  }
                ?>
              </div>
            </div>
          </div>
          <div class="row m-b">
            <?php if(!empty($vars['profile'][0]['specialty'])): ?>
            <div class="col-xs-6">
              <small class="text-muted">Специальность</small>
              <div class="_500"><?= $vars['profile'][1]['name']; ?></div>
            </div>
            <?php endif; ?>
            <div class="col-xs-6">
              <small class="text-muted">Пригласил Менеджер</small>
              <div class="_500">
                <?php
                  if(!empty($vars['profile'][0]['ref'])) {
                    echo $vars['profile'][0]['ref'];
                  }
                  else {
                    echo '-';
                  }
                ?>
              </div>
            </div>
          </div>
          <?php if(!empty($vars['profile'][0]['about_text'])): ?>
          <div>
            <small class="text-muted">Пару слов о себе</small>
            <div><?= $vars['profile'][0]['about_text']; ?></div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-lg-3">
      <div>
        <div class="box">
            <div class="box-header">
              <h3>
                <?php if ($vars['profile'][0]['specialty'] != 1): ?>
                  Участник проектов:
                <?php else: ?>
                  Куратор проектов:
                <?php endif; ?>

              </h3>
            </div>
            <div class="box-divider m-a-0"></div>
            <ul class="list no-border p-b">
              <?php if(sizeof($vars['profile_groups']) != 0): ?>
              <?php foreach ($vars['profile_groups'] as $group): ?>
                <li class="list-item">
                  <a href="/project/<?= $group[0]['id']; ?>" class="list-left">
                    <span class="w-40 avatar b-a b-2x lter">
                      <span>G<?= $group[0]['id']; ?></span>
                    </span>
                  </a>
                  <div class="list-body">
                    <div><a href="/project/<?= $group[0]['id']; ?>"><?= $group[0]['name']; ?></a></div>
                    <small class="text-muted text-ellipsis">
                      <?php if ($group[0]['members'] == 1): ?>
                        <?= $group[0]['members']; ?> участник
                      <?php elseif($group[0]['members'] > 1 and $group[0]['members'] < 10): ?>
                        <?= $group[0]['members']; ?> участника
                      <?php else: ?>
                        <?= $group[0]['members']; ?> участников
                      <?php endif; ?>
                    </small>
                  </div>
                </li>
              <?php endforeach; ?>
              <?php else: ?>
                <li class="list-item text-center">
                  <small class="block text-muted">Пользователь не принимает участия в разработках проектов</small>
                </li>
              <?php endif; ?>
            </ul>
        </div>
        <?php if (sizeof($vars['social_twitter']) != 0): ?>
         <div class="box">
          <div class="box-body">
            <a href="#" class="pull-left m-r">
              <span class="avatar w-40 <?= $vars['profile_social'][0]['color_select']; ?>"><?= substr(strtoupper($vars['profile'][0]['username']), 0, 1); ?></span>
            </a>
            <div class="clear">
              <a href="https://twitter.com/<?= $vars['social_twitter']['screen_name']; ?>">
                <?= $vars['social_twitter']['name']; ?>
                <small class="block">@<?= $vars['social_twitter']['screen_name']; ?></small>
              </a>
              <small class="block text-muted"><?= $vars['social_twitter']['formatted_followers_count']; ?></small>

              <a href="https://twitter.com/<?= $vars['social_twitter']['screen_name']; ?>" class="btn btn-sm btn-rounded btn-info m-t-sm"><i class="fa fa-twitter m-t-xs"></i> Follow</a>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <!--<div class="box">
          <div class="box-header">
            <h2>Latest Tweets</h2>
          </div>
          <div class="box-divider m-a-0"></div>
          <ul class="list">
            <li class="list-item">
              <div class="list-body">
                <p>Wellcome <a href="#" class="text-info">@Drew Wllon</a> and play this web application template, have fun1 </p>
                <small class="block text-muted"><i class="fa fa-fw fa-clock-o"></i> 2 minuts ago</small>
              </div>
            </li>
            <li class="list-item">
              <div class="list-body">
                <p>Morbi nec <a href="#" class="text-info">@Jonathan George</a> nunc condimentum ipsum dolor sit amet, consectetur</p>
                <small class="block text-muted"><i class="fa fa-fw fa-clock-o"></i> 1 hour ago</small>
              </div>
            </li>
            <li class="list-item">
              <div class="list-body">
                <p><a href="#" class="text-info">@Josh Long</a> Vestibulum ullamcorper sodales nisi nec adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis</p>
                <small class="block text-muted"><i class="fa fa-fw fa-clock-o"></i> 2 hours ago</small>
              </div>
            </li>
          </ul>
        </div> -->
      </div>
    </div>
  </div>
</div>
