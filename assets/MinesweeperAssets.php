<?php

namespace fhnw\modules\games\minesweeper\assets;

use fhnw\modules\gamecenter\assets\GameCenterAssets;
use fhnw\modules\gamecenter\components\GameAssets;

/**
 * The class MinesweeperAsset
 */
class MinesweeperAssets extends GameAssets
{

  /** @var array $css */
  public $css = [
      'css/minesweeper.css'
  ];

  /** @var array $depends */
  public $depends = [
      GameCenterAssets::class,
      P5Assets::class
  ];

  /** @var array $js */
  public $js = [
      'js/minesweeper.js'
  ];

  /** @var array $publishOptions */
  public $publishOptions = [
      'forceCopy' => true // TODO: remove for production
  ];

  /** @var string $sourcePath */
  public $sourcePath = '@minesweeper/resources';

}
