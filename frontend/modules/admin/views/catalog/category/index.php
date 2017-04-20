<?php
use yii\helpers\Url;

?>

<div class="category-index">
	<div class="left">
		<div class="top">
			<button><span>添加根分类</span></button>
			<button><span>添加子分类</span></button>
		</div>
		<div class="category-tree">
			<div class="nav-bar">
                <ul>
                    <?php foreach ($menu as $key => $value) :?>
                        <li class="level<?php echo $value['pid'].' '.$value['code']; ?>">
                            <a href="<?= Url::toRoute($value['path']); ?>"><span><?php echo $value['label']; ?></span></a>
                            <?php if(!empty($value['child'])): ?>
                                <ul>
                                    <?php foreach($value['child'] as $ke => $val): ?>
                                        <li class="level<?php echo $val['pid'].' '.$val['code']; ?>">
                                            <a href="<?= Url::toRoute($val['path']); ?>"><span><?php echo $val['label']; ?></span></a>
                                            <?php if(!empty($val['child'])): ?>
                                                <ul>
                                                    <?php foreach($val['child'] as $k => $v): ?>
                                                        <li class="level<?php echo $v['pid'].' '.$v['code']; ?>">
                                                            <a href="<?= Url::toRoute($v['path']); ?>"><span><?php echo $v['label']; ?></span></a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
		</div>
	</div>
	<div class="main">
		
	</div>
</div>