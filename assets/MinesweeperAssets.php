<?php
namespace fhnw\modules\games\minesweeper\assets;
use fhnw\modules\gamecenter\assets\GameCenterAssets;
use humhub\components\assets\AssetBundle;
use yii\web\View;

/**
* The class MinesweeperAsset
*/
class MinesweeperAsset extends AssetBundle
{

  /** @var array $css */
  public $css = [
    'css/minesweeper.css'
  ];

  /** @var array $depends */
  public $depends = [
    GameCenterAssets::class
    // any additional dependencies
  ];

  /** @var array $js */
  public $js = [
    'js/minesweeper.js'
  ];

  /** @var int $jsPosition */
  public $jsPosition = View::POS_HEAD;

  /** @var array $publishOptions */
  public $publishOptions = [
    'forceCopy' => true // TODO: remove for production
  ];

  /** @var string $sourcePath */
  public $sourcePath = '@minesweeper/resources';
}
