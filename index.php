<?php
use app\src\PRINTIT;
//try{
//
//    print_r(require_once('/app/src/User.class.php'));
//}Catch(Exception $e){
//    echo $e->getMessage();
//}
//die;
//
///**
// * Created by PhpStorm.
// * User: grace
// * Date: 17-12-14
// * Time: 下午2:37
// */
////echo 'Hello World !<br>'.date('Y-m-d H:i:s');
//function loadprint($class)
//{
//    $file = $class . '.class.php';
//    echo $file;
//    echo is_file($file);
//    die;
//    if (is_file($file)) {
//        require_once($file);
//    }
//}
//
//spl_autoload_register('loadprint');
//$user = new User();

//function __autoload( $class ) {
//    $file = $class . '.class.php';
//    if (is_file($file)) {
//        require_once($file);
//    }
//}
////require_once 'PRINTIT.php';
//$obj = new PRINTIT();
//$obj->doPrint();

//spl_autoload_register(function ($class) {
//    if ($class) {
//        $file = str_replace('\\', '/', $class);
//        echo $file;
//        if (file_exists($file)) {
//            include $file;
//        }
//    }
//});

function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
}
spl_autoload_register('autoload');


$obj = new PRINTIT();
$obj->doPrint();

