<?php

/**
 *  @link    http://foundationize.com
 *  @package foundationize/yii2-foundation
 *  @version dev
 */

namespace foundationize\foundation;

use yii\helpers\Html;

class ActiveForm extends \yii\widgets\ActiveForm {

  public $fieldClass = 'foundationize\foundation\ActiveField';
  
  public $layout = 'default';

  /**
   * @inheritdoc
   */
  public function init() {
    if (!in_array($this->layout, ['default', 'inline'])) {
      throw new InvalidConfigException('Invalid layout type: ' . $this->layout);
    }

    if ($this->layout !== 'default') {
      Html::addCssClass($this->options, 'form-' . $this->layout);
    }
    parent::init();
  }
  
  /**
   * @inheritdoc
   */
  public function run() {
    parent::run();
    $view = $this->getView();
    ActiveFormAsset::register($view);
  }
}
