<?php

/**
 * @var View $this
 */

use fhnw\modules\games\minesweeper\assets\MinesweeperAssets;
use fhnw\modules\games\minesweeper\MinesweeperModule;
use humhub\modules\ui\view\components\View;

MinesweeperAssets::register($this);

$module = MinesweeperModule::getInstance();
$game = $module->getGame();

$this->registerCss('minesweeper');

$this->registerJsConfig(
    'minesweeper',
    [
        'assetUrl' => $module->getAssetsUrl(),
        'player'   => Yii::$app->user->id
    ]
);
?>

<div class="container" id="minesweeper"></div>
