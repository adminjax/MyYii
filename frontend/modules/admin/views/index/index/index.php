<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="admin-index-index">
	<div><span class="msg"><?php if($error){echo $error;} ?></span></div>

	<?php $form = ActiveForm::begin(['id'=>'login-form', 'action'=>['login/login/signin'], 'method'=>'post']); ?>
	    <?= $form->field($model, 'username')->label('用户名'); ?>
	    <?= $form->field($model, 'password')->passwordInput()->label('密码'); ?>
	    <?= $form->field($model, 'rememberMe')->checkbox(); ?>
	    <div class="form-group">
	     <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
	    </div>
	<?php ActiveForm::end(); ?>

</div>
