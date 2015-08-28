<?php

use yeesoft\helpers\Html;
use yeesoft\helpers\MenuHelper;
use yeesoft\models\Menu;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yeesoft\menu\models\MenuLink */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-link-form">

    <?php
    $form = ActiveForm::begin([
        'id' => 'menu-link-form',
        'validateOnBlur' => false,
    ])
    ?>

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body">

                    <?php if ($model->isNewRecord): ?>
                        <?= $form->field($model, 'id')->textInput() ?>
                    <?php endif; ?>

                    <?= $form->field($model, 'parent_id')->dropDownList($model->getSiblings(), ['class' => 'clearfix']) ?>

                    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'order')->textInput() ?>

                </div>

            </div>
        </div>

        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <div class="form-group clearfix">
                            <label class="control-label"
                                   style="float: left; padding-right: 5px;"><?= $model->attributeLabels()['id'] ?>
                                : </label>
                            <span><?= $model->id ?></span>
                        </div>

                        <?= $form->field($model, 'alwaysVisible')->checkbox() ?>

                        <?= $form->field($model, 'menu_id')->dropDownList(Menu::getList(), ['class' => 'clearfix']) ?>

                        <?= $form->field($model, 'image')->dropDownList(MenuHelper::getIcons(), ['class' => 'clearfix glyphicon-select']) ?>

                        <div class="form-group">
                            <?php if ($model->isNewRecord): ?>
                                <?= Html::submitButton('<span class="glyphicon glyphicon-plus-sign"></span> Create', ['class' => 'btn btn-success']) ?>

                                <?= Html::a('<span class="glyphicon glyphicon-remove"></span> Cancel',
                                    ['/menu/link/index'],
                                    [
                                        'class' => 'btn btn-default',
                                    ]) ?>
                            <?php else: ?>
                                <?= Html::submitButton('<span class="glyphicon glyphicon-ok"></span> Save', ['class' => 'btn btn-primary']) ?>

                                <?= Html::a('<span class="glyphicon glyphicon-remove"></span> Delete',
                                    ['/menu/link/delete', 'id' => $model->id],
                                    [
                                        'class' => 'btn btn-default',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
