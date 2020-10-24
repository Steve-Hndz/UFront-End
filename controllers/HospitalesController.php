<?php

class HospitalesController
{
  public function __construct()
  {
    
  }

  public function list()
  {
    require_once "models/Hospital.php";
    $page = (!isset($_GET['page'])) ? 1 : $_GET['page'];
    $limit = (!isset($_GET['limit'])) ? 20 : $_GET['limit'];

    $filter = (!isset($_GET['filter'])) ? [] : $_GET['filter'];
    $sort = (!isset($_GET['sort'])) ? [] : $_GET['sort'];

    $hospitales = new Hospital();
    $list = $hospitales->list($page, $limit, $filter, $sort);
    
    var_dump($list);
  }
}