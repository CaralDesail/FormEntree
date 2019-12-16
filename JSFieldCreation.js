

// main zone with the JS function that will : catch values and print formated items in the last zones.
function myFunctionZoneFinale() {
	
	// how to calc tomorow date 	
var dateTw= new Date();
dateTw.setDate(dateTw.getDate() + 1);//set tomorrow date
var dateTwString=dateTw.toString(); // transform date in string
var dateTwStringParse=dateTwString.split(' '); // split the string
dateTw = dateTwStringParse[2]+" "+dateTwStringParse[1]+" "+dateTwStringParse[3]; // turn the date in the good shape


	
	
  	// part that will catch patient status and history informations.
	
  var sexe=document.querySelector('input[name="radioSexe"]:checked').value;
  if (sexe=="Femme") {
  var genremaj="Patiente";
  var correcteurE="e";}

  else {var genremaj="Patient";
  var correcteurE="";}
  
  var MdV = document.getElementById("MdV").value; // field about way of life and previous autonomy
		if (MdV != "")
	{
		MdV="Autonomie et mode de vie antérieur : "+MdV+"\n"+"\n";
	}
	else {MdV="";}
  
  var comorbidites = document.getElementById("comorbidites").value; //field about comorbidity

	  if (comorbidites != "") // if there is something in comorbidity fied ...
		  {
		  var comorbidites_list =comorbidites.split('\n'); // split the input and make a list
		  if (comorbidites_list.length>=2) // if there are multiple items
		  {
			var correcteurScom="s";} // plurial corrector = "s"
		  else {correcteurScom="";} // else, plurial corrector = ""
		  var presComorbidites = ", qui présente comme comorbidité"+correcteurScom+" principale"+correcteurScom+" : "+comorbidites_list+"."; // create the sentence about comorbidities
		  }
	  else {var presComorbidites = ".";} //else it is void
	  
	  
	  
  var comorbiditesAutres = document.getElementById("comorbiditesAutres").value;

  var anamnese=document.getElementById("anamnese").value;
 
  
  var date=document.getElementById("dateOpe").value;
  var dateseg=date.split('-'); // create a list with year, mounth and day
  var dateRecons=dateseg[2]+"-"+dateseg[1]+"-"+dateseg[0]; //reverse it
  if(dateRecons=="01-01-1970"){
  dateRecons="date inconnue";}
  
  var chirurgienSelect = document.getElementById("chirurgien").value; //catch the firstzone
  var chirurgienAutre= document.getElementById("chirurgienAutre").value; //cath second zone
  var chirurgienFinal;
	if (chirurgienSelect=="Autre") //if first zone is "Autre",...
		{chirurgienFinal=chirurgienAutre;} // then use "other zone"...
	else {chirurgienFinal=chirurgienSelect;}  // else use predetermined surgeron.
	
  var typeOpe=document.getElementById("typeOpe").value;
  
  var coteOp=document.querySelector('input[name="radioCote"]:checked').value;

  var etiologie = document.getElementById("etiologie").value;
  
  var complicationsInterc = document.getElementById("complicationsInterc").value;
 
  var consignesPostOp = document.getElementById("consignesPostOp").value;
  
  
  // concatenation of strings to make the first part of Zone Finale
  var string_infos_patient_avant=MdV;
  var string_infos_patient = "Anamnèse : "+anamnese;
  var string_infos_patient2=genremaj+" opéré"+correcteurE+ " le " +dateRecons+" par le "+chirurgienFinal+ " pour "+typeOpe+" du côté "+coteOp+" dans les suites d'une "+etiologie;
  var string_infos_patient3="Dans les suites de l'opération : "+complicationsInterc;
  var string_infos_patient4="Consignes post opératoires : \n"+consignesPostOp;
  
  
  document.formulaire.TexteSortie1.value=string_infos_patient_avant+string_infos_patient+"\n"+string_infos_patient2+"\n"+string_infos_patient3+"\n\n"+string_infos_patient4; 




// about the ATCD zone (that will print actual commobidity and old ones) :

   var string_atcd=comorbidites+"\n"+comorbiditesAutres;
   
  document.formulaire.TexteSortie1b.value=string_atcd;






var taille=document.getElementById("taille").value;
var poids=document.getElementById("poids").value;

var imcCalc = poids/(taille*taille);
var imcCalc = imcCalc.toPrecision(3);
document.formulaire.imc.value=imcCalc;

var norton=document.getElementById("norton").value;
var eva=document.getElementById("eva").value;
var heteoeval=document.getElementById("heteroeval").value;
	  if (eva != "") // if there is something in comorbidity fied ...
		  { var print_eva="EVA : "+eva+" /10 ";
		    }
			else {var print_eva="";}
	  if (heteoeval != "") // if there is something in comorbidity fied ...
		  { var print_heteoeval="Algoplus : "+heteoeval+" /5 \n";
		    }
			else {var print_heteoeval="\n";}			

var tensa=document.getElementById("tensa").value;
var pouls=document.getElementById("pouls").value;
var temperature=document.getElementById("temperature").value;
var saturation=document.getElementById("saturation").value;

var varPoids=document.getElementById("varPoids").value;
var psycho=document.querySelector('input[name="radioPsy"]:checked').value;
var psychoFinal;
var psychotext = document.getElementById("psytxt").value; //cath written zone
if (psycho=="psytxt") //if chacked zone is text zone
	{psychoFinal=psychotext;} // then use text
else {psychoFinal=psycho;}  // else use predetermined state.

var cardioResp=document.getElementById("cardioResp").value;
var abdoTxt=document.getElementById("abdoTxt").value;

var transit=document.querySelector('input[name="radioAbdo"]:checked').value;
var contipTxt=document.getElementById("txtConstip").value;
var diaTxt=document.getElementById("txtDia").value;

var uroTxt=document.getElementById("uroTxt").value;
var cutaTxt=document.getElementById("cutaTxt").value;
var neuroTxt=document.getElementById("neuroTxt").value;

var flexP=document.getElementById("flexP").value;
var extP=document.getElementById("extP").value;
var flexA=document.getElementById("flexA").value;
var extA=document.getElementById("extA").value;
var abdA=document.getElementById("abdA").value;
var abdP=document.getElementById("abdP").value;
var orthoOpTxt=document.getElementById("orthoOpTxt").value;
var orthoNOpTxt=document.getElementById("orthoNOpTxt").value;
var orthoMSTxt=document.getElementById("orthoMSTxt").value;
var orthoFct=document.getElementById("orthoFct").value;
var coteOp=document.querySelector('input[name="radioCote"]:checked').value;

// the following lines test if user has or not fullfilled active or passive fields ... 

if (flexP != ""){
var flexp_txt="   Flexion passive : "+flexP+"° ";}
else {var flexp_txt="";}
if (extP != ""){
var extp_txt="   Extension passive : "+extP+"°\n";}
else {var extp_txt="\n";}

if (flexA != ""){
var flexa_txt="   Flexion active : "+flexA+"° ";}
else {var flexa_txt="";}
if (extA != ""){
var exta_txt="   Extension active : "+extA+"°\n";}
else {var exta_txt="\n";}

if (abdA != ""){
var abda_txt="   Abduction active : "+abdA+"° ";}
else {var abda_txt="";}
if (abdP != ""){
var abdp_txt="   Abduction passive : "+abdP+"°\n";}
else {var abdp_txt="\n";}




// final concatenation
var string_examen_patient1 ="Taille: "+ taille +" m                                 "+" Poids : "+poids+"kg"+"             "+ "IMC :" +imcCalc + "\n"
+ "Norton : "+norton +"                                    "+ print_eva+print_heteoeval
+"Tension arterielle : "+tensa+" mmHG        Pouls : "+pouls+"/min     Température : "+temperature+"°C     Saturation : "+saturation +"%"+"\n\n\n";
var string_examen_patient2 = "Etat général et psychologique :"+"\nVariation pondérale : "+varPoids+"\n"+psychoFinal+"\n\n"
+"Examen cardio-pulmonaire : \n"+cardioResp+"\n\n"
+"Examen abdominal : \n"+abdoTxt+"\n"+"Transit : "+transit+" "+contipTxt+diaTxt+"\n\n"
+"Examen génito-urinaire : \n"+uroTxt+"\n\n"
+"Examen cutanéo-muqueux : \n"+cutaTxt+"\n\n"
+"Examen neurologique : \n"+neuroTxt+"\n\n"
;
var string_examen_patient3 = "Examen orthopédique : \n" 
+"Côté opéré ("+coteOp+") : \n"
+flexp_txt
+extp_txt
+flexa_txt
+exta_txt
+abda_txt
+abdp_txt
+"   "+orthoOpTxt+"\n"
+"Membre inférieur non opéré : \n"
+"   "+orthoNOpTxt+"\n"
+"Membres supérieurs : \n"
+"   "+orthoMSTxt+"\n"
+orthoFct+"\n"

;


document.formulaire.TexteSortie2.value=string_examen_patient1+string_examen_patient2+string_examen_patient3;





// about the third zone (Projet de soins) and what we want to appear.
// for each element, check if the previous and attributed chekbox PdSCB**** is checked (=true) , and if its the case will integrate the text PdSTx**** in the attributed var PdS****

var PdSCBDouleur=document.getElementById("PdSCBDouleur").checked;
if (document.getElementById("PdSCBDouleur").checked)
{var PdSDouleur = document.getElementById("PdSTxDouleur").value+"\n";}
else {var PdSDouleur = "";}

var PdSCBThromboEmbolique=document.getElementById("PdSCBThromboEmbolique").checked;
if (document.getElementById("PdSCBThromboEmbolique").checked)
{var PdSThromboEmbolique = document.getElementById("PdSTxThromboEmbolique").value+"\n";}
else {var PdSThromboEmbolique = "";}

var PdSCBEscarres=document.getElementById("PdSCBEscarres").checked;
if (document.getElementById("PdSCBEscarres").checked)
{var PdSEscarres = document.getElementById("PdSTxEscarres").value+"\n";}
else {var PdSEscarres = "";}

var PdSCBCicat=document.getElementById("PdSCBCicat").checked;
if (document.getElementById("PdSCBCicat").checked)
{var PdSCicat = document.getElementById("PdSTxCicat").value+"\n";}
else {var PdSCicat = "";}

var PdSCBErgo=document.getElementById("PdSCBErgo").checked;
if (document.getElementById("PdSCBErgo").checked)
{var PdSErgo = document.getElementById("PdSTxErgo").value+"\n";}
else {var PdSErgo = "";}

var PdSCBKine=document.getElementById("PdSCBKine").checked;
if (document.getElementById("PdSCBKine").checked)
{var PdSKine = document.getElementById("PdSTxKine").value+"\n";}
else {var PdSKine = "";}

var PdSCBBalneo=document.getElementById("PdSCBBalneo").checked;
if (document.getElementById("PdSCBBalneo").checked)
{var PdSBalneo = document.getElementById("PdSTxBalneo").value+"\n";}
else {var PdSBalneo = "";}

var PdSCBApa=document.getElementById("PdSCBApa").checked;
if (document.getElementById("PdSCBApa").checked)
{var PdSApa = document.getElementById("PdSTxApa").value+"\n";}
else {var PdSApa = "";}

var PdSCBAS=document.getElementById("PdSCBAS").checked;
if (document.getElementById("PdSCBAS").checked)
{var PdSAS = document.getElementById("PdSTxAS").value+"\n";}
else {var PdSAS = "";}

var PdSCBCsChir=document.getElementById("PdSCBCsChir").checked;
if (document.getElementById("PdSCBCsChir").checked)
{var PdSCsChir = document.getElementById("PdSTxCsChir").value+"\n";}
else {var PdSCsChir = "";}

var PdSLibre1=document.getElementById("PdSLibre1").value+"\n";
var PdSLibre2=document.getElementById("PdSLibre2").value+"\n";
var PdSLibre3=document.getElementById("PdSLibre3").value+"\n"+"\n";


var string_au_total=genremaj+" opéré"+correcteurE+ " le " +dateRecons+" par le "+chirurgienFinal+ " pour "+typeOpe+" du côté "+coteOp+" dans les suites d'une "+etiologie+presComorbidites+"\n"; 
var string_PdS1="\n"+"Projet de soins : "+"\n"+"\n"+PdSDouleur+PdSThromboEmbolique+PdSEscarres+PdSCicat+PdSErgo+PdSKine+PdSBalneo+PdSApa+PdSAS+PdSCsChir;
var string_PdSLibreConcat = PdSLibre1+PdSLibre2+PdSLibre3;
var string_PdSF=genremaj+" et/ou famille informé"+correcteurE+" du projet de soins et en accord.";

document.formulaire.TexteSortie3.value=string_au_total+"\n"+string_PdS1+"\n"+string_PdSLibreConcat+string_PdSF;
}

function myChirZone(){ // I separate this function as we have to be able to edit PDsZone without risking this field to be reinitialized ...
	
  var chirurgienSelect = document.getElementById("chirurgien").value; //catch the firstzone
  var chirurgienAutre= document.getElementById("chirurgienAutre").value; //cath second zone
  var chirurgienFinal;
	if (chirurgienSelect=="Autre") //if first zone is "Autre",...
		{chirurgienFinal=chirurgienAutre;} // then use "other zone"...
	else {chirurgienFinal=chirurgienSelect;}  // else use predetermined surgeron.
  document.formulaire.PdSTxCsChir.value="Consultation de contrôle radioclinique avec le "+chirurgienFinal+" le XXX";
}