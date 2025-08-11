<?php namespace App\Enums;

enum RolesEnum: string {
    case Admin = 'Admin';
    case Student = 'Student';
    case Teacher = 'Teacher';

    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    public function label(): string {
        return match ($this) {
            static::Admin => '',
            static::Student => '',
            static::Teacher => '',
        };
    }
}