<?php

namespace App\Contracts\Services;

/**
 * Interface for Doctor service
*/
interface DoctorServiceInterface
{
    /**
     * Show Doctor
     * @return object
    */
    public function get() : object;

    /**
     * Store Doctor
     * @return void
    */
    public function store() : void;

    /**
     * Return Specific Doctor
     * @return object
    */
    public function edit($id) : object;

    /**
     * Update Doctor
     * @return void
    */
    public function update($id , array $data) : void;

     /**
     * Destroy Doctor
     * @return void 
    */
    public function destroy($id) : void;
}