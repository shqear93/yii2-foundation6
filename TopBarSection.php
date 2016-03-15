<?php

/**
 * @link    http://foundationize.com
 * @package foundationize/yii2-foundation
 * @version 1.0.0
 */

namespace shqear\foundation6;

use Pinq\Traversable;
use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * Description of TopBarSection
 *
 * @property mixed toggleMenuId
 */
class TopBarSection extends NavigationWidget
{

    /**
     *
     * @var type array
     *
     *  'label' => 'label'
     *    'url' => 'url'
     *    'linkOptions' => []
     *    'options' => []
     *    'active => true|false
     *  'visible => true|false
     *    'items' => [],
     *    'position' => 'left|right'
     *
     */
    public $items = [];

    public $_toggleMenuId;

    /**
     *
     */
    public function run()
    {
        if (!is_null($this->toggleMenuId)) {
            $toggleId = $this->toggleMenuId;
        } else {
            $top = (static::$stack[0]);
            $toggleId = $top->getToggleMenuId();
        }
        echo Html::tag('div', $this->renderItems(), ['id' => $toggleId]);
        FoundationAsset::register($this->getView());

    }

    /**
     *
     *
     *
     * @param array $children
     * <pre>
     * configs and defaults:
     * [
     *      [
     *          'position' => 'right',
     *          'visible' => true,
     *          'label' => *required*,
     *          'encode' => true,
     *          'items' => [],
     *          'url' => '#',
     *          'linkOptions' => [],
     *          'active' => true,
     *          ...
     *      ],
     *      ...
     * ]
     * </pre>
     *
     * @param bool $vertical
     * @return string
     */
    public function renderItems($children = null, $vertical = false)
    {
        $out = '';
        $isMainMenu = !$children;
        $isSubMenu = !!$children;

        $elements = $children != null ? $children : $this->items;
        $elements = Traversable::from($elements)
            // filter visible items only
            ->where(function ($i) {
                return !(isset($i['visible']) && !$i['visible']);
            })
            // set default position to 'right'
            ->select(function ($i) {
                isset($i['position']) ?: ($i['position'] = 'right');
                return $i;
            })
            // group by position
            ->groupBy(function ($i) {
                return $i['position'];
            });

        /** @var Traversable $group */
        foreach ($elements as $position => $group) {
            $hasHtmlItem = false;
            // render items and check if anyone has 'html' attribute
            $items = $group->select(function ($i) use (&$hasHtmlItem) {
                if (isset($i['html'])) {
                    $hasHtmlItem = true;
                }
                return $this->renderItem($i);
            })->asArray();

            // build menu
            {
                $ulOptions = ['class' => 'menu'];
                if ($isMainMenu && !$hasHtmlItem) {
                    $ulOptions['data-dropdown-menu'] = '';
                    Html::addCssClass($ulOptions, 'dropdown');
                }

                if ($vertical) {
                    Html::addCssClass($ulOptions, 'vertical');
                }

                $ul = Html::tag('ul', implode("\n", $items), $ulOptions);
                if ($isMainMenu) {
                    $out .= Html::tag('div', $ul, ['class' => 'top-bar-' . $position]);
                } else {
                    $out .= $ul;
                }
            }
        }
        return $out;
    }

    /**
     *
     * @param array $item
     * <pre>
     * configs and defaults:
     *  [
     *      'label' => *required*,
     *      'encode' => true,
     *      'items' => [],
     *      'url' => '#',
     *      'linkOptions' => [],
     *      'active' => true,
     *      ...
     *  ]
     * </pre>
     * @return string
     * @throws InvalidConfigException
     */
    public function renderItem($item)
    {

        if (is_string($item)) {
            return $item;
        }

        if (isset($item['html']) && !is_null($item['html'])) {
            return Html::tag('li', $item['html'], isset($item['options']) ? $item['options'] : []);
        }

        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }

        $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
        $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];
        $options = ArrayHelper::getValue($item, 'options', []);
        $items = ArrayHelper::getValue($item, 'items');
        $url = ArrayHelper::getValue($item, 'url', '#');
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
        $vertical = ArrayHelper::getValue($item, 'vertical', true);

        if (isset($item['active'])) {
            $active = ArrayHelper::remove($item, 'active', false);
        } else {
            $active = $this->isItemActive($item);
        }

        if ($items !== null) {
            //Html::addCssClass($options, 'menu');

            if (is_array($items)) {
                if ($this->activateItems) {
                    $items = $this->isChildActive($items, $active);
                }

                $items = $this->renderItems($items, $vertical);
            }
        }

        if ($this->activateItems && $active) {
            Html::addCssClass($options, 'active');
        }

        return Html::tag('li', Html::a($label, $url, $linkOptions) . $items, $options);
    }

    /**
     * @param mixed $toggleMenuId
     */
    public function setToggleMenuId($toggleMenuId)
    {
        $this->_toggleMenuId = 'responsive-menu-' . $toggleMenuId;
    }

    /**
     * @return string
     */
    public function getToggleMenuId()
    {
        return $this->_toggleMenuId;
    }
}
