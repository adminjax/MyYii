<?php
namespace frontend\modules\admin\models\layouts;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
* layout的header部分
*/
class Header extends ActiveRecord
{
	protected $menu;

	/**
	 * [tableName description]
	 * @return [type] [description]
	 */
	public static function tableName()
	{
		return 'system_config';
	}

	/**
	 * [getLogo 获取后台header部分的logo]
	 * @return [string] [logo的URL]
	 */
	public function getLogo(){
		$url = $this->find()
					->select('value')
					->where(['code'=>'admin_logo'])
					->one();

		return $url->value;
	}

	/**
	 * [getTitle 获取获取网站标题]
	 * @return [type] [description]
	 */
	public function getTitle(){
		$url = $this->find()
					->select('value')
					->where(['code'=>'admin_title'])
					->one();

		return $url->value;
	}

	/**
	 * [getMenu description]
	 * @return [type] [description]
	 */
	public function getMenu($pid=0){
		$menu = (new \yii\db\Query())
			    ->select(['menu_id', 'code', 'level', 'label', 'path', 'sort'])
			    ->from('admin_menu')
			    ->where(['is_active'=>1, 'is_menu'=>1, 'level'=>$pid])
			    ->orderBy('sort ASC')
			    ->all();

		$menu = $this->setMenuFormat($menu, 0);

		var_dump($this->menu);
		return $menu;
	}

	protected function setMenuFormat($arr,$id)
	{
	      $tree = array();
		    foreach($arr as $v) {
		       if($v['menu_id']==$id) {
		           $tree[] = $v;
		           if($v['level']>0) {
		           
		             $tree = array_merge($tree,familyclass2($arr,$v['level']));
		           }
		       }
		    }//foreach end

		   return $tree;
	}
}

?>