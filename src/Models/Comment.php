<?php

namespace ClickUpClient\Models;

use \ClickUpClient\Traits\CommentTrait;

class Comment extends AbstractModel
{
    use CommentTrait;

    public $model = 'comment';
}
