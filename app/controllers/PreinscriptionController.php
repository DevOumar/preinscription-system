<?php
declare(strict_types=1);

class PreinscriptionController extends ControllerBase
{

    
    public function indexAction()
    {
        if($this->request->isPost()){
            $data = $this->request->getPost();
            $verifPreinscriptionExist  = Preinscription::findFirst(['telephone = :telephone:', 
               'bind' => [
                'telephone' => $data['telephone'],
            ]
        ]);
            $preinscriptionForm = new PreinscriptionForm();

            if($verifPreinscriptionExist){
                $this->flash->error("Ce numéro de ".$data['telephone']." est déjà utilisé !");
                $this->tag->setDefaults($data);
                $this->view->form = $preinscriptionForm;
                $this->view->disable();
                $this->view->partial('preinscription/index'); 
                return;
            }

            $verifPreinscriptionExist  = Preinscription::findFirst(['email = :email:', 
               'bind' => [
                'email' => $data['email'],
            ]
        ]);
            $preinscriptionForm = new PreinscriptionForm();

            if($verifPreinscriptionExist){
                $this->flash->error("Cette adresse e-mail ".$data['email']." est déjà utilisée !");
                $this->tag->setDefaults($data);
                $this->view->form = $preinscriptionForm;
                $this->view->disable();
                $this->view->partial('preinscription/index'); 
                return;
            }

            $preinscription = new Preinscription();
            $mail = new Mail();
            $email = "cisseoumar621@gmail.com";
            if($preinscriptionForm->isValid($data, $preinscription)){
                $preinscription->nom = $preinscription->nom;
                $preinscription->prenom = $preinscription->prenom;
                $preinscription->email = $preinscription->email;
                $preinscription->telephone = $preinscription->telephone;
                $preinscription->serie = $preinscription->serie;
                $preinscription->annee = $preinscription->annee;
                $preinscription->filiere = $preinscription->filiere;
                $preinscription->quartier = $preinscription->quartier;
                $preinscription->motivation = $preinscription->motivation;
                $params = [
                    'nom' => $preinscription->nom,
                    'prenom' => $preinscription->prenom,
                    'email' => $preinscription->email,
                    'telephone' => $preinscription->telephone,
                    'serie' => $preinscription->serie,
                    'annee' => $preinscription->annee,
                    'filiere' => $preinscription->filiere,
                    'quartier' => $preinscription->quartier,
                    'motivation' => $preinscription->motivation

                ];

                if(!$mail->send($email,'preinscription',$params)) {
                    $this->flash->error('Non envoyé');

                    return 0;

                }


                if(!$preinscription->save()){
                    var_dump($preinscription->getMessages());exit();
                    $messages = $preinscription->getMessages();
                    foreach ($messages as $key => $msg) {
                        $this->flash->error($msg);
                        $this->response->redirect("preinscription/index");
                        return;
                    }
                }
                $this->flash->success(strtoupper($preinscription->prenom).", votre pré-inscription est effectuée avec succès ! Nous vous ferons un retour de message à l'adresse indiquée.");
                $this->response->redirect("preinscription/index");
            }
        }
        $preinscriptionForm = new PreinscriptionForm();

        $this->view->form = $preinscriptionForm;
    }
}

