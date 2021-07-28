<?php

function isAdmin():bool {
    return Auth::user()->is_admin;
}
