<?php

namespace ClickUpClient\Models;

use ClickUpClient\Objects\Attachment;
use ClickUpClient\Objects\AttachmentCollection;
use ClickUpClient\Traits\CommentTrait;
use ClickUpClient\Traits\MemberTrait;
use ClickUpClient\Traits\CustomFieldsTrait;


class Task extends AbstractModel
{
    use CommentTrait;
    use MemberTrait;
    use CustomFieldsTrait;

    public $model = 'task';

    /**
     * addAssignee
     *
     * @param  string $member_id
     * @return bool
     */
    public function addAssignee(string $member_id): bool
    {
        $response = $this->update([
            'assignees' => [
                'add' => [
                    $member_id
                ]
            ]
        ]);
        return array_key_exists('id', $response);
    }
    /**
     * addAssignees
     *
     * @param  array $member_ids
     * @return bool
     */
    public function addAssignees(array $member_ids): bool
    {
        $response = $this->update([
            'assignees' => [
                'add' => $member_ids
            ]
        ]);

        return array_key_exists('id', $response);
    }

    /**
     * addAttachment
     *
     * @param  mixed $attachment
     * @return void
     */
    public function addAttachment(Attachment $attachment)
    {
        return $this->client()->multipart($this->model . DS . $this->id . DS . "attachment", $attachment->toArray());
    }

    /**
     * addAttachments
     *
     * @param  mixed $attachments
     * @return void
     */
    public function addAttachments(AttachmentCollection $attachments)
    {
        $response = [];
        foreach ($attachments as $attachment) {
            $response[] = $this->client()->multipart($this->model . DS . $this->id . DS . "attachment", $attachment->toArray());
        }

        return $response;
    }
}
