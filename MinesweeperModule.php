<?php

namespace fhnw\modules\games\minesweeper;

use fhnw\modules\gamecenter\components\GameModule;
use fhnw\modules\gamecenter\components\LeaderboardType;
use JetBrains\PhpStorm\ArrayShape;
use Yii;
use yii\helpers\Url;
use yii\i18n\PhpMessageSource;

/**
 * @property-read string $configUrl
 */
class MinesweeperModule extends GameModule
{

  /** @return void */
  public function init(): void
  {
    parent::init();
    $this->registerTranslations();
  }

  /**
   * Translates a message to the specified language.
   *
   * @param string   $category the message category.
   * @param string   $message  the message to be translated.
   * @param string[] $params   the parameters that will be used to replace the corresponding placeholders in the message.
   * @param ?string  $language the language code (e.g. `en-US`, `en`).
   *
   * @return string the translated message.
   */
  public static function t(string $category, string $message, array $params = [], string $language = null): string
  {
    return Yii::t("minesweeper/$category", $message, $params, $language);
  }

  /**
   * @inheritdoc
   * @return array<{name: string, title: string, description: string, secret?: bool, show_progress?: bool}>
   */
  #[ArrayShape([['name' => 'string', 'title' => 'string', 'description' => 'string', 'secret' => 'bool', 'show_progress' => 'bool']])]
  public function getAchievementConfig(): array
  {
    return [];
    /*
    return [
      [
        'name'          => 'first-game',
        'title'         => 'Win your first game',
        'description'   => 'Win your first game',
        'secret'        => true,
        'show_progress' => true
      ]
    ];
    */
  }

  /**
   * @inheritdoc
   * @return array<{title: string, description: string, tags?: string[]}>
   */
  #[ArrayShape(['title' => 'string', 'description' => 'string', 'tags' => 'string[]'])]
  public function getGameConfig(): array
  {
    return [
        'title'       => 'Minesweeper',
        'description' => 'The Game Minesweeper'
    ];
  }

  /**
   * @return string
   */
  public function getGameUrl(): string
  {
    return Url::to(['/minesweeper/index']);
  }

  /**
   * @return LeaderboardType[]
   */
  public function getLeaderboardConfig(): array
  {
    return [LeaderboardType::CLASSIC, LeaderboardType::RECURRING_MONTHLY];
  }

  /**
   * @return void
   */
  private function registerTranslations(): void
  {
    Yii::$app->i18n->translations['minesweeper*'] = [
        'class'          => PhpMessageSource::class,
        'sourceLanguage' => 'en-US',
        'basePath'       => '@minesweeper/messages'
    ];
  }

}
