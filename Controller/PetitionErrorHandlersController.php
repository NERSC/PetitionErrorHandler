<?php
/**
 * COmanage Registry Petition Error Handlers Controller
 *
 * @link          https://www.internet2.edu/comanage COmanage Project
 * @package       registry
 * @since         COmanage Registry v4.1.0
 * @license       
 */

class PetitionErrorHandlersController extends AppController {
  // Class name, used by Cake
  public $name = "PetitionErrorHandlers";
  
  public $uses = array('PetitionErrorHandler.PetitionErrorHandler', 'CoPetition');

  /**
   * Authorization for this Controller, called by Auth component
   * - precondition: Session.Auth holds data used for authz decisions
   * - postcondition: $permissions set with calculated permissions
   *
   * @since  COmanage Registry v4.1.0
   * @return Array Permissions
   */
  
  function isAuthorized() {
//    $roles = $this->Role->calculateCMRoles();
    
    // Construct the permission set for this user, which will also be passed to the view.
    $p = array();
    
    // Determine what operations this user can perform
    
    // Lookup invalid petitions? We require an authenticated user, but since we
    // are looking up based on $REMOTE_USER we don't need to do any authz checks.
    $p['lookup'] = true;
    
    $this->set('permissions', $p);
    return($p[$this->action]);
  }
  
  /**
   * Lookup petitions for the authenticated user.
   *
   * #since  COmanage Registry v4.1.0
   */
  
  function lookup() {
    $this->layout = 'PetitionErrorHandler.nersc';
    
    // based on $REMOTE_USER, look for petitions from that user in an error state
    
    $username = $this->Session->read('Auth.User.username');
    
    if(empty($username)) {
      $this->Flash->set(_txt('er.id.unk'), array('key' => 'error'));
      $this->redirect("/");
    }
    
    if(empty($this->request->params['named']['co'])) {
      $this->Flash->set(_txt('er.co.specify'), array('key' => 'error'));
      $this->redirect("/");
    }
    
    $coid = $this->request->params['named']['co'];
    
    $args = array();
    $args['conditions']['CoPetition.co_id'] = $coid;
    $args['conditions']['CoPetition.authenticated_identifier'] = $username;
    $args['contain'] = array(
      'CoPetitionAttribute',
      'CoPetitionHistoryRecord',
      'EnrolleeCoPerson' => array('PrimaryName')
    );
    
    $petitions = $this->CoPetition->find('all', $args);
    
    $sorted = array();
    
    foreach($petitions as $p) {
      $sorted[ $p['CoPetition']['status'] ][] = $p;
    }
    
    $this->set('vv_petitions', $sorted);
  }
}
