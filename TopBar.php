<?php

/**
 * @link    http://foundationize.com
 * @package foundationize/yii2-foundation
 * @version 1.0.0
 */

namespace shqear\foundation6;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * Description of TopBar
 *

 */
class TopBar extends Widget
{

    /**
     * @var array
     * @see http://foundation.zurb.com/docs/components/topbar.html
     */
    public $options;

    /**
     * @var array
     * @see http://foundation.zurb.com/docs/components/topbar.html#positioning-the-bar
     */
    public $containerOptions = [];
    public $titleLabel;
    public $titleUrl;
    public $titleOptions = [];

    /*toggle feature not found in foundation 6 documentation*/
    //public $toggleText = 'Menu';
    //public $showToggleIcon = true;
    //public $toggleOptions = ['class' => 'toggle-topbar'];

    /**
     *
     */
    public function init()
    {
        parent::init();

        Html::addCssClass($this->options, 'top-bar');

        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'div');

        if (!empty($this->containerOptions)) {
            $containerOptions = $this->containerOptions;
            $containerTag = ArrayHelper::remove($containerOptions, 'tag', 'div');
            echo Html::beginTag($containerTag, $this->containerOptions);
        }

        echo Html::beginTag($tag, $options);
        if (!empty($this->titleLabel)) {
            echo Html::tag('div', implode("\n", $this->headerItems()), ['class' => 'top-bar-title']);
        }
    }

    /**
     *
     */
    public function run()
    {
        $tag = ArrayHelper::remove($this->options, 'tag', 'div');
        echo Html::endTag($tag);
        if (!empty($this->containerOptions)) {
            echo Html::endTag(ArrayHelper::getValue($this->containerOptions, 'tag', 'div'));
        }
        //$this->registerPlugin('topbar');
    }

    /**
     *
     */
    protected function headerItems()
    {
        $title = !empty($this->titleLabel) ? $this->titleUrl ? Html::a($this->titleLabel, $this->titleUrl) : $this->titleLabel : '';

        /*if ($this->showToggleIcon) {
            Html::addCssClass($this->toggleOptions, 'menu-icon');
        }*/

        if (!($this->titleOptions && $this->titleOptions['class'])) {
            Html::addCssClass($this->titleOptions, 'menu-text');
        }

        return [
            Html::tag('span', Html::tag('span', '', ['class' => 'menu-icon dark', 'data-toggle' => '']), ['data-responsive-toggle' => $this->getToggleMenuId(), 'data-hide-for' => 'medium']),
            Html::tag('div', $title, $this->titleOptions),
            //Html::tag('li', Html::a(Html::tag('span', $this->toggleText), '#'), $this->toggleOptions)
        ];
    }

    public function getToggleMenuId()
    {
        return 'responsive-menu-' . $this->id;
    }
}