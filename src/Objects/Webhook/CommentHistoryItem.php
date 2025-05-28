<?php

namespace ClickUpClient\Objects\Webhook;

class CommentHistoryItem extends HistoryItem
{
	/**
	 * @var Comment
	 */
	public Comment $comment;

	public function __construct(object $data)
	{
		parent::__construct($data);

		if (property_exists($data, 'comment')) {
			if (is_object($data->comment)) {
				$this->comment = new Comment($data->comment);
			}
		}
	}
}
