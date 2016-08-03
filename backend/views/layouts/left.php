<?php
use dektrium\user\models\profile;
?>
<aside class="main-sidebar">
    <?php if(!Yii::$app->user->isGuest){

        $rs = Profile::findOne(Yii::$app->user->identity->id);
        $photo = $rs->photo;
        $name = $rs->name;

        if ($photo) {
         $photo_new = $photo;
     }else{
        $photo_new =  $directoryAsset."/img/avatar5.png";
    }
    ?>
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="<?= $photo_new ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>
                    <?php if(!Yii::$app->user->isGuest){echo $name;}?>

                </p>

                <a href="index.php?r=user/profile/show&id=<?php echo Yii::$app->user->identity->id; ?>"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <?php if(Yii::$app->user->identity->level_login=="9"){ ?>
            <?= dmstr\widgets\Menu::widget(
                [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                ['label' => 'เมนู', 'options' => ['class' => 'header']],
                ['label' => 'Dashboard', 'url' => ['#'],'icon' => 'fa fa-dashboard'],
                ['label' => 'ห้องเรียน', 'url' => ['class-room/index'],'icon' => 'fa fa-institution'],
                ['label' => 'ตั้งค่า', 'options' => ['class' => 'header']],
                //['label' => 'ตั้งค่าวิชาเรียน', 'url' => ['branch-group/index'],'icon' => 'fa fa-book'],
                ['label' => 'ตั้งค่าหมวดหมู่วิชาเรียน', 'url' => ['branch/index'],'icon' => 'fa fa-book'],
                ['label' => 'ตั้งค่าหมวดหมู่วิดีโอ', 'url' => ['video-group/index'],'icon' => 'fa fa-video-camera'],
                //['label' => 'ตั้งค่าหมวดหมู่วิดีโอ', 'url' => ['video/index'],'icon' => 'fa fa-video-camera'],
                ['label' => 'จัดการผู้ใช้', 'url' => ['/user/admin/index'],'icon' => 'fa fa-users'],

/*                    [
                        'label' => 'รายงานและกราฟ',
                        'icon' => 'fa fa-bar-chart',
                        'url' => '#',
                        'items' => [
                            ['label' => 'รายงานรวมทั้งหมด', 'icon' => 'fa fa-indent', 'url' => '/e-mongo/web/index.php?r=request/index', 'options' => ['target' => '_blank']],
                            ['label' => 'Graph (ประเภท)', 'icon' => 'fa fa-pie-chart','url' => '/e-mongo/web/index.php?r=site/graph',],
                            ['label' => 'Graph (ช่องทาง)', 'icon' => 'fa fa-pie-chart', 'url' => '/e-mongo/web/index.php?r=site/graph1',],
                            ['label' => 'Graph (หน่วยงานที่รับผิดชอบ)', 'icon' => 'fa fa-pie-chart','url' => ['/e-mongo/web/index.php?r=site/graph2'],],
                            ['label' => 'Graph (ผู้ถูกร้องเรียน)', 'icon' => 'fa fa-pie-chart', 'url' => ['/e-mongo/web/index.php?r=site/graph3'],],
                            ['label' => 'Graph (สถานะเรื่องร้องเรียน)', 'icon' => 'fa fa-pie-chart','url' => ['/e-mongo/web/index.php?r=site/graph4'],],
                        ],
                        ],*/
                        ],
                        'encodeLabels' => false,
                        ]
                        ) ?>


              <?php } ?>
          </section>
          <?php } ?>
      </aside>
