<?php
namespace frontend\modules\admin\controllers\dashboard;

use Yii;
use yii\web\Controller;

/**
* 控制面板
*/
class DashboardController extends Controller
{
	/**
	 * [actionIndex 控制面板入口]
	 * @return [type] [description]
	 */
	public function actionIndex(){
		
		$this->layout='@app/modules/admin/views/layouts/top-middle-bottom.php';  
		return $this->render('index');
	}
}
?>