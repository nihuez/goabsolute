<?php

function validateUser($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Username é um campo obrigatório');
    }

    if (empty($user['email'])) {
        array_push($errors, 'Email é um campo obrigatório');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Senha é um campo obrigatório');
    }

    if ($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'A senha não confere');
    }

    // $existingUser = selectOne('users', ['email' => $user['email']]);
    // if ($existingUser) {
    //     array_push($errors, 'Email already exists');
    // }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Email já cadastrado');
        }

        if (isset($user['create-admin'])) {
            array_push($errors, 'Email já cadastrado');
        }
    }

    return $errors;
}


function validateLogin($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Username é um campo obrigatório');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Senha é um campo obrigatório');
    }

    return $errors;
}