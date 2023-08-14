<?php

/**
 * Specialization class
 */
class Specialization extends Database
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

  // function to get specialization`s info
  public function get_specialization_info($id)
  {
    // select query
    $query = "SELECT * FROM `specialization` WHERE `spec_id` = ?";
    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute(array($id));
    $specializations_info = $stmt->fetch();
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? $specializations_info : null;
  }

  // function to get all specialization`s info
  public function get_all_specializations_info()
  {
    // select query
    $query = "SELECT * FROM `specialization`";
    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute();
    $specializations_info = $stmt->fetchAll();
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? $specializations_info : null;
  }

  // function to insert new specialization`s info
  public function insert_new_specialization($info)
  {
    // insert query
    $query = "INSERT INTO `specialization` (`spec_name`, `note`) VALUES (?, ?);";
    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute($info);
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? true : null;
  }

  // function to update specialization`s info
  public function update_specialization($info)
  {
    // insert query
    $query = "UPDATE `specialization` SET `spec_name` = ?, `note` = ? WHERE `spec_id` = ?;";
    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute($info);
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? true : null;
  }

  // function to delete specialization`s info
  public function delete_specialization($id)
  {
    // insert query
    $query = "DELETE FROM `specialization` WHERE `spec_id` = ?;";
    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute(array($id));
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? true : null;
  }
}
