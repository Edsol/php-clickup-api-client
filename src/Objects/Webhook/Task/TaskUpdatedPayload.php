<?php

namespace ClickUpClient\Objects\Webhook\Task;

use ClickUpClient\Objects\Webhook\WithHistoryItemsPayload;

class TaskUpdatedPayload extends WithHistoryItemsPayload
{
	public function __construct(object $data)
	{
		parent::__construct($data, 'taskUpdated');
	}
}
