<?php

namespace hypefit\TO;

class ComentarioRutina
{

    /**
     * @param int Longitud máxima del título de un evento.
     */
    const TITLE_MAX_SIZE = 255;

    /**
     * @param string Formato de fecha y hora compatible con MySQL.
     */
    const MYSQL_DATE_TIME_FORMAT= 'Y-m-d H:i:s';

    /**
     * @param array[string] Nombre de las propiedades de la clase.
     */
    const PROPERTIES = ['id', 'userId', 'title', 'start', 'end'];

    private $id;

    private $userId;

    private $title;

    private $start;

    private $end;

    private function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId(int $userId)
    {
        if (is_null($userId)) {
            throw new \BadMethodCallException('$userId no puede ser una cadena vacía o nulo');
        }
        $this->userId = $userId;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        if (is_null($title)) {
            throw new \BadMethodCallException('$title no puede ser una cadena vacía o nulo');
        }

        if (mb_strlen($title) > self::TITLE_MAX_SIZE) {
            throw new \BadMethodCallException('$title debe tener como longitud máxima: '.self::TITLE_MAX_SIZE);
        }
        $this->title = $title;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setStart(\DateTime $start)
    {
        if (empty($start)) {
            throw new \BadMethodCallException('$start debe ser un timestamp valido no nulo');
        }
        if (! is_null($this->end) ) {
            self::compruebaConsistenciaFechas($start, $this->end);
        }
        $this->start = $start;
    }

    public function getEnd()
    {
        if (empty($end)) {
            throw new \BadMethodCallException('$end debe ser un timestamp valido no nulo');
        }

        return $this->end;
    }

    public function setEnd(\DateTime $end)
    {
        if (empty($end)) {
            throw new \BadMethodCallException('$end debe ser un timestamp valido no nulo');
        }

        self::compruebaConsistenciaFechas($this->start, $end);
        $this->end = $end;
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
}