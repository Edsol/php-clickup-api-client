<?php

namespace ClickUpClient\Objects\Webhook;

class StatusHistoryItemAfter
{
	/**
	 * @var string
	 */
	public string $status;

	/**
	 * @var string
	 */
	public string $color;

	/**
	 * @var string
	 */
	public string $orderindex;

	/**
	 * @var string
	 */
	public string $type;

	public function __construct(object $data)
	{
		if (property_exists($data, 'status')) {
			$this->status = strval($data->status);
		}

		if (property_exists($data, 'color')) {
			$this->color = strval($data->color);
		}

		if (property_exists($data, 'orderindex')) {
			$this->orderindex = strval($data->orderindex);
		}

		if (property_exists($data, 'type')) {
			$this->type = strval($data->type);
		}
	}
}
