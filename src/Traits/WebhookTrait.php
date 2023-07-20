<?php

namespace ClickUpClient\Traits;

trait WebhookTrait
{
    /**
     * supported events list
     *
     * @var array
     */
    public $events_list = [
        "*",
        "taskCreated",
        "taskUpdated",
        "taskDeleted",
        "taskPriorityUpdated",
        "taskStatusUpdated",
        "taskAssigneeUpdated",
        "taskDueDateUpdated",
        "taskTagUpdated",
        "taskMoved",
        "taskCommentPosted",
        "taskCommentUpdated",
        "taskTimeEstimateUpdated",
        "taskTimeTrackedUpdated",
        "listCreated",
        "listUpdated",
        "listDeleted",
        "folderCreated",
        "folderUpdated",
        "folderDeleted",
        "spaceCreated",
        "spaceUpdated",
        "spaceDeleted",
        "goalCreated",
        "goalUpdated",
        "goalDeleted",
        "keyResultCreated",
        "keyResultUpdated",
        "keyResultDeleted"

    ];
    /**
     * webhooks
     *
     * @return void
     */
    public function webhooks()
    {
        $this->checkId();
        return $this->client->get($this->model . DS . $this->id . DS . "webhook");
    }

    /**
     * createWebhook
     *
     * @param  array $data
     * @return void
     */
    public function createWebhook(array $data)
    {
        if (!array_key_exists('endpoint', $data) and !array_key_exists('events', $data)) {
            throw new \Exception("`Endpoint` and `Events` keys are required", 1);
        }
        return $this->client->post($this->model . DS . $this->id . DS . 'webhook', $data);
    }
    /**
     * updateWebhook
     *
     * @param  array $data
     * @return void
     */
    public function updateWebhook(array $data = [])
    {
        return $this->client->put($this->model . DS . $this->id, $data);
    }

    /**
     * deleteWebhook
     *
     * @return void
     */
    public function deleteWebhook()
    {
        $this->checkId();
        return $this->client->delete($this->model . DS . $this->id);
    }
}
