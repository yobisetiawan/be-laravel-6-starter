<?php

namespace App\Http\Controllers\Web\Profile;

use App\Http\Modules\BaseWebCrud;
use App\Http\Requests\Web\Profile\ChangeAvatarRequest;
use App\Models\User;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChangeAvatarController extends BaseWebCrud
{
    public $model = User::class;

    public $modelKey = 'id';

    public $viewPath = 'pages.profile.avatar';

    public $updateValidator = ChangeAvatarRequest::class;

    public $redirectSuccess = '/profile/change-avatar';

    public $avatar_upload;

    public function index(Request $request)
    {
        return $this->edit(Auth::id());
    }

    public function store(Request $request)
    {
        return $this->update($request, Auth::id());
    }

    public function __beforeUpdate()
    {
        $upload = new UploadService(
            $this->requestData->file('avatar'),
            'public/avatars',
            Auth::id()
        );

        $upload->upload();

        $this->avatar_upload = $upload->getURL();

        return false;
    }

    public function __prepareDataUpdate($data)
    {
        $data['avatar_url'] = $this->avatar_upload;
        return $data;
    }

    public function __insertFileInfo()
    {
        // $table->string('url')->nullable();
        // $table->string('disk')->nullable();
        // $table->string('path')->nullable();
        // $table->string('mime_type')->nullable();
        // $table->integer('size')->nullable();
        // $table->string('slug')->nullable();
        // $table->json('data')->nullable();
    }
}
