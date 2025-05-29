<?php

namespace ClickUpClient\Objects\Webhook;

class WithHistoryItemsPayload extends Payload
{
	/** 
	 * @var HistoryItem[]
	 */
	public array $history_items = [];

	public function __construct(object $data, string $event)
	{
		parent::__construct($data, $event);

		if (property_exists($data, 'history_items')) {
			if (is_array($data->history_items) && !empty($data->history_items)) {
				foreach ($data->history_items as $history_item) {
					if (is_object($history_item)) {
						$this->history_items[] = new HistoryItem($history_item);
					}
				}
			}
		}
	}
}
