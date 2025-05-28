<?php

namespace ClickUpClient\Objects\Webhook;

use ClickUpClient\Objects\User;

class HistoryItem
{
	/** 
	 * @var string
	 */
	public string $date;

	/** 
	 * @var string
	 */
	public string $field;

	/** 
	 * @var User
	 */
	public User $user;

	/**
	 * @var mixed
	 */
	public mixed $before = null;

	/**
	 * @var mixed
	 */
	public mixed $after = null;

	public function __construct(object $data)
	{
		if (property_exists($data, 'date')) {
			$this->date = strval($data->date);
		}

		if (property_exists($data, 'field')) {
			$this->field = strval($data->field);
		}

		if (property_exists($data, 'user')) {
			if (is_object($data->user)) {
				$this->user = new User($data->user);
			}
		}

		if (property_exists($data, 'before')) {
			if ($data->before !== null) {
				$this->before = $data->before;
			}
		}

		if (property_exists($data, 'after')) {
			if ($data->after !== null) {
				$this->after = $data->after;
			}
		}
	}
}
