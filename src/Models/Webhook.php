<?php

namespace ClickUpClient\Models;

use ClickUpClient\Traits\WebhookTrait;

class Webhook extends AbstractModel
{

    use WebhookTrait;

    public $model = 'webhook';
}
