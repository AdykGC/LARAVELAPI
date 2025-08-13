<?php namespace app\Enums;

enum Permission: string {
    case REGISTER_USER = 'func_name';
    case CREATE_COURSE = 'func_name';
    case CREATE_USER = 'func_name';
    case LOGIN = 'func_name';
    case GET_COURSE = 'func_name';
    case GET_COURSE_BY_ID = 'func_name';
    case POST_ENROLL_COURSE = 'func_name';
    case POST_UNENROLL_COURSE = 'func_name';
    case GET_MY_COURSES = 'func_name';
    case GET_MY_COURSES_BY_ID = 'func_name';
}