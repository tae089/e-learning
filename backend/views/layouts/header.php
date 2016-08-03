<?php
use yii\helpers\Html;
use dektrium\user\models\User;
use dektrium\user\models\profile;
/* @var $this \yii\web\View */
/* @var $content string */
$global_dept = \Yii::$app->params['global_dept'];
if (!Yii::$app->user->isGuest) {
$link_id = 'index.php?r=user/profile/show&id='.Yii::$app->user->identity->id;
}else{
    $link_id = '#';
}
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg"><i class="fa fa-graduation-cap"></i> '.$global_dept.'</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            &nbsp;&nbsp;
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <?php
                if(!Yii::$app->user->isGuest){

                $rs = Profile::findOne(Yii::$app->user->identity->id);
                $photo = $rs->photo;
                $name = $rs->name;

                if ($photo) {
                   $photo_new = $photo;
                }else{
                    $photo_new =  $directoryAsset."/img/avatar5.png";
                }

                 ?>
                    <!-- Messages: style can be found in dropdown.less-->


    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= $photo_new ?>" class="user-image" alt="User Image"/>
            <span class="hidden-xs">
                <?php if(!Yii::$app->user->isGuest){echo $name;}?>
            </span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                <img src="<?= $photo_new ?>" class="img-circle"
                alt="User Image"/>

                <p>
                   <?php if(!Yii::$app->user->isGuest){echo $name;}?>
                </p>
            </li>
            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <a href="index.php?r=user/settings/account" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <?= Html::a(
                        'Sign out',
                                    //['/site/logout'],
                        ['/user/security/logout'],
                        ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                        ) ?>
                </div>
            </li>
        </ul>
    </li>

    <!-- User Account: style can be found in dropdown.less -->
    <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
    </li>
</ul>
<?php }else{ ?>
    <li>
      <a href="index.php?r=user/security/login">
        <i class="fa fa-lock text-white"></i> Login
    </a>
</li>
<?php } ?>
</div>
</nav>
</header>
