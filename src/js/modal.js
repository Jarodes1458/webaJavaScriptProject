function donneesArticle(article_categorie,article_nom,article_prix,article_qte,article_marque,article_description,article_id)
{
  document.getElementById("nomDeLarticle").innerHTML = article_nom;

  document.getElementById("ancienneCategorie").value = article_categorie;
  document.getElementById("ancienneCategorie").innerHTML = article_categorie;

  document.getElementById("inputNom").value = article_nom;
  document.getElementById("inputNom").placeholder = article_nom;

  document.getElementById("inputPrix").value = article_prix;
  document.getElementById("inputPrix").placeholder = article_prix;

  document.getElementById("inputQte").value = article_qte;
  document.getElementById("inputQte").placeholder = article_qte;

  document.getElementById("inputMarque").value = article_marque;
  document.getElementById("inputMarque").placeholder = article_marque;

  document.getElementById("inputDescription").value = article_description;
  document.getElementById("inputDescription").placeholder = article_description;

  document.getElementById("formModif").action = "boutique.php?id=" + article_id;

}

function donneesServiceSupprimer($service_nom){
  document.getElementById("nomDuServiceSupprimer").innerHTML = service_nom;
}

function ouvertureDiplome(image, nom){
  // Get the modal
  document.getElementById("img01").src = image;
  document.getElementById("captionModal").innerHTML = nom;
}

function donneesParcours(titre, texte, ordre, paragrapheID){
  document.getElementById("mTitre").innerHTML = titre;

  document.getElementById("mTitre2").value = titre;
  document.getElementById("mTitre2").placeholder = titre;

  document.getElementById("mDescription").value = texte;
  document.getElementById("mDescription").placeholder = texte;

  document.getElementById("mOrdre").value = ordre;

  document.getElementById("mID").value = paragrapheID;
}

function donneesSupprimerParagraphe(titre, id){
  document.getElementById("sTitre").innerHTML = titre;

  document.getElementById("sID").value = id;
}

function donneesSupprimerDiplome(titre, id){
  document.getElementById("sDiplomeTitre").innerHTML = titre;

  document.getElementById("sDiplomeID").value = id;
}

function donneesSupprimerClient(nom, prenom, id){
  document.getElementById("sCliNom").innerHTML = nom;

  document.getElementById("sCliPrenom").innerHTML = prenom;

  document.getElementById("clientID").value = id;


}

function donneesSupprimerRendezVous(id){

  document.getElementById("rdvID").value = id;
}

function donneesRendezExistant(date){

  document.getElementById("dateExistant").value = date;
}

function changeClass()
{
document.getElementById('salut').classList.add('fas fa-envelope-open-text');

document.getElementById('salut').classList.remove('fas fa-teeth');
}

function donneesAnnulerRdv(id){
  document.getElementById("idRdv").value = id;
}