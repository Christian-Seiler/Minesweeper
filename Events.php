<?php

/**
 * @package Minesweeper
 */

namespace fhnw\modules\games\minesweeper;

use Yii;
use yii\base\ActionEvent;
use yii\base\Event;
use yii\helpers\Json;
use yii\helpers\Url;

use function memory_get_usage;

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
   * @param ActionEvent $event
   *
   * @return void
   * @static
   */
  public static function onBeforeAction(ActionEvent $event): void
  {
    memory_get_usage();
    Yii::info(Json::encode($event), __METHOD__);
  }

}
