<?php

namespace hypefit\DAO;

use hypefit\includes\http\DataAccessException;
use hypefit\includes\TO\Evento;

class EventoDAO{
    /**
     * Busca todos los eventos de un usuario con id $userId.
     *
     * @param int $userId Id del usuario a buscar.
     *
     * @return array[Evento] Lista de eventos del usuario con id $userId.
     */
    public static function buscaTodosEventos(int $userId)
    {
        if (!$userId) {
            throw new \BadMethodCallException('$userId no puede ser nulo.');
        }

        $result = [];
        $app = App::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf('SELECT E.id, E.userId AS userId, E.title, E.startDate AS start, E.endDate AS end FROM Eventos E WHERE E.userId = %d'
            , $userId);

        $rs = $conn->query($query);
        if ($rs) {
            while($fila = $rs->fetch_assoc()) {
                $e = new Evento();
                $e->asignaDesdeDiccionario($fila);
                $result[] = $e;
            }
            $rs->free();
        } else {
            throw new DataAccessException("Se esperaba 1 evento y se han obtenido: ".$rs->num_rows);
        }
        return $result;
    }

    /**
     * Busca un evento con id $idEvento.
     *
     * @param int $idEvento Id del evento a buscar.
     *
     * @return Evento Evento encontrado.
     */
    public static function buscaPorId(int $idEvento)
    {
        if (!$idEvento) {
            throw new \BadMethodCallException('$idEvento no puede ser nulo.');
        }

        $result = null;
        $app = App::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT E.id, E.title, E.userId, E.startDate AS start, E.endDate AS end FROM Eventos E WHERE E.id = %d", $idEvento);
        $rs = $conn->query($query);
        if ($rs && $rs->num_rows == 1) {
            while($fila = $rs->fetch_assoc()) {
                $result = new Evento();
                $result->asignaDesdeDiccionario($fila);
            }
            $rs->free();
        } else {
            if ($conn->affected_rows == 0) {
                throw new EventoNoEncontradoException("No se ha encontrado el evento: ".$idEvento);
            }
            throw new DataAccessException("Se esperaba 1 evento y se han obtenido: ".$rs->num_rows);
        }
        return $result;
    }

    /**
     * Busca los eventos de un usuario con id $userId en el rango de fechas $start y $end (si se proporciona).
     *
     * @param int $userId Id del usuario para el que se buscarán los eventos.
     * @param string $start Fecha a partir de la cual se buscarán eventos (@link MYSQL_DATE_TIME_FORMAT)
     * @param string|null $end Fecha hasta la que se buscarán eventos (@link MYSQL_DATE_TIME_FORMAT)
     *
     * @return array[Evento] Lista de eventos encontrados.
     */
    public static function buscaEntreFechas(int $userId, string $start, string $end = null)
    {
        if (!$userId) {
            throw new \BadMethodCallException('$userId no puede ser nulo.');
        }

        $startDate = \DateTime::createFromFormat(self::MYSQL_DATE_TIME_FORMAT, $start);
        if (!$startDate) {
            throw new \BadMethodCallException('$diccionario[\'start\'] no sigue el formato válido: '.self::MYSQL_DATE_TIME_FORMAT);
        }

        $endDate = null;
        if ($end) {
            $endDate =  \DateTime::createFromFormat(self::MYSQL_DATE_TIME_FORMAT, $end);
            if (!$endDate) {
                throw new \BadMethodCallException('$diccionario[\'end\'] no sigue el formato válido: '.self::MYSQL_DATE_TIME_FORMAT);
            }
        }

        $app = App::getSingleton();
        $conn = $app->conexionBd();

        $query = sprintf("SELECT E.id, E.title, E.userId, E.startDate AS start, E.endDate AS end  FROM Eventos E WHERE E.userId=%d AND E.startDate >= '%s'", $userId, $start);
        if ($endDate) {
            $query = sprintf($query . " AND E.startDate <= '%s'", $end);
        }

        $result = [];

        $rs = $conn->query($query);
        if ($rs) {
            while($fila = $rs->fetch_assoc()) {
                $e = new Evento();
                $e->asignaDesdeDiccionario($fila);
                $result[] = $e;
            }
            $rs->free();
        }
        return $result;
    }

