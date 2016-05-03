<?php

/**
 *  @link    http://foundationize.com
 *  @package shqear/yii2-foundation6
 *  @version 1.0.0
 */

namespace shqear\foundation6;

/**
 * Description of Breadcrumbs
 */
class Breadcrumbs extends \yii\widgets\Breadcrumbs {

  public $options = ['class' => 'breadcrumbs'];
  
  public $activeItemTemplate = "<li class=\"current\">{link}</li>\n";

}
