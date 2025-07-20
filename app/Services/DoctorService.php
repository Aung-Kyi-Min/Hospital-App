<?php

namespace App\Services;

use App\Contracts\Dao\DoctorDaoInterface;
use App\Contracts\Services\DoctorServiceInterface;

class DoctorService implements DoctorServiceInterface
{
    /**
     * doctor Dao
     */
    private $doctorDao;

    /**
     * Class Constructor
     * @param DoctorDaoInterface
     * @return void
     */
    public function __construct(DoctorDaoInterface $userDao)
    {
        $this->doctorDao = $userDao;
    }

    /**
     * Show Doctor
     * @return object
    */
    public function get() : object
    {
        return $this->doctorDao->get();
    }

    /**
     * Store Doctor
     * @return void
    */
    public function store() : void
    {
        $this->doctorDao->store();
    }

    /**
     * Return Specific Doctor
     * @return object
    */
    public function edit($id) : object
    {
        return $this->doctorDao->edit($id);
    }

    /**
     * Update Doctor
     * @return void
    */
    public function update($id , array $data) : void
    {
        $this->doctorDao->update($id , $data);
    }

     /**
     * Destroy Doctor
     * @return void 
    */
    public function destroy($id) : void
    {
        $this->doctorDao->destroy($id);
    }

}