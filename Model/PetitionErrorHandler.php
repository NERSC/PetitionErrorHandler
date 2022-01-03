<?php
/**
 * COmanage Registry Petition Error Handler Model
 *
 * @link          https://www.internet2.edu/comanage COmanage Project
 * @package       registry
 * @since         COmanage Registry v4.1.0
 * @license       
 */

class PetitionErrorHandler extends AppModel {
  // Required by COmanage Plugins
  public $cmPluginType = "other";
  
  // Document foreign keys
  public $cmPluginHasMany = array();
  
  /**
   * Expose menu items.
   * 
   * @since COmanage Registry v4.1.0
   * @return Array with menu location type as key and array of labels, controllers, actions as values.
   */
  
  public function cmPluginMenus() {
    return array();
  }
}
