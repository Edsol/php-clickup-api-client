<?php

namespace ClickUpClient\Models;

use \ClickUpClient\CommentTrait;
use \ClickUpClient\MemberTrait;

class Task extends AbstractModel
{
    use CommentTrait;
    use MemberTrait;

    public $model = 'task';
}
