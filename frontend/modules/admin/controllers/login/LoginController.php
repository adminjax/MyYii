<?php
namespace frontend\modules\admin\controllers\login;

use Yii;
use yii\web\Controller;
use frontend\modules\admin\models\index\LoginForm;
use frontend\modules\admin\models\login\Login;

/**
* 登录控制器
*/
class LoginController extends Controller
{
	/**
	 * [actionSignin 后台用户登录]
	 * @return [type] [description]
	 */
	public function actionSignin(){
		$model = new LoginForm();

		if ($model->load(\Yii::$app->request->post()) && $model->validate()) { // 验证 $model 收到的数据
            //获取post数据
            $post = Yii::$app->request->post();
            //查询数据
            $data = Login::find()->where(['username'=>$post['LoginForm']['username'],'password'=>md5($post['LoginForm']['password'])])->one();
            
            if($data){
                $session = Yii::$app->session;
                $session['user'] = ['user_id'=>$data->u_id, 'username'=>$data->username];
            	//如果成功跳转到控制面板
            	$this->redirect(['/admin/dashboard/dashboard/index']);
            }else{
            	//如果失败跳转到后台入口
            	$this->redirect(['/admin/index/index/index', 'error'=>'输入错误，请检查！']);
            }
        } else { // 无论是初始化显示还是数据验证错误
            $error = $model->getErrors();
            $this->redirect(['/admin/index/index/index', 'error'=>$error]);
        }
	}

    /**
     * [logout 登出]
     * @return [void] [description]
     */
    public function actionLogout()
    {
        //注销用户session
        $session = Yii::$app->session;
        unset($session['user']);

        if(!$session['user']){
            $this->redirect(['/admin/index/index/index']);
        }
    }
}
?>