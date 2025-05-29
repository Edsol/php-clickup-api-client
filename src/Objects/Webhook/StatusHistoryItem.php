<?php

namespace ClickUpClient\Objects\Webhook;

/**
 * @property StatusHistoryItemBefore $before
 * @property StatusHistoryItemAfter $after
 */
class StatusHistoryItem extends HistoryItem
{
	public function __construct(object $data)
	{
		parent::__construct($data);

		if (property_exists($data, 'before')) {
			if (is_object($data->before)) {
				$this->before = new StatusHistoryItemBefore($data->before);
			}
		}

		if (property_exists($data, 'after')) {
			if (is_object($data->after)) {
				$this->after = new StatusHistoryItemAfter($data->after);
			}
		}
	}
}
