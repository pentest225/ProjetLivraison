<?php 
    require 'Admin/DataBase.php';
    $Info=array();
if(isset($_POST)){
    switch($_POST['Action'])
    {
        case 'VerifClient':

            $db=DB::connect();
            $query =$db->prepare('SELECT * FROM user WHERE name =?');
            $query->execute(array($_POST['Nom']));
            $reponse=$query->fetch();
            if($reponse){
                //Si le client existe on selectionne donc toute les information a son sujet 
                $querySolde =$db->prepare('SELECT * FROM solde WHERE id_user =?');
                $querySolde->execute(array($reponse['id']));
                $resultSolde=$querySolde->fetch();
                $Info['etatSolde']=$resultSolde['etat_solde'];
                $Info['valSolde']=$resultSolde['valleur'];
                $Info['NameExist']=TRUE;
                $Info['typeClient']=$reponse['type'];
                $Info['prixUnitaire']=$reponse['unitary_price'];
            }else{
                $Info['NameExist']=FALSE;
            }
        echo json_encode($Info);
        break;
        case 'CreationCompte':
          
            $db=DB::connect();
            $query =$db->prepare('SELECT * FROM user WHERE name =?');
            $query->execute(array($_POST['Nom']));
            $reponse=$query->fetch();
            if($reponse){
                //si le nom existe plus d'insertion dans la base de bonne
                $Info['NameExist']=TRUE;
            }else{
                $Info['NameExist']=FALSE;
                $NomClient=$_POST['Nom'];
                $request =$db->prepare('INSERT INTO user (name,type,unitary_price) VALUES (?,?,?)');
                $request->execute(array($_POST['Nom'],$_POST['typeClient'],$_POST['PrixAchat']));
                if($request)
                {
                    $Info['InsertionOk']=TRUE;
                }
                else
                {
                    $Info['InsertionOk']=FALSE;
                }
            }
            echo json_encode($Info);
        break;
        case 'actualisation':
            //selection des information du client
            var_dump($_POST);
            die();
            break;
    }
}