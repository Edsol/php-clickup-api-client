<?php

namespace ClickUpClient\Objects\Webhook;

use ClickUpClient\Objects\User;

class Comment
{
	/**
	 * @var string
	 */
	public string $id;

	/**
	 * @var string
	 */
	public string $date;

	/**
	 * @var string
	 */
	public string $parent;

	/**
	 * @var int
	 */
	public int $type;

	/**
	 * @var array
	 */
	public array $comment = [];

	/**
	 * @var string
	 */
	public string $text_content;

	/**
	 * @var mixed
	 */
	public $x = null;

	/**
	 * @var mixed
	 */
	public $y = null;

	/**
	 * @var mixed
	 */
	public $image_y = null;

	/**
	 * @var mixed
	 */
	public $image_x = null;

	/**
	 * @var mixed
	 */
	public $page = null;

	/**
	 * @var mixed
	 */
	public $comment_number = null;

	/**
	 * @var mixed
	 */
	public $page_id = null;

	/**
	 * @var mixed
	 */
	public $page_name = null;

	/**
	 * @var mixed
	 */
	public $view_id = null;

	/**
	 * @var mixed
	 */
	public $view_name = null;

	/**
	 * @var mixed
	 */
	public $team = null;

	/**
	 * @var User
	 */
	public User $user;

	/**
	 * @var int
	 */
	public int $new_thread_count = 0;

	/**
	 * @var int
	 */
	public int $new_mentioned_thread_count = 0;

	/**
	 * @var array
	 */
	public array $email_attachments = [];

	/**
	 * @var array
	 */
	public array $threaded_users = [];

	/**
	 * @var int
	 */
	public int $threaded_replies = 0;

	/**
	 * @var int
	 */
	public int $threaded_assignees = 0;

	/**
	 * @var array
	 */
	public array $threaded_assignees_members = [];

	/**
	 * @var int
	 */
	public int $threaded_unresolved_count = 0;

	/** 
	 * @var User[]
	 */
	public array $thread_followers = [];

	/**
	 * @var array
	 */
	public array $group_thread_followers = [];

	/**
	 * @var array
	 */
	public array $reactions = [];

	/**
	 * @var array
	 */
	public array $emails = [];

	public function __construct(object $data)
	{
		if (property_exists($data, 'id')) {
			$this->id = strval($data->id);
		}

		if (property_exists($data, 'date')) {
			$this->date = strval($data->date);
		}

		if (property_exists($data, 'parent')) {
			$this->parent = strval($data->parent);
		}

		if (property_exists($data, 'type')) {
			$this->type = intval($data->type);
		}

		if (property_exists($data, 'comment')) {
			if (is_array($data->comment) && !empty($data->comment)) {
				$this->comment = $data->comment;
			}
		}

		if (property_exists($data, 'text_content')) {
			$this->text_content = strval($data->text_content);
		}

		if (property_exists($data, 'x')) {
			if ($data->x !== null) {
				$this->x = $data->x;
			}
		}

		if (property_exists($data, 'y')) {
			if ($data->y !== null) {
				$this->y = $data->y;
			}
		}

		if (property_exists($data, 'image_y')) {
			if ($data->image_y !== null) {
				$this->image_y = $data->image_y;
			}
		}

		if (property_exists($data, 'image_x')) {
			if ($data->image_x !== null) {
				$this->image_x = $data->image_x;
			}
		}

		if (property_exists($data, 'page')) {
			if ($data->page !== null) {
				$this->page = $data->page;
			}
		}

		if (property_exists($data, 'comment_number')) {
			if ($data->comment_number !== null) {
				$this->comment_number = $data->comment_number;
			}
		}

		if (property_exists($data, 'page_id')) {
			if ($data->page_id !== null) {
				$this->page_id = $data->page_id;
			}
		}

		if (property_exists($data, 'page_name')) {
			if ($data->page_name !== null) {
				$this->page_name = $data->page_name;
			}
		}

		if (property_exists($data, 'view_id')) {
			if ($data->view_id !== null) {
				$this->view_id = $data->view_id;
			}
		}

		if (property_exists($data, 'view_name')) {
			if ($data->view_name !== null) {
				$this->view_name = $data->view_name;
			}
		}

		if (property_exists($data, 'team')) {
			if ($data->team !== null) {
				$this->team = $data->team;
			}
		}

		if (property_exists($data, 'user')) {
			if (is_object($data->user)) {
				$this->user = new User($data->user);
			}
		}

		if (property_exists($data, 'new_thread_count')) {
			$this->new_thread_count = intval($data->new_thread_count);
		}

		if (property_exists($data, 'new_mentioned_thread_count')) {
			$this->new_mentioned_thread_count = intval($data->new_mentioned_thread_count);
		}

		if (property_exists($data, 'email_attachments')) {
			if (is_array($data->email_attachments) && !empty($data->email_attachments)) {
				$this->email_attachments = $data->email_attachments;
			}
		}

		if (property_exists($data, 'threaded_users')) {
			if (is_array($data->threaded_users) && !empty($data->threaded_users)) {
				$this->threaded_users = $data->threaded_users;
			}
		}

		if (property_exists($data, 'threaded_replies')) {
			$this->threaded_replies = intval($data->threaded_replies);
		}

		if (property_exists($data, 'threaded_assignees')) {
			$this->threaded_assignees = intval($data->threaded_assignees);
		}

		if (property_exists($data, 'threaded_assignees_members')) {
			if (is_array($data->threaded_assignees_members) && !empty($data->threaded_assignees_members)) {
				$this->threaded_assignees_members = $data->threaded_assignees_members;
			}
		}

		if (property_exists($data, 'threaded_unresolved_count')) {
			$this->threaded_unresolved_count = intval($data->threaded_unresolved_count);
		}

		if (property_exists($data, 'thread_followers')) {
			if (is_array($data->thread_followers) && !empty($data->thread_followers)) {
				foreach ($data->thread_followers as $thread_follower) {
					if (is_object($thread_follower)) {
						$this->thread_followers[] = new User($thread_follower);
					}
				}
			}
		}

		if (property_exists($data, 'group_thread_followers')) {
			if (is_array($data->group_thread_followers) && !empty($data->group_thread_followers)) {
				$this->group_thread_followers = $data->group_thread_followers;
			}
		}

		if (property_exists($data, 'reactions')) {
			if (is_array($data->reactions) && !empty($data->reactions)) {
				$this->reactions = $data->reactions;
			}
		}

		if (property_exists($data, 'emails')) {
			if (is_array($data->emails) && !empty($data->emails)) {
				$this->emails = $data->emails;
			}
		}
	}
}
