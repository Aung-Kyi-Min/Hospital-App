<?php

namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for task
 */
interface UserDaoInterface
{
    /**
     * Show User
     * @return object
    */
    public function get() : object;

    /**
     * Store User
     * @return void
    */
    public function store() : void;

    /**
     * Return Specific User
     * @return object
    */
    public function edit($id) : object;

    /**
     * Update User
     * @return void
    */
    public function update($id , array $data) : void;

     /**
     * Destroy User
     * @return void 
    */
    public function destroy($id) : void;
}