<?php

namespace App\Contracts\Services;

/**
 * Interface for user service
*/
interface UserServiceInterface
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