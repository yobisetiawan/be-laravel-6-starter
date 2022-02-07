<?php

namespace App\Http\Controllers\Web\Profile;

use App\Constants\FileConst;
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
        $user = Auth::user();

        $upload = new UploadService(
            $this->requestData->file('avatar'),
            FileConst::USER_AVATAR_PATH,
            Auth::id()
        );

        $upload->upload();
        $upload->saveFileInfo($user->avatarInfo(), ['slug' =>  FileConst::USER_AVATAR_SLUG]);

        $this->avatar_upload = $upload->getURL(); 

        return false;
    }

    public function __prepareDataUpdate($data)
    {
        $data['avatar_url'] = $this->avatar_upload;
        return $data;
    }
}
