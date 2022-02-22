
<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Date;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

class PreinscriptionForm extends Form
{
    public function initialize()
    {

        $nom = new Text('nom', [ "class" => "form-control", "required" => "required" ]);
        $nom->addValidator(
            new PresenceOf(
                [
                    'message' => 'Votre nom est obligatoire',
                ]
            )
        );
        $this->add($nom);
        $prenom = new Text('prenom', [ "class" => "form-control", "required" => "required" ]);
        $prenom->addValidator(
            new PresenceOf(
                [
                    'message' => 'Votre prénom est obligatoire',
                ]
            )
        );
        $this->add($prenom);

        $email = new Email('email', [ "class" => "form-control", "required" => "required" ]);
        $email->addValidator(
            new PresenceOf(
                [
                    'message' => "Votre email est obligatoire",
                ]
            )
        );
        $this->add($email);
        $telephone = new Text('telephone', [ "class" => "form-control", "required" => "required" ]);
        $telephone->addValidator(
            new PresenceOf(
                [
                    'message' => 'Votre numéro de telephone est obligatoire',
                ]
            )
        );
        $this->add($telephone);

        $serie = new Text('serie', [ "class" => "form-control", "required" => "required" ]);
        $serie->addValidator(
            new PresenceOf(
                [
                    'message' => 'Votre série du Bac est obligatoire',
                ]
            )
        );
        $this->add($serie);

        $annee = new Text('annee', [ "class" => "form-control", "required" => "required" ]);
        $annee->addValidator(
            new PresenceOf(
                [
                    'message' => 'Votre année du Bac est obligatoire',
                ]
            )
        );
        $this->add($annee);

        $filiere = new Text('filiere', [ "class" => "form-control", "required" => "required" ]);
        $filiere->addValidator(
            new PresenceOf(
                [
                    'message' => 'Votre filiere souhaitée est obligatoire',
                ]
            )
        );
        $this->add($filiere);

        $motivation = new TextArea('motivation', [ "class" => "form-control", "required" => "required" ]);
        $motivation->addValidator(
            new PresenceOf(
                [
                    'message' => 'Votre motivation est obligatoire',
                ]
            )
        );
        $this->add($motivation);

        $quartier = new Text('quartier', [ "class" => "form-control", "required" => "required" ]);
        $quartier->addValidator(
            new PresenceOf(
                [
                    'message' => 'Votre quartier est obligatoire',
                ]
            )
        );
        $this->add($quartier);
    }
}