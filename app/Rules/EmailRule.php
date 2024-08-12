<?php
namespace App\Rules;
     
     use Illuminate\Contracts\Validation\Rule;
     use App\Models\User;
     
     class EmailRule implements Rule
     {
     public function passes($attribute, $value)
     {
     // Your custom validation logic here
     if(User::where('email', $value)->exists()){
       return false;
     }
     // Return true if valid, false otherwise
     return true;
     }
     
     public function message()
     {
     return 'This email is registered';
     }
     }