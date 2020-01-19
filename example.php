<?php
/**
 * Created by PhpStorm.
 * User: Alexei
 * Date: 19.01.2020
 * Time: 22:23
 */

require_once "requirements.php";

\db\DbConnection::Init();

try {
    $image = \db\DbConnection::getImageById(1);
} catch (Exception $e) {

}

// .........................

