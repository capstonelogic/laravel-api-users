<?php

namespace CapstoneLogic\Users\Http\Controllers\Api;

use Illuminate\Http\Request;
use Woodoocoder\LaravelHelpers\Api\Controller;
use Woodoocoder\LaravelHelpers\Api\Response\ApiMessage;
use Woodoocoder\LaravelHelpers\Api\Response\ApiStatus;

use CapstoneLogic\Auth\Resource\UserResource;
use CapstoneLogic\Auth\Model\User;
use CapstoneLogic\Users\Repository\UserRepository;
use CapstoneLogic\Users\Http\Request\CreateRequest;
use CapstoneLogic\Users\Http\Request\UpdateRequest;

class UserController extends Controller
{

    private $usersRepo;
    public function __construct(UserRepository $usersRepo) {
        $this->usersRepo = $usersRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return UserResource::collection($this->usersRepo->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        return new UserResource($this->usersRepo->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $isUpdated = $this->usersRepo->update($request->all(), $user->id);
        
        if($isUpdated) {
            $user = $this->usersRepo->find($user->id);
            return new UserResource($user);
        }
        else {
            return new UserResource($user, ApiStatus::ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()) {
            return new ApiMessage();
        }
        else {
            return new ApiMessage(ApiStatus::ERROR);
        }
    }
}
