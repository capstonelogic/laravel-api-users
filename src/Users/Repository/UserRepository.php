<?php

namespace CapstoneLogic\Users\Repository;

use Woodoocoder\LaravelHelpers\DB\Repository;
use CapstoneLogic\Auth\Model\User;

class UserRepository extends Repository {
    
    /**
     * @param Collection $collection
     */
    public function __construct(User $user) {
        parent::__construct($user);
        
    }
}