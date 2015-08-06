<?php

use Phalcon\Mvc\Model\Validator\Uniqueness;
use Phalcon\Mvc\Model\Validator\StringLength;

class Paste extends \Phalcon\Mvc\Model
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
    public $slug;

    /**
     *
     * @var string
     */
    public $content;

    /**
     *
     * @var string
     */
    public $language;

    /**
     *
     * @var integer
     */
    public $private;

    /**
     *
     * @var string
     */
    public $creator_ipv4;

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
     * @return Paste[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Paste
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function validation()
    {

        $this->validate(new StringLength(
            array(
                "min"     => 1,
                "field"   => "content",
                "messageMinimum" => "Paste cannot be empty!"
            )
        ));

        $this->validate(new Uniqueness(
            array(
                "field"   => "slug",
                "message" => "Paste ID must be unique!"
            )
        ));

        return $this->validationHasFailed() != true;
    }
}
