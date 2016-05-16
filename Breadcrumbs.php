<?php

/**
 * @link    http://foundationize.com
 * @package shqear/yii2-foundation6
 * @version 1.0.0
 */

namespace shqear\foundation6;

use shqear\foundation6\helpers\Html;
use Yii;

/**
 * Description of Breadcrumbs
 *
 * @property string icon
 */
class Breadcrumbs extends \yii\widgets\Breadcrumbs
{
    public $options = ['class' => 'breadcrumbs'];

    public $_icon = null;

    public $activeItemTemplate = "<li class=\"current\">{link}</li>\n";
    public $iconItemTemplate = "<li class=\"marker\">{link}</li>\n";

    public function run()
    {
        if (empty($this->links)) {
            return;
        }
        $links = [];
        if ($this->icon) {
            $links[] = $this->renderItem([
                'label' => "<i class=\"{$this->icon}\"></i>",
                'encode' => false], $this->iconItemTemplate);
        }
        if ($this->homeLink === null) {
            $links[] = $this->renderItem([
                'label' => Yii::t('yii', 'Home'),
                'url' => Yii::$app->homeUrl,
            ], $this->itemTemplate);
        } elseif ($this->homeLink !== false) {
            $links[] = $this->renderItem($this->homeLink, $this->itemTemplate);
        }
        foreach ($this->links as $link) {
            if (!is_array($link)) {
                $link = ['label' => $link];
            }
            $links[] = $this->renderItem($link, isset($link['url']) ? $this->itemTemplate : $this->activeItemTemplate);
        }
        echo Html::tag($this->tag, implode('', $links), $this->options);
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->_icon;
    }

    /**
     * @param string $icon
     */
    public function setIcon($icon)
    {
        if (is_null($icon)) {
            $this->_icon = null;
            return;
        }
        if (preg_match('/fa fa-.*/', $icon)) {
            $this->_icon = $icon;
        } else {
            $this->_icon = 'fa fa-' . $icon;
        }
    }
}
