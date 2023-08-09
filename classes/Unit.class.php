<?php

/**
 * Unit class
 */
class Unit extends Database
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

  // function to get unit`s info
  public function get_unit_info($id)
  {
    // select query
    $query = "SELECT * FROM `units` WHERE `unit_id` = ? LIMIT 1";
    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute(array($id));
    $unit_info = $stmt->fetch();
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? $unit_info : null;
  }

  // function to get all unit`s info
  public function get_all_units_info()
  {
    // select query
    $query = "SELECT * FROM `units`";
    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute();
    $units_info = $stmt->fetchAll();
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? $units_info : null;
  }

  // function to insert new unit`s info
  public function insert_new_unit($info)
  {
    // insert query
    $query = "INSERT INTO `units` (`unit_name`, `unit_address`, `unit_type`, `unit_leader_rank`, `unit_leader_name`) VALUES (?, ?, ?, ?, ?);";
    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute($info);
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? true : null;
  }

  // function to update unit`s info
  public function update_unit($info)
  {
    // update query
    $query = "UPDATE `units` SET `unit_name` = ?, `unit_address` = ?, `unit_type` = ?, `unit_leader_rank` = ?, `unit_leader_name` = ? WHERE `unit_id` = ?";
    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute($info);
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? true : null;
  }
  
  // function to delete unit`s info
  public function delete_unit($id)
  {
    // delete query
    $query = "DELETE FROM `units`  WHERE `unit_id` = ?";
    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute(array($id));
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? true : null;
  }
}
