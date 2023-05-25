<?php

namespace fhnw\modules\games\minesweeper\controllers;

use humhub\components\Controller;

class AdminController extends Controller
{
  /** @return string */
  public function actionIndex(): string
  {
    return $this->render('index', []);
  }

}
