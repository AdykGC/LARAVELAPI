<?php namespace app\Enums;

enum Role: int{
    case WEBSITE_ADMIN = 1;
    case TEACHER = 2;
    case STUDENT = 3;


    public function label(): string {
        return match ($this) {
            self::WEBSITE_ADMIN     => 'Website Admin',
            self::TEACHER           => 'Teacher',
            self::STUDENT           => 'Student',
        };
    }
}
