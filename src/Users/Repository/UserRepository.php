<?php

namespace CapstoneLogic\Users\Repository;

use Woodoocoder\LaravelHelpers\DB\Repository;
use CapstoneLogic\Stats\Repository\StatsRepository;
use CapstoneLogic\Auth\Model\User;

class UserRepository extends Repository {
    
    /**
     * @param Collection $collection
     */
    public function __construct(User $user, StatsRepository $statsRepo) {
        parent::__construct($user);
        $this->statsRepo = $statsRepo;
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


    /**
     * @param array $attributes
     * 
     * @return mixed
     */
    public function create(array $attributes) {
        $user = $this->model->create($attributes);
        $user->assignRole('customer');
        
        $this->statsRepo->increment('customers');
        
        return $user;
    }
}