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
        'https://cdn.jsdelivr.net/foundation/6.0.5/foundation.min.css',
    ];
    public $js = [
        'https://cdn.jsdelivr.net/foundation/6.0.5/foundation.min.js',
        'js/foundationize.js'
    ];
    // Depends on jQuery
    public $depends = [
        'yii\web\JqueryAsset'
    ]; 
    
}
