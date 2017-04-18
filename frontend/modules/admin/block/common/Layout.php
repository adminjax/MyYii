<?php
namespace frontend\modules\admin\block\common;

use frontend\modules\admin\models\layouts\header;

/**
* 
*/
class Layout
{
	public static function getLogo(){
		$header = new Header();
		$logo = $header->getLogo();
var_dump($logo);
		return $logo;
	}
}

?>