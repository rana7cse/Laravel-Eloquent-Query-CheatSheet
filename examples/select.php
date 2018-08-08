<?php
/*
 * Diffrent type of selecting way in eloquent query builder
 * */
$query = User::query();
$query->select('name','phone','email');
$query->select('name as n','phone as p','email as e');
$query->select(['name','phone','email']);
$query->select(['name as n','phone as p','email as e']);
$query->selectRaw("name,phone,email,(age) * ? as doubleAge",[2]); // pass a data binding with ? and last argument as value on array