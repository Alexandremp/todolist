<?php

class User
{

    private $id;
    private $login;
    private $pass;
    private $locaTsodo;
    private $nrItens;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     * @return User
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocaTsodo()
    {
        return $this->locaTsodo;
    }

    /**
     * @param mixed $locaTsodo
     * @return User
     */
    public function setLocaTsodo($locaTsodo)
    {
        $this->locaTsodo = $locaTsodo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNrItens()
    {
        return $this->nrItens;
    }

    /**
     * @param mixed $nrItens
     * @return User
     */
    public function setNrItens($nrItens)
    {
        $this->nrItens = $nrItens;
        return $this;
    }
}