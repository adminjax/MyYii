<?php
namespace frontend\modules\admin\controllers\catalog;

use Yii;
use yii\web\Controller;
use frontend\modules\admin\models\catalog\Category;

/**
* 
*/
class CategoryController extends Controller
{
	/**
	 * [actionIndex description]
	 * @return [type] [description]
	 */
	public function actionIndex()
	{
		$this->getView()->title = "前台目录";

		//
		$Category = new Category();
		$menu = $Category->getMenu();
		$menu = $this->getMenuTree($menu);

		$this->layout='@app/modules/admin/views/layouts/top-middle-bottom.php';  
		return $this->render('index', ['menu'=>$menu]);
	}

	/**
	 * [getMenuTree description]
	 * @return [type] [description]
	 */
	protected function getMenuTree($list,$pk='menu_id',$pid='pid',$child='child',$root=0)
	{
	    $tree=array();

	    foreach($list as $key=> $val){
	        if($val[$pid]==$root){
	            //获取当前$pid所有子类 
                unset($list[$key]);
                if(! empty($list)){
                    $child=$this->getMenuTree($list,$pk,$pid,$child,$val[$pk]);
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