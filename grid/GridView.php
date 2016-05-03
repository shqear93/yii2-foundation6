<?php

/**
 * @link    http://foundationize.com
 * @package shqear/yii2-foundation6
 * @version 0.0.1
 */

namespace shqear\foundation6\grid;

use shqear\foundation6\FoundationIconAsset;

/**
 * Description of GridView
 */
class GridView extends \yii\grid\GridView
{
    /**
     * @var array the HTML attributes for the grid table element.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $tableOptions = ['class' => 'table', 'role' => 'grid'];

    /**
     * @var array
     * @see [[\yii\widgets\BaseListView::pager]]
     */
    public $pager = ['class' => 'shqear\foundation6\LinkPager'];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        FoundationIconAsset::register($this->getView());
    }
}
