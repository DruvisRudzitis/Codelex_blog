<?php

namespace App\Controllers;

class CommentsController
{
    public function store(array $vars)
    {
        $articleId = (int) $vars['id'];

        query()
            ->insert('comments')
            ->values([
                'article_id' => ':articleId',
                'name' => ':name',
                'content' => ':content'
            ])
            ->setParameters([
                'articleId' => $articleId,
                'name' => $_POST['name'],
                'content' => $_POST['content'],
            ])
            ->execute();

        header('Location: /articles/' . $articleId);
    }


    public function delete(array $vars)
    {


        $commentQuery = query()
            ->delete('comments')
            ->where('id = :id')
            ->setParameter('id', $_POST['comment'])
            ->execute();

        header('Location: /articles/' . $vars['id']);
    }


}