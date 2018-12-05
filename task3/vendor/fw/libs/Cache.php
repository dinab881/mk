<?php
/**
 * Created by PhpStorm.
 * User: dina
 * Date: 04.12.18
 * Time: 11:00
 */

namespace fw\libs;


class Cache
{
    public function __construct()
    {

    }

    public function set($key, $data, $seconds = 3600)
    {
        $content['data'] = $data;
        $content['end_time'] = time() + $seconds;
        /*
         * int file_put_contents ( string $filename , mixed $data [, int $flags = 0 [, resource $context ]] )
         * Пишет данные в файл
           Функция идентична последовательным успешным вызовам функций fopen(), fwrite() и fclose().
            Если filename не существует, файл будет создан. Иначе, существующий файл будет перезаписан, за исключением случая, если указан флаг FILE_APPEND.
         * */

        if (file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content))) {
            return true;
        }
        return false;
    }

    public function get($key)
    {
        $file = CACHE .'/'.md5($key).'.txt';
        if(file_exists($file)){
            $content = unserialize(file_get_contents($file));
            if(time() <= $content['end_time']){
                return $content['data'];
            }
            unlink($file);
        }
        return false;
    }

    public function delete($key){
        $file = CACHE .'/'.md5($key).'.txt';
        if(file_exists($file)){
            unlink($file);
        }
    }
}