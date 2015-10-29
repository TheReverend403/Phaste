<?php

use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Inclusionin;

class Paste extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $id;

    /**
     *
     * @var string
     */
    public $content;

    /**
     *
     * @var string
     */
    public $lang;

    /**
     *
     * @var integer
     */
    public $private;

    /**
     *
     * @var integer
     */
    public $owner_id;

    /**
     *
     * @var string
     */
    public $owner_addr;

    /**
     *
     * @var integer
     */
    public $size_bytes;

    /**
     *
     * @var string
     */
    public $created_date;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("'pastes'");
        $this->skipAttributes(array('created_date'));
    }

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

        $this->validate(new InclusionIn(
            array(
                "field"   => "lang",
                "message" => "Invalid language selected!",
                'domain' => array_keys($this->getDi()->getConfig()->highlight_languages->toArray())
            )
        ));

        $this->validate(new Uniqueness(
            array(
                "field"   => "id",
                "message" => "Paste ID must be unique!"
            )
        ));

        return $this->validationHasFailed() != true;
    }
}
