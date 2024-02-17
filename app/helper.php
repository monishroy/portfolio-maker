<?php

use App\Models\User;

function getUser($userId)
{
    return User::where('id', $userId)->first();
}
