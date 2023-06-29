<?php

namespace ClickUpClient\Models;

use \ClickUpClient\CommentTrait;
use \ClickUpClient\MemberTrait;

class TaskList extends AbstractModel
{
    use CommentTrait;
    use MemberTrait;
    public $model = 'list';
}
