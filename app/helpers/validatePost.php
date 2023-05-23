<?php


function validatePost($post)
{
    $errors = array();

    if (empty($post['title'])) {
        array_push($errors, 'Titulo é um campo obrigatório');
    }

    if (empty($post['body'])) {
        array_push($errors, 'Corpo do texto é um campo obrigatório');
    }

    if (empty($post['topic_id'])) {
        array_push($errors, 'Por favor selecione uma categoria');
    }

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost) {
        if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
            array_push($errors, 'Titulo de post já existente');
        }

        if (isset($post['add-post'])) {
            array_push($errors, 'Titulo de post já existente');
        }
    }

    return $errors;
}