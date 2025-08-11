<?php namespace App\Http\Controllers\WebAdmin;

use App\Models\WebAdmin;
use App\Http\Controllers\Student\BaseController;
use Illuminate\Http\Request;

class ADMlogoutController extends BaseController {
    public function __invoke(Request $request) {
        /** @var WebAdmin $user */
        $user = auth()->user();
        $request->user()->currentAccessToken()->delete();
        return $this->service->postLogout();
    }
}
