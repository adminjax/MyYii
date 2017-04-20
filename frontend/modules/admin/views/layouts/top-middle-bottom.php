<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

use yii\helpers\Url;
//customer
use frontend\modules\admin\block\common\Layout;

AppAsset::register($this);
?> 
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?=Html::cssFile('@web/skin/admin/css/web.css')?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap index">
    <div class="container">
        <div class="header">
            <div class="header-top">
                <div class="left">
                    <div class="logo"><img src="<?php echo Layout::getLogo(); ?>" /></div>
                    <div class="title"><?php echo Layout::getTitle(); ?></div>
                </div>
                <div class="right">
                    <div class="user"><?php echo Layout::getCurrentUser(); ?></div>
                    <div class="time"><?php echo Layout::getTime(); ?></div>
                    <div class="logout"><a href="<?= Url::toRoute('login/login/logout'); ?>"><span>退出</span></a></div>
                </div>
            </div>
            <div class="nav-bar">
                <ul>
                    <?php foreach (Layout::getMenu() as $key => $value) :?>
                        <li class="level<?php echo $value['pid'].' '.$value['code']; ?>">
                            <a href="<?= Url::toRoute($value['path']); ?>"><span><?php echo $value['label']; ?></span></a>
                            <?php if(!empty($value['child'])): ?>
                                <ul>
                                    <?php foreach($value['child'] as $ke => $val): ?>
                                        <li class="level<?php echo $val['pid'].' '.$val['code']; ?>">
                                            <a href="<?= Url::toRoute($val['path']); ?>"><span><?php echo $val['label']; ?></span></a>
                                            <?php if(!empty($val['child'])): ?>
                                                <ul>
                                                    <?php foreach($val['child'] as $k => $v): ?>
                                                        <li class="level<?php echo $v['pid'].' '.$v['code']; ?>">
                                                            <a href="<?= Url::toRoute($v['path']); ?>"><span><?php echo $v['label']; ?></span></a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div> 

        
        <div class="middle">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>