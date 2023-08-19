<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

if (!function_exists('active_link')) {
    function active_link(string $name, string $active = 'active'): string
    {
        return Route::is($name) ? $active : '';
    }
}

if (!function_exists('author_comment')) {
    function author_comment(int $user_id)
    {
        $users = User::where('id', $user_id)->get();
        foreach ($users as $user) {
            return ($user->name);
        }
        //return DB::select("SELECT name FROM users WHERE id = $user_id");
    }
}