<?php

namespace ClickUpClient\Objects\Webhook\Task;

use ClickUpClient\Objects\Webhook\WithHistoryItemsPayload;

class TaskTagUpdatedPayload extends WithHistoryItemsPayload
{
	public function __construct(object $data)
	{
		parent::__construct($data, 'taskTagUpdated');
	}
}
