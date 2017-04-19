<?php
namespace frontend\modules\admin\block\common;

use Yii;
use frontend\modules\admin\models\layouts\header;

/**
* 
*/
class Layout
{
	/**
	 * [getLogo 获取后台logo]
	 * @return [type] [description]
	 */
	public static function getLogo()
	{
		$header = new Header();
		$logo = $header->getLogo();

		return $logo;
	}

	/**
	 * [getTitle 获取后台标题]
	 * @return [type] [description]
	 */
	public static function getTitle()
	{
		$header = new Header();
		$title = $header->getTitle();

		return $title;
	}

	/**
	 * [getCurrentUser 获取当前登录用户]
	 * @return [string] [description]
	 */
	public static function getCurrentUser()
	{
		$session = Yii::$app->session;
		return $session['user']['username'];
	}

	/**
	 * [getTime 获取当前时间]
	 * @return [date] [格式化后的时间]
	 */
	public static function getTime()
	{
		 $date = Yii::$app->formatter->asDatetime(time());

		return $date;
	}

	public static function getMenu()
	{
		$header = new Header();
		$menu = $header->getMenu();
		//var_dump($menu);
		return $menu;
	}
}

?>