<?php

/**
 * @link    http://foundationize.com
 * @package shqear/yii2-foundation6
 * @version dev
 */

namespace shqear\foundation6;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Widget js files.
 *
 * @since 0.0.1
 * @see
 */
class ActiveFormAsset extends AssetBundle
{
    public $sourcePath = '@vendor/shqear/yii2-foundation6';
    public $js = [
        'js/foundation.activeForm.js'
    ];
}
