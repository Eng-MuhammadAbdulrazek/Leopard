<?php
namespace Modules\Users\app\Http\Controllers\Api;

use Lynx\Base\Api;
use Modules\Users\app\Models\User;
use Modules\Users\Policies\UserPolicy;
use Modules\Users\Resources\UserResource;

class UserController extends Api
{
    protected $entity = User::class;
    protected $policy = UserPolicy::class;
    protected $resourcesJson = UserResource::class;
    protected $spatieQueryBuilder = true;
    protected $guard = 'api';

    public function rules($type, mixed $id = null): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'mobile' => 'required|string|unique:users,email',
            'password' => 'required|string',
        ];
    }

    public function niceName(): array
    {
        return [
            'name' => __('users::main.name'),
            'email' => __('sers::main.email'),
            'mobile' => __('sers::main.mobile'),
            'password' => __('sers::main.password'),
        ];
    }
}
