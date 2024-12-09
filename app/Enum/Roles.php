<?php

namespace App\Enum;

enum Roles: string
{
    use Concerns\IsStr;
    case Admin = 'admin';
    case Manager = 'manager';


}
