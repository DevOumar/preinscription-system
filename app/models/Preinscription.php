<?php

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class Preinscription extends \Phalcon\Mvc\Model
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
    public $nom;

    /**
     *
     * @var string
     */
    public $prenom;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $telephone;

    /**
     *
     * @var string
     */
    public $serie;


    /**
     *
     * @var string
     */
    public $annee;

    /**
     *
     * @var string
     */
    public $motivation;

    /**
     *
     * @var string
     */
    public $quartier;

    /**
     *
     * @var string
     */
    public $filiere;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );

        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("etudiant");
        $this->setSource("preinscription");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Preinscription[]|Preinscription|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Preinscription|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nom_complet
     *
     * @param string $nom_complet
     */
    
    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    
    public function getTelephone()
    {
        return $this->telephone;
    }
    public function getSerie()
    {
        return $this->serie;
    }
    public function getAnnee()
    {
        return $this->annee;
    }
    public function getFiliere()
    {
        return $this->filiere;
    }
    public function getQuartier()
    {
        return $this->quartier;
    }
    public function getMotivation()
    {
        return $this->motivation;
    }

}
