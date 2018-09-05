<div class="row-col">
  <div class="col-sm-9 col-lg-12 light bg">
    <div class="tab-content pos-rlt">
      <div class="tab-pane active" id="tab-1">
        <div class="p-a-md b-b _600">Добавление нового проекта</div>
        <?php if($_SESSION['authorize']['specialty'] != 1): ?>
          <div class="col-md-12">
            <div class="row m-b">
              <div class="col-md-12">
                <div class="box">
                  <div class="box-header amber-600">
                    <h3>Важно знать</h3>
                    <div class="box-tool">
                      <ul class="nav">
                        <li class="nav-item inline">
                          <a class="nav-link">
                            <i class="fa fa-fw fa-chevron-up"></i>
                          </a>
                        </li>
                        <li class="nav-item inline dropdown">
                          <a class="nav-link" data-toggle="dropdown">
                            <i class="fa fa-fw fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-scale pull-right">
                            <a class="dropdown-item" href="#"><i class="fa fa-fw fa-check"></i> Я прочитал, более не показывать</a>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="box-body">
                    <p class="m-a-0">После добавления нового проекта его статус активируется как В Обработке, вы можете редактировать информацию во время модерации, но не можете перенести его в архив. Проект подтверждается управляющим звеном, менеджером, после чего назначается команда сопровождения и предоставляется доступ к проведению тестирования. Сменить URL не предстоит возможным!</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <form role="form" action="/project/add/project" method="post" class="p-a-md offset-md-1 col-md-10">
          <div class="row">
            <div class="form-group col-md-6">
              <label>Название проекта</label>
              <input type="text" name="name" placeholder="Название проекта" class="form-control">
              <small class="text-muted">Может заполняться автоматически</small>
            </div>
            <div class="form-group col-md-6 select2-bootstrap-append">
              <label>Сайт проекта</label>
              <select id="single-append-text" name="site" class="form-control select2-allow-clear form-control" data-ui-jp="select2" data-ui-options="{theme: 'bootstrap'}">
                <optgroup label="Ваши сайты">
                  <?php foreach ($vars['sites'] as $site): ?>
                  <option value="<?= $site['id']; ?>"><?= $site['name']; ?></option>
                  <?php endforeach; ?>
                </optgroup>
              </select>
              <small class="text-muted">Нельзя изменить при редактировании проекта</small>
            </div>
            <div class="form-group col-md-6">
              <label>Менеджер проекта</label>
              <select name="manager" class="form-control">
                <?php if(sizeof($vars['managers']) > 0): ?>
                  <?php foreach ($vars['managers'] as $manager): ?>
                      <option value="<?= $manager['id']; ?>"><?= $manager['name'].' '.$manager['surname']; ?></option>
                  <?php endforeach; ?>
                <?php else: ?>
                  <option>-</option>
                <?php endif; ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label>Проект открыл:</label>
              <input type="text" hidden name="user" value="<?= $_SESSION['authorize']['id']; ?>">
              <input type="text" readonly placeholder="Участник проекта" value="<?= $_SESSION['authorize']['username']; ?>" class="form-control">
            </div>
          </div>

          <button type="submit" name="edit_profile" class="btn btn-info m-t pull-right">Добавить</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
