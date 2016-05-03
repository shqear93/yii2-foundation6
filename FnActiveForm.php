<?php

/**
 * @link    http://foundationize.com
 * @package shqear/yii2-foundation6
 * @version dev
 */

namespace shqear\foundation6;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Html;

class FnActiveForm extends \yii\widgets\ActiveForm
{
    public $fieldClass = 'shqear\foundation6\FnActiveField';
    public $layout = 'default';

    /**
     * Override default settings for form
     */
    //public $errorCssClass = 'form-error';

    /**
     * @inheritdoc
     */
    public function init()
    {
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
    public function run()
    {
        parent::run();
        $view = $this->getView();
        ActiveFormAsset::register($view);
    }

}
