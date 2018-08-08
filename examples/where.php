<?php
/*
 * General where and clause
 * */
$query = User::where('email','ranaXcse@gmail.com')->where('password','******'); // general where query
$query = User::where([
    'email' => 'ranaXcse@gmail.com',
    'password' => '******'
]);

//Or where
$query = User::where('email','ranaXcse@gmail.com');