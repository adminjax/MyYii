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
	public function getLogo()
	{
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
	public function getTitle()
	{
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
	public function getMenu()
	{
		$menu = (new \yii\db\Query())
			    ->select(['menu_id', 'code', 'pid', 'label', 'path', 'sort'])
			    ->from('admin_menu')
			    ->where(['is_active'=>1, 'is_menu'=>1])
			    ->orderBy('sort ASC')
			    ->all();

		$menu = $this->makeMenuTree($menu);

		return $menu;
	}

	/**
	 * [makeMenuTree 生成menu树状结构]
	 * @param  [type]  $list  [description]
	 * @param  string  $pk    [description]
	 * @param  string  $pid   [description]
	 * @param  string  $child [description]
	 * @param  integer $root  [description]
	 * @return [type]         [description]
	 */
	protected function makeMenuTree($list,$pk='menu_id',$pid='pid',$child='child',$root=0)
	{
	    $tree=array();

	    foreach($list as $key=> $val){
	        if($val[$pid]==$root){
	            //获取当前$pid所有子类 
                unset($list[$key]);
                if(! empty($list)){
                    $child=$this->makeMenuTree($list,$pk,$pid,$child,$val[$pk]);
                    if(!empty($child)){
                        $val['child']=$child;
                    }                   
                }              
                $tree[]=$val; 
	        }
	    }   

	    return $tree;
	}
}

?>