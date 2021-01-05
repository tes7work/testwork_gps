<?php

class A {
    public function func1($a){
        $this->$a();
    }

    public function func2(){
        echo 'in func2';
    }

    //ВАРИАНТ 1 (через магический метод __call обрабатываем ошибку)
    public function __call($method, $args)
    {
        echo 'error';
    }
}

$objA = new A();
$func_name = 'func3';

if( method_exists($objA, $func_name) ) { //ВАРИАНТ 2 (проверяем существует ли метод. Если нет, то выдаем сообщение 'error')
    $objA->func1($func_name);
}
else {
    echo 'error';
}
