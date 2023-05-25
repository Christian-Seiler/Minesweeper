<?php
use fhnw\modules\games\minesweeper\MinesweeperModule;
use fhnw\modules\games\minesweeper\Events;
use humhub\modules\admin\widgets\AdminMenu;

return [
	'id' => 'minesweeper',
	'class' => MinesweeperModule::class,
	'namespace' => 'fhnw\modules\games\minesweeper',
  'events'    => [
    [
      'class'    => AdminMenu::class,
      'event'    => TopMenu::EVENT_INIT,
      'callback' => [Events::class, 'onAdminMenuInit']
    ]
  ]
];
