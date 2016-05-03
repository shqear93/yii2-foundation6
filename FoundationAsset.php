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
    // JS awesomeness: http://www.jsdelivr.com/projects/foundation
    public function init()
    {
        \Yii::$app->view->registerJs('$(document).foundation();', View::POS_READY);
        // The core Foundation CSS
        // if language is arabic, include rtl foundation
        if (substr(\Yii::$app->language, 0, 2) == 'ar') {
            $this->css[] = 'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.0/foundation-rtl.min.css';
        } else {
            $this->css[] = 'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.0/foundation.min.css';
        }
        parent::init();
    }

    public $css;
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.0/foundation.min.js',
    ];

    // Depends on jQuery
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
