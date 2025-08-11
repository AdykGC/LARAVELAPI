<?php namespace App\Http\Controllers\WebAdmin;

use App\Models\WebAdmin;
use App\Http\Controllers\WebAdmin\BaseController;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\WebAdmin\ADMcreateTeacRequest;


class ADMcreateTeacController extends BaseController {
    public function __invoke(ADMcreateTeacRequest $request) {
        /** @var WebAdmin $user */
        return $this->service->postCreateTeacher($request);
    }
}
