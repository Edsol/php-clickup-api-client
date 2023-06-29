<?php

namespace ClickUpClient\Models;

use \ClickUpClient\CommentTrait;

class Comment extends AbstractModel
{
    use CommentTrait;

    public $model = 'comment';
}
