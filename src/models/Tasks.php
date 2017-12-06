<?php

class Tasks
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $taskName;

    /**
     * @var TodoItem[]
     */
    private $todoList;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Tasks
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return Tasks
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaskName()
    {
        return $this->taskName;
    }

    /**
     * @param string $taskName
     * @return Tasks
     */
    public function setTaskName($taskName)
    {
        $this->taskName = $taskName;
        return $this;
    }

    /**
     * @return TodoItem[]
     */
    public function getTodoList()
    {
        return $this->todoList;
    }

    /**
     * @param TodoItem[] $todoList
     * @return Tasks
     */
    public function setTodoList($todoList)
    {
        $this->todoList = $todoList;
        return $this;
    }
}