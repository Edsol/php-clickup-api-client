<?php

namespace ClickUpClient\Objects\Webhook\Task;

class TaskDeletedPayload
{
	/** 
	 * @var string
	 */
	public string $event = 'taskDeleted';

	/** 
	 * @var string
	 */
	public string $task_id;

	/** 
	 * @var string
	 */
	public string $webhook_id;

	public function __construct(object $data)
	{
		if (property_exists($data, 'task_id')) {
			$this->task_id = strval($data->task_id);
		}

		if (property_exists($data, 'webhook_id')) {
			$this->webhook_id = strval($data->webhook_id);
		}
	}
}
