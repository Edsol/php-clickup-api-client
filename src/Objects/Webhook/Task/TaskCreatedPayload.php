<?php

namespace ClickUpClient\Objects\Webhook\Task;

use ClickUpClient\Objects\Webhook\WithHistoryItemsPayload;

class TaskCreatedPayload extends WithHistoryItemsPayload
{
	public function __construct(object $data)
	{
		parent::__construct($data, 'taskCreated');
	}
}
