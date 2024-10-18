<?php

use backend\models\Department;
use backend\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Company $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(User::find()->all(), 'id', fn($user) => $user->first_name . " " . $user->last_name),
        ['prompt' => 'Select the user']
    ) ?>

    <?= $form->field($model, 'user_id')->label('Department name')->dropDownList(
        ArrayHelper::map(Department::find()->all(), 'id', 'name'),
        ['prompt' => 'Select the Department name']
    ) ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'created_at')->widget(
        DatePicker::classname(),
        [
            'language' => 'en',
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control'],
        ],
    ); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>