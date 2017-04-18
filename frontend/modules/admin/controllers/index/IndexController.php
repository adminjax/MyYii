<?php
namespace frontend\modules\admin\controllers\index;

use Yii;
use yii\web\Controller;
use frontend\modules\admin\models\index\LoginForm;

/**
 * 后台登录入口
 */
class IndexController extends Controller
{
	public $layouts = "index";

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	$model = new LoginForm();
        $get = Yii::$app->request->get();
        if(array_key_exists('error', $get)){
            $error = $get['error'];
        }else{
            $error = '';
        }

    	$this->layout='@app/modules/admin/views/layouts/top-middle-bottom.php';  
        return $this->render('index', ['model' => $model, 'error'=>$error]);
    }
}
