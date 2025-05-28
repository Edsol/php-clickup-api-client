<?php

namespace ClickUpClient\Objects;

class User
{
	/** 
	 * @var int
	 */
	public int $id;

	/** 
	 * @var string
	 */
	public string $username;

	/** 
	 * @var string
	 */
	public string $email;

	/** 
	 * @var string
	 */
	public string $color;

	/** 
	 * @var string
	 */
	public string $initials;

	/** 
	 * @var string|null
	 */
	public $profilePicture = null;

	public function __construct(object $data)
	{
		if (property_exists($data, 'id')) {
			$this->id = intval($data->id);
		}

		if (property_exists($data, 'username')) {
			$this->username = strval($data->username);
		}

		if (property_exists($data, 'color')) {
			$this->color = strval($data->color);
		}

		if (property_exists($data, 'initials')) {
			$this->initials = strval($data->initials);
		}

		if (property_exists($data, 'profilePicture')) {
			if ($data->profilePicture !== null) {
				$this->profilePicture = strval($data->profilePicture);
			}
		}
	}
}
