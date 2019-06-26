<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Products of the category';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'categoryId',
        'price',
        'hidden', 
        ['class' => 'yii\grid\ActionColumn'],
    ],
]) ?>