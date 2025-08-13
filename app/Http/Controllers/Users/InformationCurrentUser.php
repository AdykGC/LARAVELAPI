<?php namespace App\Http\Controllers\Users;

use App\Http\Controllers\Users\BaseController;
use App\Models\User;

class InformationCurrentUser extends BaseController{
    public function __invoke() {
        dd('here');
        /** @var User $user */
        $user = auth()->user();
        return $this->service->getCurrentUserInformation($user);
    }
}
