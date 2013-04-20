<?php

namespace Am\PresenceBundle\Util;


abstract class BaseManager
{
    protected $em;
    protected $class;

    public function getClass()
    {
        return $this->class;
    }

    public function getEntityManager()
    {
        return $this->em;
    }

    abstract protected function getRepository();


    public function create()
    {
        $class = $this->getClass();

        return new $class();
    }

    public function delete($entity)
    {
        $this->remove($entity);
    }

    protected function remove($entity)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    public function findOneBy(Array $fields)
    {
        return $this->getRepository()->findOneBy($fields);
    }

    public function findBy(Array $fields)
    {
        return $this->getRepository()->findBy($fields);
    }

    public function find($id)
    {
        return $this->getRepository()->find($id);
    }

    public function findAll()
    {
        return $this->getRepository()->findAll();
    }

    public function persist($entity)
    {
        return $this->getEntityManager()->persist($entity);
    }

    protected function persistAndFlush($entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function flush($entity)
    {
        return $this->getEntityManager()->flush($entity);
    }

    public function save($entity)
    {
        $this->persistAndFlush($entity);
    }

}