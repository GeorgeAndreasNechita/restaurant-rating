<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Rating;
use App\Models\Restaurant;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        foreach (Restaurant::all() as $key => $value) {
            // Log::channel('dev-debugging')->info('', ['key' => $key,'value'=>$value]);
            $rating = new Rating;
            $rating->user_id = $user->id;
            $rating->restaurant_id = $value->id;
            $rating->rating = 3;
            $rating->comment = '';
            $rating->save();
        }
        return $user;
    }
}
