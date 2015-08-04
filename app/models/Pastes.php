<?php

class Pastes extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $content;

    /**
     *
     * @var integer
     */
    public $private;

    /**
     *
     * @var integer
     */
    public $creator_ipv4;

    /**
     *
     * @var string
     */
    public $creator_ipv6;

    /**
     *
     * @var string
     */
    public $created;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pastes';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pastes[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pastes
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
