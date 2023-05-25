<?php

/**
 * @package Minesweeper
 */
namespace fhnw\modules\games\minesweeper;

use Yii;
use yii\base\Event;
use yii\helpers\Url;

class Events
{
  /**
  * Defines what to do if admin menu is initialized.
  *
  * @param Event $event
  *
  * @return void
  */
  public static function onAdminMenuInit(Event $event): void
  {
    $config = [
      'label'     => 'Minesweeper',
      'url'       => Url::to(['/minesweeper/admin']),
      'group'     => 'manage',
      'icon'      => '<i class="fa fa-gamepad"></i>',
      'sortOrder' => 99999,
      'isActive'  => (Yii::$app->controller->module &&
                      Yii::$app->controller->module->id === 'minesweeper' &&
                      Yii::$app->controller->id === 'admin')
    ];
    $event->sender->addItem($config);
  }

  /**
   * Defines what to do when the top menu is initialized.
   *
   * @param Event $event
   *
   * @return void
   */
  public static function onTopMenuInit($event): void
  {
    $config = [
      'label'     => 'Minesweeper',
      'icon'      => '<i class="fa fa-gamepad"></i>',
      'url'       => Url::to(['/minesweeper/index']),
      'sortOrder' => 99999,
      'isActive'  => (Yii::$app->controller->module &&
                      Yii::$app->controller->module->id === 'minesweeper' &&
                      Yii::$app->controller->id === 'index')
    ];
    $event->sender->addItem($config);
  }
}
