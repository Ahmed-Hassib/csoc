<?php

/**
 * Soldier class
 */
class Soldier extends Database
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

  // function to get soldier`s info
  public function get_soldier_info($id)
  {
  }

  // function to get all soldier`s info
  public function get_all_soldiers_info()
  {
  }

  // function to insert new soldier`s info
  public function insert_new_soldier($info)
  {
  }

  // function to update soldier`s info
  public function update_soldier($info)
  {
  }
}
