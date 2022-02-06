<?php

namespace App\Http\Controllers\Web\Profile;

use App\Http\Modules\BaseWebCrud;
use App\Http\Requests\Web\Profile\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends BaseWebCrud
{
    public $model = User::class;

    public $modelKey = 'id';

    public $viewPath = 'pages.profile.password';

    public $updateValidator = ChangePasswordRequest::class;

    public function index(Request $request)
    {
        return $this->edit(Auth::id());
    }

    public function store(Request $request)
    {
        return $this->update($request, Auth::id());
    }

    public function __prepareDataUpdate($data)
    {
        $data['password'] = Hash::make($data['password']);
        return $data;
    }
}
