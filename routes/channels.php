<?php

use Illuminate\Support\Facades\Broadcast;



Broadcast::channel('admin-channel', function ($user) {
    return $user->is_admin;
});
