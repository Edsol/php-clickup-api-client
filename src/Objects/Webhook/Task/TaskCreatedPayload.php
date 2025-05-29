<?php

namespace ClickUpClient\Objects\Webhook\Task;

use ClickUpClient\Objects\Webhook\Payload;

class TaskCreatedPayload extends Payload
{
	public function __construct(object $data)
	{
		parent::__construct($data, 'taskCreated');
	}
}
