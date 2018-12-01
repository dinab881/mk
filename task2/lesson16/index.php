<?php
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 01.12.18
 * Time: 15:52
 */
$file = "namespace.php";
/*try{
    if(!file_exists($file)){
        throw new Exception('File not found');
    }
} catch(Exception $e) {
  echo $e->getMessage();
}*/

class NewException extends Exception {

}