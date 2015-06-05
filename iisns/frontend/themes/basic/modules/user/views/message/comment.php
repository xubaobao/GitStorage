<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use shiyang\infinitescroll\InfiniteScrollPager;
use app\modules\user\models\User;
use app\components\Tools;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Comment');
$this->params['breadcrumbs'][] = $this->title;
$this->params['count'] = $count;
?>
<div class="social-wrapper row">
    <div id="social-container">
        <div class="col-md-12">
            <?php foreach($user->comments['result'] as $comment): ?>
                <div class="item widget-container fluid-height social-entry">
                    <div class="widget-content padded">
                        <div class="profile-info clearfix">
                            <img width="50" height="50" class="social-avatar pull-left" src="<?= Yii::getAlias('@avatar') . $comment['avatar'] ?>" />
                            <div class="profile-details">
                                <a class="user-name" href="<?= Url::toRoute(['/user/view', 'id' =>$comment['username']]) ?>">
                                    <?= Html::encode($comment['username']) ?>
                                </a>
                                <p>
                                    <em><?= Tools::formatTime($comment['created_at']) ?></em>
                                </p>
                            </div>
                        </div>
                        <p class="content">
                            <div class="item widget-container fluid-height social-entry" style="margin:0">
                                <div class="widget-content padded">
                                    <div class="profile-info clearfix">
                                        <img width="50" height="50" class="social-avatar pull-left" src="<?= Yii::getAlias('@avatar') . $user->avatar ?>" />
                                        <div class="profile-details">
                                            <a class="user-name" href="<?= Url::toRoute(['/user/view', 'id'=>$user->username]) ?>">
                                                <?= Html::encode($user->username) ?>
                                            </a>
                                            <p>
                                                <em><?= Tools::formatTime($comment['created_at']) ?></em>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="content">
                                        <?php if (!empty($comment['title'])): ?>
                                            <h3><?= Html::a(Html::encode($comment['title']), ['/home/comment/view', 'id' => $comment['id']]) ?></h3>
                                        <?php endif ?>
                                        <?= HtmlPurifier::process($comment['content']) ?>
                                    </p>
                                </div>
                            </div>
                            <?php if (!empty($comment['title'])): ?>
                                <h3><?= Html::a(Html::encode($comment['title']), ['/home/comment/view', 'id' => $comment['id']]) ?></h3>
                            <?php endif ?>
                            <?= HtmlPurifier::process($comment['comment']) ?>
                        </p>
                        <a href="<?= Url::toRoute(['/forum/thread/view', 'id' => $comment['id']]) ?>">
                            <span class="glyphicon glyphicon-comment"></span> <?= Yii::t('app', 'Reply') ?>
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
            <?= InfiniteScrollPager::widget([
                'pagination' => $user->comments['pages'],
                'widgetId' => '.col-md-12',
            ]); ?>
        </div>
    </div>
</div>
