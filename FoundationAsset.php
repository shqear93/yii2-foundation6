<?php
/**
 * FoundationAsset - defines the AssetBundle for Foundation resources
 *
 * @link http://www.foundationize.com/#yii2
 */

namespace foundationize\foundation;

use yii\web\AssetBundle;

class FoundationAsset extends AssetBundle 
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        'https://cdn.jsdelivr.net/foundation/6.1.1/foundation.min.css', // The core Foundation CSS
    ];
    public $js = [
        'https://cdn.jsdelivr.net/foundation/6.1.1/foundation.min.js',   // The core Foundation JS
        'https://cdn.jsdelivr.net/foundation/6.1.1/js/foundation.abide.js', // Form validation
        'js/foundationize.js'
    ];
    // Depends on jQuery
    public $depends = [
        'yii\web\JqueryAsset'
    ]; 
    
}
