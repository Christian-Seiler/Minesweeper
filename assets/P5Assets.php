<?php

namespace fhnw\modules\games\minesweeper\assets;

use fhnw\modules\gamecenter\components\GameAssets;

/**
 * @package @Minesweeper/Assets
 */
class P5Assets extends GameAssets
{

  private const FILES = [
      'p5',
      'addons/p5.sound'
  ];

  /** @var string[] $jsProd */
  public $jsProd = [];

  /** @return void */
  public function init(): void
  {
    $version = '1.6.0';

    foreach (self::FILES as $file) {
      $this->js[] = "https://cdnjs.cloudflare.com/ajax/libs/p5.js/$version/$file.js";
      $this->jsProd[] = "https://cdnjs.cloudflare.com/ajax/libs/p5.js/$version/$file.min.js";
    }
    parent::init();
  }

}

