<?php

/**
 * @var \humhub\modules\ui\view\components\View $this
 */

use fhnw\modules\games\minesweeper\assets\MinesweeperAssets;
use fhnw\modules\games\minesweeper\MinesweeperModule;

MinesweeperAssets::register($this);

$module = MinesweeperModule::getInstance();
$game = $module->getGame();

$this->registerCss('minesweeper');

$this->registerJsConfig('minesweeper', []);
?>

<div class="container">
  <!-- -->
</div>
