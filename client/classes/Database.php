<?php
/**
* Class DB
* This PHP class allows you to simplify SQL requests (with PDO)
*
*/
class Database 
{
  private $db;
  private $rows;

  public function __construct()
  {
    try
    {
      $this->db = new PDO('mysql:host=localhost; dbname=erebos; charset=utf8', 'root', '');
    }
    catch(Exception $event)
    {
      die('Error : ' . $event->getMessage());
    }
  }

  /**
  * Execute an SQL query and return the result (prepared request or not)
  * @param string $request SQL query
  * @param array|null $values Optional values
  * @return PDOStatement
  */
  private function exec($request, $values = null)
  {
      $req = $this->db->prepare($request);
      $req->execute($values);
      return $req;
  }

  /**
  * Define the fetchMode
  * @param int $fetchMode fetchMode
  */
  public function setFetchMode($fetchMode)
  {
      $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $fetchMode);
  }

  /**
  * Execute an SQL query and return the status
  * @param string $request SQL query
  * @param array|null $values Optional values
  * @return bool Result of the request
  */
  public function execute($request, $values = array())
  {
      $results = self::exec($request, $values);
      return ($results) ? true : false;
  }

  /**
  * Execute an SQL query and return row(s) of the result
  * @param string $request SQL query
  * @param array|null $values Optional values
  * @param bool $all Query with several rows or not
  * @return array|mixed Return data
  */
  public function fetch($request, $values = null, $all = true)
  {
      $results = self::exec($request, $values);
      return ($all) ? $results->fetchAll() : $results->fetch();
  }

  public function fetchContent($refValue)
  {
    $sql = <<<EOT
      SELECT content FROM files WHERE name='$refValue'
    EOT;

    $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $response = $this->fetch($sql);

    $return = implode(array_values($response[0])); //Remove the array and the key
    return $return;
  }
}