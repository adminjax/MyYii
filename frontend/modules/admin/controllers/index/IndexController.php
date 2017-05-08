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
	public $layout = "index";

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->getView()->title = "后台登录";

    	$model = new LoginForm();
        $get = Yii::$app->request->get();
        if(array_key_exists('error', $get)){
            $error = $get['error'];
        }else{
            $error = '';
        }
    	
        return $this->render('index', ['model' => $model, 'error'=>$error]);
    }
}
