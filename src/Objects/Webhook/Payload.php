<?php

namespace ClickUpClient\Objects\Webhook;

class Payload
{
	/** 
	 * @var string
	 */
	public string $event;

	/** 
	 * @var string
	 */
	public string $task_id;

	/** 
	 * @var string
	 */
	public string $webhook_id;

	public function __construct(object $data, string $event)
	{
		$this->event = $event;

		if (property_exists($data, 'task_id')) {
			$this->task_id = strval($data->task_id);
		}

		if (property_exists($data, 'webhook_id')) {
			$this->webhook_id = strval($data->webhook_id);
		}
	}
}
