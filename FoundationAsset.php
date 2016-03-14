<?php
/**
 * FoundationAsset - defines the AssetBundle for Foundation resources
 *
 * @link http://www.foundationize.com/#yii2
 */

namespace shqear\foundation6;

use yii\web\AssetBundle;

class FoundationAsset extends AssetBundle 
{
    //public $basePath = '@webroot';
//    public $basePath = null; // see construct further below
//    public $baseUrl = '@web';
//    public $sourcePath = null;
    
    public $sourcePath = '@vendor/foundationize/yii2-foundation';
    
    public $css = [
        // The core Foundation CSS
        //'https://cdn.jsdelivr.net/foundation/6.1.1/foundation.min.css', 
        // For CSS autocompleting, we'll use direct files instead of CDN
        'css/foundation.min.css'
    ];
    // JS awesomeness: http://www.jsdelivr.com/projects/foundation
    public $js = [
        //'https://cdn.jsdelivr.net/foundation/6.1.1/foundation.min.js',   // The core Foundation JS
        // We will use Yii2's built-in front and backend validation instead of abide
        //'https://cdn.jsdelivr.net/foundation/6.1.1/js/foundation.abide.js',
        'js/foundation.min.js',
        'js/foundationize.js',        
    ];
    // Depends on jQuery
    public $depends = [
        'yii\web\JqueryAsset'
    ]; 
       
}
