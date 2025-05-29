<?php

namespace ClickUpClient\Objects\Webhook\Task;

use ClickUpClient\Objects\Webhook\CommentHistoryItem;
use ClickUpClient\Objects\Webhook\Payload;

/**
 * @property CommentHistoryItem[] $history_items
 */
class TaskCommentUpdatedPayload extends Payload
{
	public function __construct(object $data)
	{
		parent::__construct($data, 'taskCommentUpdated');

		$this->history_items = [];
		if (property_exists($data, 'history_items')) {
			if (is_array($data->history_items) && !empty($data->history_items)) {
				foreach ($data->history_items as $history_item) {
					if (is_object($history_item)) {
						$this->history_items[] = new CommentHistoryItem($history_item);
					}
				}
			}
		}
	}
}
