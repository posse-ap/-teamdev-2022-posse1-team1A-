<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\AccountStatus;
use App\Models\User;

class ActiveAccount implements Rule
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
        if (User::where('email', $value)->first()) {
            $userAccountStatus = User::where('email', $value)->first()->account_status_id;
            return $userAccountStatus === AccountStatus::getActiveId();
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '有効なアカウントではありません。';
    }
}
