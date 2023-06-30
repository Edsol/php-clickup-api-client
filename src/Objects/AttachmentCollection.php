<?php

namespace ClickUpClient\Objects;

use Countable;
use Iterator;
use ArrayAccess;

class AttachmentCollection implements Countable, Iterator, ArrayAccess
{
    private $attachments;
    private $position = 0;

    public function __construct(array $attachments)
    {
        foreach ($attachments as $attachment) {
            $this->offsetSet('', $attachment);
        }
    }

    /**
     * Implementation of method declared in \Countable.
     * Provides support for count()
     */
    public function count(): int
    {
        return count($this->attachments);
    }

    /**
     * Implementation of method declared in \Iterator
     * Resets the internal cursor to the beginning of the array
     */
    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * Implementation of method declared in \Iterator
     * Used to get the current key (as for instance in a foreach()-structure
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Implementation of method declared in \Iterator
     * Used to get the value at the current cursor position
     */
    public function current()
    {
        return $this->attachments[$this->position];
    }

    /**
     * Implementation of method declared in \Iterator
     * Used to move the cursor to the next position
     */
    public function next(): void
    {
        $this->position++;
    }

    /**
     * Implementation of method declared in \Iterator
     * Checks if the current cursor position is valid
     */
    public function valid(): bool
    {
        return isset($this->attachments[$this->position]);
    }

    /**
     * Implementation of method declared in \ArrayAccess
     * Used to be able to use functions like isset()
     */
    public function offsetExists($offset): bool
    {
        return isset($this->attachments[$offset]);
    }

    /**
     * Implementation of method declared in \ArrayAccess
     * Used for direct access array-like ($collection[$offset]);
     */
    public function offsetGet($offset)
    {
        return $this->attachments[$offset];
    }

    /**
     * Implementation of method declared in \ArrayAccess
     * Used for direct setting of values
     */
    public function offsetSet($offset, $value): void
    {
        // if (!is_int($value)) {
        //     throw new \InvalidArgumentException("Must be an int");
        // }
        $attachment = new Attachment($value);

        if (empty($offset)) { //this happens when you do $collection[] = 1;
            $this->attachments[] = $attachment;
        } else {
            $this->attachments[$offset] = $attachment;
        }
    }

    /**
     * Implementation of method declared in \ArrayAccess
     * Used for unset()
     */
    public function offsetUnset($offset): void
    {
        unset($this->attachments[$offset]);
    }

    public function toArray(): array
    {
        $response = [];

        foreach ($this->attachments as $attachement) {
            $response[] = $attachement->toArray();
        }

        return $response;
    }
}
