<?php
namespace frontend\modules\admin\models\catalog;

use Yii;
use yii\db\ActiveRecord;

/**
* 
*/
class Category extends ActiveRecord
{
	/**
	 * [attributes description]
	 * @return [type] [description]
	 */
	public function attributes()
    {
		return [
			'menu_id', 
			'code',
			'pid',
			'label',
			'path',
			'sort'
	   ];
    }

	/**
	 * [tableName description]
	 * @return [type] [description]
	 */
	public static function tableName()
	{
		return 'admin_menu';//'category';
	}

	/**
	 * [getMenu description]
	 * @return [type] [description]
	 */
	public function getMenu()
	{
		$menu = $this->find()
					->where(['is_active'=>1, 'is_menu'=>1])
					->orderBy('sort ASC')
					->all();
		
		$tree = array();
		foreach ($menu as $key => $value) {
			$tree[] = $value->attributes;
		}

		return $tree;
	}
}

?>