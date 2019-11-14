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

    /**
     * @param int $perPage
     * @param string $orderBy
     * @param string $sortBy
     * 
     * @return LengthAwarePaginator
     */
    public function search(
        int $perPage = 20,
        string $orderBy = 'id',
        string $sortBy = 'desc',
        string $search= null) {

        $query = $this->model->query();

        if($search !== null) {
            $query->where('email', 'LIKE', '%'.$search.'%');
            $query->orWhere('username', 'LIKE', '%'.$search.'%');
            $query->orWhere('first_name', 'LIKE', '%'.$search.'%');
            $query->orWhere('last_name', 'LIKE', '%'.$search.'%');
        }

        return $query->orderBy($orderBy, $sortBy)->paginate($perPage);
    }
}