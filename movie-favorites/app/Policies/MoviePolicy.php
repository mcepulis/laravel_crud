<?php

namespace App\Policies;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MoviePolicy
{
    public function view(User $user, Movie $movie)
    {
        return $user->id === $movie->user_id;
    }

    public function update(User $user, Movie $movie)
    {
        return $user->id === $movie->user_id;
    }

    public function delete(User $user, Movie $movie)
    {
        return $user->id === $movie->user_id;
    }
}