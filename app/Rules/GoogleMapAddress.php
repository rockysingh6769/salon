<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class GoogleMapAddress implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $prepAddr = str_replace(' ','+',$value);
        $sd = urlencode( $prepAddr );
       
        $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$sd.'&key=');
        $output= json_decode($geocode);
        $status = $output->status;
        return $status == "OK";
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Wrong Address';
    }
}
