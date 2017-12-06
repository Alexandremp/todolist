<?php

class TodoService extends AbstractService
{
    /**
     * @return TodoItem[]
     */
    public function getTodoListCollection()
    {
        $dbConnection = $this->getDatabaseConnection();
        $stmt = $dbConnection->prepare("SELECT * FROM todo_itens");

        $todoList = [];

        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
                $todoList[] = (new TodoItem())
                    ->setId($row["id"])
                    ->setText($row["text"])
                    ->setIsChecked($row["is_checked"]);
            }
        }
        return $todoList;
    }

    /**
     * @param $taskId
     * @return TodoItem[]
     */
    public function getTodoList($taskId)
    {
        $dbConnection = $this->getDatabaseConnection();
        $stmt = $dbConnection->prepare("SELECT * FROM todo_itens WHERE todo_list_id = ?");

        $todoList = [];

        if ($stmt->execute(array($taskId))) {
            while ($row = $stmt->fetch()) {
                $todoList[] = (new TodoItem())
                    ->setId($row["id"])
                    ->setText($row["text"])
                    ->setIsChecked($row["is_checked"]);
            }
        }
        return $todoList;
    }

    /**
     * @param TodoItem $todoContent
     * @return TodoItem
     */
    public function addTodoList($todoContent, $taskId)
    {
        $dbConnection = $this->getDatabaseConnection();
        $stmt = $dbConnection->prepare("INSERT INTO todo_itens (text, todo_list_id) VALUES (:text, :task)");
        $stmt->bindParam(':text', $todoContent->getText());
        $stmt->bindParam(':task', $taskId);
        $stmt->execute();
        $todoContent->setId($dbConnection->lastInsertId());
        return $todoContent;
    }

    /**
     * @param TodoItem $todoContent
     * @return bool
     */
    public function updateTodoList($todoContent)
    {
        $dbConnection = $this->getDatabaseConnection();
        $stmt = $dbConnection->prepare("UPDATE todo_itens SET text = :text WHERE id = :id");
        $stmt->bindParam(':text', $todoContent->getText());
        $stmt->bindParam(':id', $todoContent->getId());
        return $stmt->execute();
    }

    /**
     * @param $itemId
     * @return bool
     */
    public function removeTodoList($itemId)
    {
        $dbConnection = $this->getDatabaseConnection();
        $stmt = $dbConnection->prepare("DELETE FROM todo_itens WHERE id = :itemId");
        $stmt->bindParam(':itemId', $itemId);
        return $stmt->execute();
    }


    /**
     * @param int[] $itemIds
     */
    public function removeElements($itemIds)
    {
        $dbConnection = $this->getDatabaseConnection();
        $in = str_repeat('?,', count($itemIds) - 1) . '?';
        $stmt = $dbConnection->prepare("DELETE FROM todo_itens WHERE id in ($in)");
        return $stmt->execute($itemIds);
    }

    /**
     * @return Tasks[]
     */
    public function getTasks()
    {
        $db = $this->getDatabaseConnection();
        $stmt = $db->prepare("SELECT * FROM todo_list WHERE id_user = :user");
        $stmt->bindParam(':user', $this->getUserId());

        $tasks = [];

        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
                $tasks[] = (new Tasks())
                    ->setId($row['id'])
                    ->setTaskName($row['name']);
            }
        }
        return $tasks;
    }

    public function addNewTask($taskName)
    {
        $db = $this->getDatabaseConnection();
        $stmt = $db->prepare("INSERT INTO todo_list(name, id_user) VALUES (:name, :user)");
        $stmt->bindParam(':name', $taskName);
        $stmt->bindParam(':user', $this->getUserId());
        return $stmt->execute();

    }

    public function deleteTask($taskId) {
        $db = $this->getDatabaseConnection();
        $stmt = $db->prepare("DELETE FROM todo_list WHERE id = :task");
        $stmt->bindParam(':task', $taskId);
        return $stmt->execute();
    }
}