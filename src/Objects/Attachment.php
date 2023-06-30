<?php

namespace ClickUpClient\Objects;

class Attachment
{
    protected string $name = 'attachment';
    protected $contents;
    protected string $filename;

    public function __construct(array $args)
    {
        if (!is_string($args['filename'])) {
            throw new \InvalidArgumentException("`filename` must be a string");
        }
        if (!is_resource($args['contents'])) {
            throw new \InvalidArgumentException("`content` bust be an resource");
        }
        $this->contents = $args['contents'];
        $this->filename = $args['filename'];
    }

    /**
     * toArray
     *
     * @return void
     */
    public function toArray()
    {
        return [
            'name' => $this->name,
            'contents' => $this->contents,
            'filename' => $this->filename,
        ];
    }
}
