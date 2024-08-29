<h1 align='center'>
Unofficial <a href="http://clickup.com">ClickUp</a> API Client </br>see <a href="https://clickup.com/api">ClickUp Api Docs</a>

[![License: AGPL v3](https://img.shields.io/badge/License-AGPL%20v3-blue.svg)](https://www.gnu.org/licenses/agpl-3.0)
![](https://vsmarketplacebadge.apphb.com/version-short/edsol.clickup.svg
)
![](https://vsmarketplacebadge.apphb.com/downloads-short/edsol.clickup.svg
)
![](https://vsmarketplacebadge.apphb.com/rating-short/edsol.clickup.svg
)
</h1>



## Requirements

You need to have a ClickUp token, use [official guide](https://docs.clickup.com/en/articles/1367130-getting-started-with-the-clickup-api) to create one


## Install
```bash
composer require "edsol/clickup-php"
```

## Implementations

### Team
- [x] Read
- [x] get Spaces

### Space
- [x] Read
- [x] get Tags

### Folder
- [x] Create
- [x] Read
- [x] Create List

### Task
- [x] Create
- [x] Read
- [x] Update
- [x] Delete
- [x] Add attachment/s
- [x] Add assignee/s
- [x] Get members
    ### Comment
    - [x] Read
    - [x] Create
    - [x] Update
    - [x] Delete

### Webhook
- [x] List
- [x] Create
- [x] Update
- [x] Delete


## Usages

### Initialize client
```php
$clickup = new \ClickUpClient\Client('CLICK_UP_API_TOKEN');
```

### Team

```php
$clickup->team()->all();
$clickup->team()->spaces();
$clickup->team()->user('USER_ID');
```
### Space

```php
$clickup->space()->get("SPACE_ID");
$clickup->space('SPACE_ID')->tags();
$clickup->space('SPACE_ID')->folders();
$clickup->space('SPACE_ID')->folderlessLists();
```
### Folder

```php
$clickup->folder("SPACE_ID")->lists();
$clickup->folder("FOLDER_ID")->get();
$clickup->folder()->get("FOLDER_ID");
$clickup->folder("SPACE_ID")->create("FOLDER_NAME");
$clickup->folder("SPACE_ID")->createList("LIST_NAME");
```

### List
```php
$clickup->taskList("LIST_ID")->get();
$clickup->taskList("LIST_ID")->getTasks();
$clickup->taskList("LIST_ID")->comments();
$clickup->taskList("LIST_ID")->members();
$clickup->taskList("LIST_ID")->getCustomFields();
```

### Task
```php
$clickup->task("TASK_ID")->get();
$clickup->task("TASK_ID")->comments();
$clickup->task("TASK_ID")->members();

$clickup->task("TASK_ID")->add([
    "name": "Updated Task Name",
    "description": "Updated Task Content",
]);
$clickup->task("TASK_ID")->delete();
$clickup->task("TASK_ID")->update([
    "name": "Updated Task Name",
    "description": "Updated Task Content"
]);

$clickup->task("TASK_ID")->addAssignees([
    MEMBER_ID_1,
    MEMBER_ID_2,
]);
$clickup->task("TASK_ID")->addAssignee(MEMBER_ID);

$attachment = new \ClickUpClient\Objects\Attachment([
    'contents' => \GuzzleHttp\Psr7\Utils::tryFopen('FILE_PATH', 'r'),
    'filename' => 'filename.txt'
]);
$clickup->task("TASK_ID")->addAttachment($attachment);

$attachments = new \ClickUpClient\Objects\AttachmentCollection([
    [
        'contents' => \GuzzleHttp\Psr7\Utils::tryFopen('FILE_PATH', 'r'),
        'filename' => 'filename1.txt'
    ],
    [
        'contents' => \GuzzleHttp\Psr7\Utils::tryFopen('FILE_PATH', 'r'),
        'filename' => 'filename2.txt'
    ],
]);
$clickup->task("TASK_ID")->addAttachments($attachments);
$clickup->task("TASK_ID")->setCustomField("FIELD_ID","NEW_FIELD_VALUE");
$clickup->task("TASK_ID")->deleteCustomField("FIELD_ID");
```

### Comment
```php
$clickup->comment('COMMENT_ID')->update([
    'comment_text' => "update comment text"
]);
$clickup->comment()->deleteComment('COMMENT_ID');
```

### Webhook
```php
$clickup->team('TEAM_ID')->webhooks();
$clickup->team('TEAM_ID')->createWebhook([
    'endopint' => 'ENDPOINT_URL',
    'events' => [
        "taskCreated",
        "taskUpdated",
        "taskDeleted",
    ],
]);
$clickup->webhook('WEBHOOK_ID')->updateWebhook([
    'endopint' => 'ENDPOINT_URL',
    'events' => [
        "taskCreated",
        "taskUpdated",
        "taskDeleted",
    ],
]);
$clickup->webhook('WEBHOOK_ID')->delete();
```
