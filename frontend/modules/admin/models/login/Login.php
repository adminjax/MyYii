<?php
namespace frontend\modules\admin\models\login;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * 登录模型
 */
class Login extends ActiveRecord
{
	/**
	 * [tableName 相关表]
	 * @return [string] [表名]
	 */
	public static function tableName()
	{
		return 'admin_user';
	}
}

?>