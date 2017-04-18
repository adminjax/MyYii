<?php
namespace frontend\modules\admin\controllers\common;

use Yii;
use yii\web\Controller;
use frontend\modules\admin\models\layouts;

/**
* 
*/
class LayoutController extends Controller
{


	public static function getLogo(){
		$header = new Header();
		$logo = $header->getLogo();

		return $logo;
	}
}

?>