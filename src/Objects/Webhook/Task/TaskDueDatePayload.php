<?php

namespace ClickUpClient\Objects\Webhook\Task;

use ClickUpClient\Objects\Webhook\HistoryItem;

class TaskDueDatePayload
{
	/** 
	 * @var string
	 */
	public string $event = 'taskDueDateUpdated';

	/** 
	 * @var HistoryItem[]
	 */
	public array $history_items = [];

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
		if (property_exists($data, 'history_items')) {
			if (is_array($data->history_items) && !empty($data->history_items)) {
				foreach ($data->history_items as $history_item) {
					if (is_object($history_item)) {
						$this->history_items[] = new HistoryItem($history_item);
					}
				}
			}
		}

		if (property_exists($data, 'task_id')) {
			$this->task_id = strval($data->task_id);
		}

		if (property_exists($data, 'webhook_id')) {
			$this->webhook_id = strval($data->webhook_id);
		}
	}
}
