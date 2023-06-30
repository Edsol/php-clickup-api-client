<?php

namespace ClickUpClient\Models;

use ClickUpClient\Traits\CommentTrait;
use ClickUpClient\Traits\MemberTrait;

class Task extends AbstractModel
{
    use CommentTrait;
    use MemberTrait;

    public $model = 'task';

    public function addAttachment()
    {
    }
}
