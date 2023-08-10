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
    // select query
    $query = "SELECT * FROM `soldier` WHERE `id` = ?";
    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute(array($id));
    $soldier_info = $stmt->fetch();
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? $soldier_info : null;
  }

  // function to get all soldier`s info
  public function get_all_soldiers_info()
  {
    // select query
    $query = "SELECT * FROM `soldier`";
    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute();
    $soldiers_info = $stmt->fetchAll();
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? $soldiers_info : null;
  }

  // function to insert new soldier`s info
  public function insert_new_soldier($info)
  {
    // insert query
    $query = "INSERT INTO `soldier`(`rank`, `name`, `address`, `phone1`, `phone2`, `militiry_number`, `national_id`, `basic_unit`, `current_unit`, `qualification`, `specialization`, `joined_date`, `discharge_date`, `status`, `num_child`, `father_job`, `mother_job`, `religion`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute($info);
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? true : null;
  }

  // function to update soldier`s info
  public function update_soldier($info)
  {
    // update query
    $query = "UPDATE `soldier` SET `rank` = ?, `name` = ?, `address` = ?, `phone1` = ?, `phone2` = ?, `militiry_number` = ?, `national_id` = ?, `basic_unit` = ?, `current_unit` = ?, `qualification` = ?, `specialization` = ?, `joined_date` = ?, `discharge_date` = ?, `status` = ?, `num_child` = ?, `father_job` = ?, `mother_job` = ?, `religion` = ?  WHERE `id` = ?;";
    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute($info);
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? true : null;
  }

  // function to delete soldier`s info
  public function delete_soldier($id)
  {
    // delete query
    $query = "DELETE FROM `soldier` WHERE `id` = ?;";
    // check if user exist in database
    $stmt = $this->con->prepare($query);
    $stmt->execute(array($id));
    $count = $stmt->rowCount();
    // check the count
    return $count > 0 ? true : null;
  }
}
