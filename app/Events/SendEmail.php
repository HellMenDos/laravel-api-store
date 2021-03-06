<?php

namespace App\Events;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class SendEmail
{


    public $email;

    private $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
    private $numChars = '';
    public $string = '';

    /**
     * Create a new event instance.
     * @param string email
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;

        $this->random(6);

        $user = User::where('email',$this->email)->first();;
        $user->password = Hash::make($this->string);
        $user->save();
    }


    // finction random which return random string for password
    public function random($amount) {
        $this->numChars = strlen($this->chars);
        for ($i = 0; $i < $amount; $i++) {
            $this->string .= substr($this->chars, rand(1, $this->numChars) - 1, 1);
        }
        return $this->string;
    }
 
}
