var compteur = 2;
function createNewInputFile() {
    // First create a DIV element.
    
    if(compteur <= 5){
	var txtNewInputBox = document.createElement('div');

    // Then add the content (a new input box) of the element.
	txtNewInputBox.innerHTML = "<input type='file'  onclick='createNewInputFile();' name='monfichierAjouter-"+compteur+"' id='newInputBox'>";

    // Finally put it where it is supposed to appear.
	document.getElementById("newElementId").appendChild(txtNewInputBox);
    console.log(compteur);
    compteur += 1;}
}


var compteur2 = 2;

function getOutput() {
    $.ajax({
       url:'priserdv1.php',
       complete: function (response) {
           $('#output').html(response.responseText);
       },
       error: function () {
           $('#output').html('Bummer: there was an error!');
       }
   });
   return false;
 }