    /**
     * Guarda o actualiza un evento $evento en la BD.
     *
     * @param Evento $evento Evento a guardar o actualizar.
     */
    public static function guardaOActualiza(Evento $evento)
    {
        if (!$evento) {
            throw new \BadMethodCallException('$evento no puede ser nulo.');
        }
        $result = false;
        $app = App::getSingleton();
        $conn = $app->conexionBd();
        if (!$evento->id) {
            $query = sprintf("INSERT INTO Eventos (userId, title, startDate, endDate) VALUES (%d, '%s', '%s', '%s')"
                , $evento->userId
                , $conn->real_escape_string($evento->title)
                , $evento->start->format(self::MYSQL_DATE_TIME_FORMAT)
                , $evento->end->format(self::MYSQL_DATE_TIME_FORMAT));

            $result = $conn->query($query);
            if ($result) {
                $evento->id = $conn->insert_id;
                $result = $evento;
            } else {
                throw new DataAccessException("No se ha podido guardar el evento");
            }
        } else {
            $query = sprintf("UPDATE Eventos E SET userId=%d, title='%s', startDate='%s', endDate='%s' WHERE E.id = %d"
                , $evento->userId
                , $conn->real_escape_string($evento->title)
                , $evento->start->format(self::MYSQL_DATE_TIME_FORMAT)
                , $evento->end->format(self::MYSQL_DATE_TIME_FORMAT)
                , $evento->id);
            $result = $conn->query($query);
            if ($result) {
                $result = $evento;
            } else {
                throw new DataAccessException("Se han actualizado más de 1 fila cuando sólo se esperaba 1 actualización: ".$conn->affected_rows);
            }
        }

        return $result;
    }

    /**
     * Borra un evento id $idEvento.
     *
     * @param int $idEvento Id del evento a borrar.
     *
     */
    public static function borraPorId(int $idEvento)
    {
        if (!$idEvento) {
            throw new \BadMethodCallException('$idEvento no puede ser nulo.');
        }
        $result = false;
        $app = App::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf('DELETE FROM Eventos WHERE id=%d', $idEvento);
        $result = $conn->query($query);
        if ($result && $conn->affected_rows == 1) {
            $result = true;
        } else {
            if ($conn->affected_rows == 0) {
                throw new EventoNoEncontradoException("No se ha encontrado el evento: ".$idEvento);
            }
            throw new DataAccessException("Se esperaba borrar 1 fila y se han borrado: ".$conn->affected_rows);
        }
        return $result;
    }

    /**
     * Crear un evento asociado a un usuario $userId y un título $title.
     * El comienzo es la fecha y hora actual del sistema y el fin es una hora más tarde.
     *
     * @param int $userId Id del propietario del evento.
     * @param string $title Título del evento.
     *
     */
    public static function creaSimple(int $userId, string $title)
    {
        $start = new \DateTime();
        $end = $start->add(new \DateInterval('PT1H'));
        return self::creaDetallado($userId, $title, $start, $end);
    }

    /**
     * Crear un evento asociado a un usuario $userId, un título $title y una fecha y hora de comienzo.
     * El fin es una hora más tarde de la hora de comienzo.
     *
     * @param int $userId Id del propietario del evento.
     * @param string $title Título del evento.
     * @param DateTime $start Fecha y horas de comienzo.
     */
    public static function creaComenzandoEn(int $userId, string $title, \DateTime $start)
    {
        if (empty($start)) {
            throw new \BadMethodCallException('$start debe ser un timestamp valido no nulo');
        }

        $end = $start->add(new \DateInterval('PT1H'));
        return self::creaDetallado($userId, $title, $start, $end);
    }

    /**
     * Crear un evento asociado a un usuario $userId, un título $title y una fecha y hora de comienzo y fin.
     *
     * @param int $userId Id del propietario del evento.
     * @param string $title Título del evento.
     * @param DateTime $start Fecha y horas de comienzo.
     * @param DateTime $end Fecha y horas de fin.
     */
    public static function creaDetallado(int $userId, string $title, \DateTime $start, \DateTime $end)
    {
        $e = new Evento();
        $e->setUserId($userId);
        $e->setTitle($title);
        $e->setStart($start);
        $e->setEnd($end);
    }

    /**
     * Crear un evento un evento a partir de un diccionario PHP.
     * Como por ejemplo array("userId" => (int)1, "title" => "Descripcion"
     *   , "start" => "2019-04-29 00:00:00", "end" => "2019-04-30 00:00:00")
     *
     * @param array $diccionario Array / map / diccionario PHP con los datos del evento a crear.
     *
     * @return Evento Devuelve el evento creado.
     */
    public static function creaDesdeDicionario(array $diccionario)
    {
        $e = new Evento();
        $e->asignaDesdeDiccionario($diccionario, ['userId', 'title', 'start', 'end']);
        return $e;
    }

    /**
     * Comprueba si $start y $end son fechas y además $start es anterior a $end.
     */
    private static function compruebaConsistenciaFechas(\DateTime $start, \DateTime $end)
    {
        if (!$start) {
            throw new \BadMethodCallException('$start no puede ser nula');
        }

        if (!$end) {
            throw new \BadMethodCallException('$end no puede ser nula');
        }

        if ($start >= $end) {
            throw new \BadMethodCallException('La fecha de comienzo $start no puede ser posterior a la de fin $end.');
        }
    }
}