<?php

/**
 * @link    http://foundationize.com
 * @package shqear/yii2-foundation6
 * @version 1.0.0
 */

namespace shqear\foundation6;

use yii\web\AssetBundle;

/**
 * Asset bundle for the foundation icons css.
 */
class FoundationIconAsset extends AssetBundle
{
    public $sourcePath = '@vendor/shqear/yii2-foundation6/foundation-icons';
    public $css = [
        'foundation-icons.css'
    ];
}
