<?php

class TodoItem {

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * @var bool
     */
    private $isChecked;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return TodoItem
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return TodoItem
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return bool
     */
    public function isChecked()
    {
        return $this->isChecked;
    }

    /**
     * @param bool $isChecked
     * @return TodoItem
     */
    public function setIsChecked($isChecked)
    {
        $this->isChecked = $isChecked;
        return $this;
    }
}