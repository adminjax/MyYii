<?php
namespace frontend\modules\admin\models\index;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
	public $username;
	public $password;
	public $rememberMe = false;

	public function rules()
	{
		return [
			[['username'], 'required', 'message'=>'请输入用户名！'],
			[['password'], 'required', 'message'=>'请输入密码！'],
			[['username'], 'string', 'min'=>6, 'max'=>12, 'message'=>'请输入6到12个字符！'],
			['rememberMe', 'boolean']
		];
	}
}


?>