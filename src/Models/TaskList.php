<?php

namespace ClickUpClient\Models;

use ClickUpClient\Traits\CommentTrait;
use ClickUpClient\Traits\MemberTrait;

class TaskList extends AbstractModel
{
    use CommentTrait;
    use MemberTrait;
    public $model = 'list';
}
