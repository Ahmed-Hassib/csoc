<?php

/**
 * Session class
 */
class Session extends Database
{
  // properties
  public $con;    // for Database connection

  // constructor
  public function __construct()
  {
    // create an object of Database class
    $db_obj = new Database();
    $this->con = $db_obj->con;
  }

  // function to get all user`s info
  public function get_user_info($id)
  {
    // select query
    $query = "SELECT * FROM `users`WHERE `users`.`UserID` = ? LIMIT 1";

    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute(array($id));
    $user_info = $stmt->fetch();
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? $user_info : null;
  }

  // function to set basic info to session variable
  public function set_user_session($info)
  {
    // get basics info
    $_SESSION['user_id']      = $info['id'];        // assign userid to session
    $_SESSION['username']     = $info['username'];       // assign username to session
    $_SESSION['privilidge']   = $info['privilidge'];     // is root (0 -> all || 1 -> ahmed hassib only)
  }

  /**
   * set_permissions function
   */
  public function set_permissions($permissions)
  {
    $_SESSION['user_add']            = $permissions['user_add'];           // permission to add users
    $_SESSION['user_update']         = $permissions['user_update'];        // permission to update users
    $_SESSION['user_delete']         = $permissions['user_delete'];        // permission to delete users
    $_SESSION['user_show']           = $permissions['user_show'];          // permission to show users
    $_SESSION['mal_add']             = $permissions['mal_add'];            // permission to add malfunctions
    $_SESSION['mal_update']          = $permissions['mal_update'];         // permission to update malfunctions
    $_SESSION['mal_delete']          = $permissions['mal_delete'];         // permission to delete malfunctions
    $_SESSION['mal_show']            = $permissions['mal_show'];           // permission to show malfunctions
    $_SESSION['mal_review']          = $permissions['mal_review'];         // permission to review malfunctions
    $_SESSION['mal_media_delete']    = $permissions['mal_media_delete'];   // permission to delete malfunctions media
    $_SESSION['mal_media_download']  = $permissions['mal_media_download']; // permission to download malfunctions media
    $_SESSION['comb_add']            = $permissions['comb_add'];           // permission to add combinations
    $_SESSION['comb_update']         = $permissions['comb_update'];        // permission to update combinations
    $_SESSION['comb_delete']         = $permissions['comb_delete'];        // permission to delete combinations
    $_SESSION['comb_show']           = $permissions['comb_show'];          // permission to show combinations
    $_SESSION['comb_review']         = $permissions['comb_review'];        // permission to review combinations
    $_SESSION['comb_media_delete']   = $permissions['comb_media_delete'];   // permission to delete malfunctions media
    $_SESSION['comb_media_download'] = $permissions['comb_media_download']; // permission to download malfunctions media
    $_SESSION['pcs_add']             = $permissions['pcs_add'];            // permission to add pieces/clients
    $_SESSION['pcs_update']          = $permissions['pcs_update'];         // permission to update pieces/clients
    $_SESSION['pcs_delete']          = $permissions['pcs_delete'];         // permission to delete pieces/clients
    $_SESSION['pcs_show']            = $permissions['pcs_show'];           // permission to show pieces/clients
    $_SESSION['clients_add']         = $permissions['clients_add'];        // permission to add pieces/clients
    $_SESSION['clients_update']      = $permissions['clients_update'];     // permission to update pieces/clients
    $_SESSION['clients_delete']      = $permissions['clients_delete'];     // permission to delete pieces/clients
    $_SESSION['clients_show']        = $permissions['clients_show'];       // permission to show pieces/clients
    $_SESSION['connection_add']      = $permissions['connection_add'];     // permission to add connection type
    $_SESSION['connection_update']   = $permissions['connection_update'];  // permission to update connection type
    $_SESSION['connection_delete']   = $permissions['connection_delete'];  // permission to delete connection type
    $_SESSION['connection_show']     = $permissions['connection_show'];    // permission to show connection type
    $_SESSION['dir_add']             = $permissions['dir_add'];            // permission to add directions
    $_SESSION['dir_update']          = $permissions['dir_update'];         // permission to update directions
    $_SESSION['dir_delete']          = $permissions['dir_delete'];         // permission to delete directions
    $_SESSION['dir_show']            = $permissions['dir_show'];           // permission to show directions
    $_SESSION['sugg_replay']         = $permissions['sugg_replay'];        // permission to replay on complaints/suggestions
    $_SESSION['sugg_delete']         = $permissions['sugg_delete'];        // permission to delete complaints/suggestions
    $_SESSION['sugg_show']           = $permissions['sugg_show'];          // permission to show complaints/suggestions
    $_SESSION['points_add']          = $permissions['points_add'];         // permission to add motivation points
    $_SESSION['points_delete']       = $permissions['points_delete'];      // permission to delete motivation points
    $_SESSION['points_show']         = $permissions['points_show'];        // permission to show motivation points
    $_SESSION['reports_show']        = $permissions['reports_show'];       // permission to show reports
    $_SESSION['archive_show']        = $permissions['archive_show'];       // permission to show archive
    $_SESSION['take_backup']         = $permissions['take_backup'];        // permission to take a backup
    $_SESSION['restore_backup']      = $permissions['restore_backup'];     // permission to restore a backup
    $_SESSION['permission_update']   = $permissions['permission_update'];  // permission to update permissions
    $_SESSION['permission_show']     = $permissions['permission_show'];    // permission to show permissions
    $_SESSION['change_company_img']  = $permissions['change_company_img']; // permission to change company image
  }



  public function print_session()
  {
    print_r($_SESSION);
  }

  public function update_session($user_id)
  {
    // get user data
    $user_data = $this->get_user_info($user_id);
    // get count
    $user_count = $user_data[0];
    // check count
    if ($user_count > 0) {
      // get user info
      $user_info = $user_data[1];
      // update user info
      $this->set_user_session($user_info);
    } else {
      return null;
    }
  }
}