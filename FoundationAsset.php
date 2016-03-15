<?php
/**
 * FoundationAsset - defines the AssetBundle for Foundation resources
 *
 * @link http://www.foundationize.com/#yii2
 */

namespace shqear\foundation6;

use yii\web\AssetBundle;
use yii\web\View;

class FoundationAsset extends AssetBundle
{
    public function init()
    {
        \Yii::$app->view->registerJs('$(document).foundation();', View::POS_READY);
        parent::init();
    }

    public $css = [
        // The core Foundation CSS
        'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.0/foundation.min.css',
    ];
    // JS awesomeness: http://www.jsdelivr.com/projects/foundation
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.0/foundation.min.js',
        // We will use yiiActiveForms validation js instead of abide
        //'https://cdn.jsdelivr.net/foundation/6.1.1/js/foundation.abide.js',
    ];
    // Depends on jQuery
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
