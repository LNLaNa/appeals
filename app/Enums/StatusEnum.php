<?php

namespace App\Enums;

enum StatusEnum: string
{
    case TRUE = 'Отвечено';
    case FALSE = 'Не отвечено';

//    public function translate():string
//    {
//        return  match ($this){
//            self::TRUE => 'Есть ответа',
//            self::FALSE => 'Нет ответа',
//        };
//    }
}
