<?php

use yii\helpers\Html;

const CATEGORY = 0;
const BOARD = 1;
/* @var $this yii\web\View */
/* @var $model app\modules\forum\models\Forum */

$this->title = $model->forum_name;
$this->registerMetaTag(['name' => 'keywords', 'content' => $model->forum_name]);
$this->registerMetaTag(['name' => 'description', 'content' => $model->forum_desc]);
$this->params['forum'] = $model->toArray;
?>

<div class="col-xs-12 col-sm-8 col-md-8">
    <?php if ($model->boardCount > 1): ?>
        <?= $this->render('_boards',[
            'boards'=>$model->boards,
        ]); ?>
    <?php elseif ($model->boardCount == 1 && $model->boards[0]->parent_id != CATEGORY): ?>
        <?= $this->render('/board/view', [
                    'model'=>$model->boards[0], 
                    'newThread'=>$newThread,
                ]
            );
        ?>
    <?php else: ?>
        <div class="jumbotron">
            <h2><?= Yii::t('app', 'No board!'); ?></h2>
        </div>
    <?php endif; ?>
</div>
<div class="col-xs-12 col-sm-4 col-md-4">
    <?= \shiyang\login\Login::widget(['visible' => Yii::$app->user->isGuest]); ?>
    <div class="panel panel-default">
      <div class="panel-heading">About</div>
      <div class="panel-body">
        <?= Html::encode($model->forum_desc) ?>
      </div>
    </div>
</div>
