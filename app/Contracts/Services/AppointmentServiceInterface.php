<?php

namespace App\Contracts\Services;

/**
 * Interface for user service
*/
interface AppointmentServiceInterface
{
    /**
     * Show User
     * @return object
    */
    public function get() : object;

    /**
     * Store Appointment
     * @param array $data
     * @return object
    */
    public function store(array $data) : object;

    /**
     * Return Specific User
     * @return object
    */
    public function edit($id) : object;

    /**
     * Update Workout
     * @return void
    */
    public function update($id , array $data) : void;

     /**
     * Destroy User
     * @return void 
    */
    public function destroy($id) : void;
}