$(function()
{
    var ListeClient=0;
    var Prise=0;
    var PrixUnitaire=85;
    var Retour=0;
    var Versement=0;
    var SommeAVerse=0;
    var Manquant=0;
    var linesNumber = 50;
    var arrayTableau=document.getElementById('Tableau').rows;
    var nombreLignesTab=arrayTableau.length;
    //creation des Ligne du tableau 
    for (var i= 0 ;i <linesNumber ;i++){
        arrayTab=document.getElementById('Tableau');
            var ligne=arrayTab.insertRow();
            celNom=ligne.insertCell(0);
            celNom.innerHTML+=(i+1);
            celNom=ligne.insertCell(1);
            celNom.innerHTML+="<input type='text' placeholder='Non client' class='NomClient"+i+"'> ";
            celPrise=ligne.insertCell(2);
            celPrise.innerHTML+="<input type='text' placeholder='prise' class='priseClient"+i+"'> ";
            celSommeAVerser=ligne.insertCell(3);
            celSommeAVerser.innerHTML+="<p class='SommeAverser"+i+"'>SommeAVerse</p>";
            celSommeVerser=ligne.insertCell(4);
            celSommeVerser.innerHTML+="<input type='text' placeholder='Somme Verse ' class='SommeVerser"+i+"'> ";
            celEtatSolde=ligne.insertCell(5);
            celEtatSolde.innerHTML+="<p class='EtatSolde"+i+"'>Etat soled</p>";
            celSolde=ligne.insertCell(6);
            celSolde.innerHTML+="<p class='valSolde"+i+"'>soled</p>";
    }
//L'EVENEMENT DECLANCHREUR C'EST DANS CE EVENEMENT QU'EST DEFFINI LA PORTER DE TOUTE LE VARAIBLE 
    $('#Prise').on('change',function () { 
        Prise =$('#Prise').val();
        SommeAVerse=(Prise - Retour )*PrixUnitaire;
        Manquant=SommeAVerse-Versement;
        $('#SommeAVerser').html(SommeAVerse);
        $('#ManquantDuJour').html(Manquant);
    });
    $('#Retour').on('change',function(){
        Retour =$('#Retour').val();
        SommeAVerse=(Prise - Retour )*PrixUnitaire;
        Manquant=SommeAVerse-Versement;
        $('#SommeAVerser').html(SommeAVerse);
        $('#ManquantDuJour').html(Manquant);
    })

    $('#Versement').on('change',function () { 
        Versement =$('#Versement').val();
        SommeAVerse=(Prise - Retour )*PrixUnitaire;
        Manquant=SommeAVerse-Versement;
        $('#Versement').html(SommeAVerse);
        $('#ManquantDuJour').html(Manquant);
    });

    //Verification du client dans la base de donnee 
    for(var i =0 ;i< linesNumber;i++){
        var NomClient =document.querySelector(".NomClient"+i+"");
        (function(NomClient){
            NomClient.addEventListener('change',function(){
                var nom = this.value.toLowerCase();
                var clientExit=false;
                    $.ajax({
                        type: "Post",
                        url: "Livraison.php",
                        data:{Action:'VerifClient',Nom:nom} ,
                        dataType: "json",
                        success: function (response) {
                            if(response.NameExist){
                                var EtatSolde =document.querySelector(".EtatSolde"+i+"");
                                var valSolde =document.querySelector(".valSolde"+i+"");
                                //si le client est dans la base de bonne 
                                if(response.typeClient =="r"){
                                    //Afficher la cellule des retoure 
                                }
                                console.log(i);
                               
                            }
                            else{
                                var creationCompt=confirm('Desole Ce Client Existe pas dans la liste des client\nvoulez vous cree un compt pour ce client');
                                if(creationCompt)
                                {
                                    $('#creationCompt').click();
                                }
                            }
                        }
                    });
                
            });
        })(NomClient)
        var NomClient =document.querySelector(".NomClient"+i+"");
       
        
    }
        // $('.NomClient'+(i+1)+'').on('change',function(){
        //     var nomClient = $(this).val();
        //     nomClient=nomClient.toLowerCase();
        //     var clientExit=false;
        //     $.ajax({
        //         type: "Post",
        //         url: "Livraison.php",
        //         data:{Action:'VerifClient',Nom:nomClient} ,
        //         dataType: "json",
        //         success: function (response) {
        //             if(response.NameExist){
        //                 //si le client est dans la base de bonne 
        //             }
        //             else{
        //                 var creationCompt=confirm('Desole Ce Client Existe pas dans la liste des client\nvoulez vous cree un compt pour ce client');
        //                 if(creationCompt)
        //                 {
        //                     $('#creationCompt').click();
        //                 }
        //             }
        //         }
        //     });
        // })
        
   
    //Actualisation du compte de l'utilisateur 
    for(var i =0 ;i <linesNumber;i++)
    {
        $('#priseClient'+(i+1)+'').on('change',function(){
            console.log('ok prise');
           //SI L'UTILISATEUR SAISI LA PRISE DU CLIENT 
           //ON FAIT UNE ACTUALISATION DE SON COMPTE
           var nameClient =$('#client'+(i+1)+'').val();
           priseClient=$(this).val();
           $.ajax({
            type:'POST' ,
            url:'Livraison.php',
            data:{Action:"actualisation",name:nameClient,prise:priseClient},
            typedata:'json',
            success:function(result){

            }         
           })
        })
       
    }
    //Ajout d'un utilisateur 
    $('#formAddUser').submit(function(e){
        e.preventDefault();
        var nomClient =$('#NomClient').val();
        var Prix =$('#Prix').val();
        var type =$('#Type').val();
        nomClient=nomClient.toLowerCase();
        if(nomClient==undefined || nomClient=="")
        {
            alert('Veillez saisir le nom du client')
        }
        else if((Prix < 100)||(Prix >150))
        {
            alert('Le prix unitire dois etre compris entre 100 et 150')
        }
        else if(type =="")
        {
            alert('Veillez selectionne le type de client ')
        }
        else
        {
            $.ajax({
            type:'Post',
            url:'Livraison.php',
            data:{Action:'CreationCompte',Nom:nomClient,PrixAchat:Prix,typeClient:type},
            typedata:'json',
            success:function(response){
                if(response.NameExist===true)
                {
                   alert('Desole le client'+nomClient+'est deja enregistre');
                }
                if(response.InsertionOk===true)
                {
                    alert('client'+nomClient+'enregistre avec succes ;)')
                }
            }
         })
        }
        
    })
  	
        
    //CODE JS  POUR AFFICHER OU CHACHEZ LES ENTETE 

    var showHideEntete =document.querySelector("#showHideEntete");
    showHideEntete.addEventListener('click',function(){
      var Entete= document.querySelector(".entete");
      Entete.classList.toggle("showHide");
      this.hidden;
    })
})