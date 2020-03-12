<?php
/**
 * Created by PhpStorm.
 * User: Shorna
 * Date: 3/12/2020
 * Time: 9:13 AM
 */

namespace App\classes;

use App\traits\Database;


class Application
{
    use Database;

    public function getCategoryInformation()
    {
        $link   =   $this->__construct();
        $sql    =   "SELECT category_id, category_name FROM categories WHERE category_publication_status = 1 AND category_deletion_status = 0";
        $query  =   mysqli_query($link, $sql);
        return $query;
    }
}