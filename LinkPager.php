<?php

/**
 *  @link    http://foundationize.com
 *  @package foundationize/yii2-foundation
 *  @version 1.0.0
 */

namespace shqear\foundation6;

/**
 * Description of LinkPager
 *
 
 */
class LinkPager extends \yii\widgets\LinkPager {

  /**
   * @var string the CSS class for the "first" page button.
   */
  public $firstPageCssClass = 'first';

  /**
   * @var string the CSS class for the "last" page button.
   */
  public $lastPageCssClass = 'last';

  /**
   * @var string the CSS class for the "previous" page button.
   */
  public $prevPageCssClass = 'arrow';

  /**
   * @var string the CSS class for the "next" page button.
   */
  public $nextPageCssClass = 'arrow';

  /**
   * @var string the CSS class for the active (currently selected) page button.
   */
  public $activePageCssClass = 'current';

  /**
   * @var string the CSS class for the disabled page buttons.
   */
  public $disabledPageCssClass = 'unavailable';

}
