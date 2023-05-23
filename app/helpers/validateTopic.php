<?php

function validateTopic($topic)
{
    $errors = array();

    if (empty($topic['name'])) {
        array_push($errors, 'Nome é um campo obrigatório');
    }

    $existingTopic = selectOne('topics', ['name' => $post['name']]);
    if ($existingTopic) {
        if (isset($post['update-topic']) && $existingTopic['id'] != $post['id']) {
            array_push($errors, 'Categoria já existente');
        }

        if (isset($post['add-topic'])) {
            array_push($errors, 'Categoria já existente');
        }
    }

    return $errors;
}