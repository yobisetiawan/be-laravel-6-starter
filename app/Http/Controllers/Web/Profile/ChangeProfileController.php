<?php

namespace App\Http\Controllers\Web\Profile;

use App\Http\Modules\BaseWebCrud;
use App\Http\Requests\Web\Profile\ChangeProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeProfileController extends BaseWebCrud
{
    public $model = User::class;

    public $modelKey = 'id';

    public $viewPath = 'pages.profile';

    public $updateValidator = ChangeProfileRequest::class;

    public $redirectSuccess = '/profile';

    public function index(Request $request)
    {
        return $this->edit(Auth::id());
    }

    public function store(Request $request)
    {
        return $this->update($request, Auth::id());
    }
}
