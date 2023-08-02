<?php

namespace App\Repository;

use App\Models\User;


class AuthenticatedRepository
{
 public function getUserName($request){
     $user = User::where('email', $request->email)->first();
     return $user;
 }
}
