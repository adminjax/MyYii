<?php
namespace frontend\modules\admin\models\layouts;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
* layout的header部分
*/
class Header extends ActiveRecord
{
	public static function tableName()
	{
		return 'system_config';
	}

	/**
	 * [getLogo 获取后台header部分的logo]
	 * @return [string] [logo的URL]
	 */
	public function getLogo(){
		$this->find('system')->where(['code'=>'admin_logo'])->all();
	}

	/**
	 * [getTitle 获取获取网站标题]
	 * @return [type] [description]
	 */
	public function getTitle(){

	}

	/**
	 * [getCurrentUser 获取当前登录用户]
	 * @return [type] [description]
	 */
	public function getCurrentUser(){

	}

	/**
	 * [logout 登出]
	 * @return [void] [description]
	 */
	public function logout(){

	}

	/**
	 * [getTime 获取当前时间]
	 * @return [date] [格式化后的时间]
	 */
	public function getTime(){

	}
}

?>