A simple wrapper for [ClickUp](https://clickup.com/) API (v2).


## Install
```bash
composer require "edsol/clickup-php"
```

## Team

### get all
```php
$this->team()->all();
```
### get all spaces
```php
$this->team("12345")->spaces();
```



## Comment

### get Task comment
```php
$this->task("12345")->comments();
```

### get List comment
```php
$this->list("12345")->comments();
```

### create
```php
$this->task("12345")->createComment([
            "comment_text": "Task comment content",
            // "assignee": 183,
            // "notify_all": true
        ]);
```

## Folder

### get folder
```php
$this->folder("12345")->get();
```

or

```php
$this->folder()->get("12345");
```

## Space

### get all spaces
```php
$this->space()->all();
```
or

```php
$this->space()->get("12345");
```

### get tasks
```php
$this->space("12345")->get();
```
