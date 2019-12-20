	<!-- Copyright (c) Alain CARROT 15-12-2019
	https://creativecommons.org/licenses/by-nc/3.0/
	-->
<html>
	<head>

		<link rel="icon" type="image/png" href=".\images\tan.png" />
		<title>FormEntrée</title>
		
		<link href="style.css" rel="stylesheet" type="text/css">
		<script src = 'JSFieldPreR.js' async></script>
		<script src = 'JSFieldCreation.js' async></script>
		<script src = 'JSButtonsEntreForm.js' async></script>
	</head>

	<body>
	<div id="titre_app">
	<img src=".\images\tan.png" class="fit-picture-header"/>
	FormEntrée</div>
	<h3> 
		<div id="select_menu">	
			<input type = "radio" name="quel_form" value="PTG_Complet"  id="quel_form_ptg" onchange="auto_fulfill()" class="radio_disap" >
			<label for="quel_form_ptg"><img src=".\images\boutons\knee_unchecked.png" class="fit-picture"/></label>
			<input type = "radio" name="quel_form" value="PTH_Complet"  id="quel_form_pth" onchange="auto_fulfill() " class="radio_disap">
			<label for="quel_form_pth"><img src=".\images\boutons\hip_unchecked.png" class="fit-picture"/></label>

		</div>
	</h3>
	<br>
	
	<form name="formulaire" method="post" action = "Form_PMSI.php" target="_blank">

 <!--This first part is about patient history and will modify TexteSortie1 through myFunctionZoneFinale() script  -->
	
	<br>
	<fieldset>
 <legend> Recueil des données / HDM</legend><br>
	
	Sexe : 
	<span class="marge8"><label>Femme<input type = "radio" name="radioSexe" value="Femme" checked onblur="myFunctionZoneFinale()"></label>
						<label>Homme<input type = "radio" name="radioSexe" value="Homme" onblur="myFunctionZoneFinale()"></label>
						</span>
						<br>
						<br>
						
	Mode de vie et Autonomie antérieure : <br>
	<textarea name="MdV" rows="2" cols="120" id="MdV" onblur="myFunctionZoneFinale()"></textarea>
	<br>
						
	Comorbidités notables*  <span class="infobulle" aria-label="Elements influançant la prise en charge. Un par ligne.">(?)</span> : <br>
	<textarea name="comorbidites" rows="3" cols="120" id="comorbidites" onblur="myFunctionZoneFinale()"></textarea>
	<br>
	Autres comorbidités  <span class="infobulle" aria-label="Elements passés. Un par ligne">(?)</span>  : <br>
	<textarea name="comorbiditesAutres" rows="3" cols="120" id="comorbiditesAutres" onblur="myFunctionZoneFinale()"></textarea>
	<br>
	<br>
	<br>
	
	Anamnèse : <br>
	<textarea name="anamnese" rows="3" cols="120" id="anamnese" onblur="myFunctionZoneFinale()"></textarea>
	<br>
	
	Date d'opération<span class="infobulle" aria-label="Ecrire avec le clavier est plus fiable">(?)</span> : 
	<span class="marge3">
	<input type="date" id="dateOpe" name="dateOpe" value="1970-01-01">
	</span>
	<br>
	
	Chirurgien : &nbsp;<span class="marge5">
	<select name="chirurgien" id="chirurgien" onblur="myChirZone()"></span>
		<option>Autre</option> 
		<option>Dr Ganansia</option>
		<option>Dr Majed</option>
		<option>Dr Pichon</option>
		<option>Pr Saragaglia</option>
	</select>
	<span class="marge1">
		Si autre : <input type="text" name="chirurgienAutre" id="chirurgienAutre" value="" onblur="myChirZone()">
	</span>

	<br>
	
	Type d'opération* : <span class="marge3">
	<input type = "text" id="typeOpe" value = "" name="typeOpe" onblur="myFunctionZoneFinale()"></span>
	<br>
	
	Côté* : 
	<label><span class="marge8">
		Droit<input type = "radio" name="radioCote" value="droit" checked onblur="myFunctionZoneFinale()">
	</label>
	<label>Gauche<input type = "radio" name="radioCote" value="gauche" onblur="myFunctionZoneFinale()"></label>
	<br>
	
	Etiologie de l'opération* : &nbsp;<input type="text" name="etiologie" id="etiologie" value="" onblur="myFunctionZoneFinale()">
	<br><br>
	Complications intecurrentes* <span class="infobulle" aria-label="Ce qui s'est passé au décours de la chirurgie">(?)</span>:  <textarea name="complicationsInterc" id="complicationsInterc" onblur="myFunctionZoneFinale()">Suites simples</textarea>
	<br>
	Consignes post opératoires et précautions : <textarea name="consignesPostOp" id="consignesPostOp" onblur="myFunctionZoneFinale()"></textarea>
	
	</fieldset>
	


<!-- end of the first zone (we can think about add ATCD and Treatments and Allergies zones-->

<!-- beginning of patient examination -->
	<br>
		<fieldset>
			<legend> Examen clinique : </legend>
			<br>
			<fieldset>
				<legend> Paramètres vitaux : </legend>
	<br>
	Taille (en m): <input type="nombre" size="4" name="taille" id="taille" value="" onblur="myFunctionZoneFinale()">
	<span class="marge1"></span>
	Poids (en kg): <input type="nombre" size="4" name="poids" id="poids" value="" onblur="myFunctionZoneFinale()">
	<span class="marge2"></span>
	IMC* : <input  type="nombre" readonly="true" name="imc" size="4" id="imc" value="" onblur="myFunctionZoneFinale()"> 
	<br>
	Norton : <span class="marge2"></span><input type="nombre" size="4" name="norton" id="norton" value="" onblur="myFunctionZoneFinale()">
	<span class="marge3"></span>
	EVA/EN* : <input type="nombre" size="2" name="eva" id="eva" value="" onblur="myFunctionZoneFinale()">
	<span class="marge3"></span>
	Hétéroevaluation* : <input type="nombre" size="2" name="heteroeval" id="heteroeval" value="" onblur="myFunctionZoneFinale()">
	<br>


	TA : <span class="marge4"></span><input type="text" size="4" name="tensa" id="tensa" value="" onblur="myFunctionZoneFinale()">
	<span class="marge4"></span>
	Pouls : <input type="nombre" size="2" name="pouls" id="pouls" value="" onblur="myFunctionZoneFinale()"> /min
	<span class="marge1"></span>
	T°* :<input type="nombre" size="2" name="temperature" id="temperature" value="" onblur="myFunctionZoneFinale()"> °C 
	<span class="marge2"></span>
	Saturation : <input type="nombre" size="2" name="saturation" id="saturation" value="" onblur="myFunctionZoneFinale()"> %
			</fieldset>
			
			
	<br><br>
	
	<div id="check_cote">
	<br>
	<!-- gen et psy -->
  <input type="checkbox" id="checkbox1" name="checkbox1" checked> <br>
   <br>
  <input type="checkbox" id="checkbox2" name="checkbox2" checked> <br>
  <input type="checkbox" id="checkbox3" name="checkbox3" checked> <br>
  <br><br><br><br>
  	<!-- cv -->
  <input type="checkbox" id="checkbox4" name="checkbox4" checked> <br>
    <br><br><br><br><br><br>
    <!-- abdo -->
  <input type="checkbox" id="checkbox5" name="checkbox5" checked> <br>

  
	</div>
	
	<h4>Etat général et psychologique : </h4>
	Variation pondérale : <input type="text" size="40" name="varPoids" id="varPoids" value="Pas de variation significative." onblur="myFunctionZoneFinale()"><br>
	Etat psychologique* : <br>
	<label><input type = "radio" name="radioPsy" value="psytxt" checked onblur="myFunctionZoneFinale()"><input type="text" size="90" name="psytxt" id="psytxt" value="Pas de syndrome anxiodépressif cliniquement mis en évidence." onblur="myFunctionZoneFinale()"></label><br>
	<label><input type = "radio" name="radioPsy" value="Etat anxieux" onblur="myFunctionZoneFinale()">Etat anxieux</label>
	<label><input type = "radio" name="radioPsy" value="Elements dépressifs" onblur="myFunctionZoneFinale()">Elements dépressifs</label>
	<label><input type = "radio" name="radioPsy" value="Elements anxio-dépressifs" onblur="myFunctionZoneFinale()">Elements anxio-dépressifs</label>
	<br>
	<br>
	
	
	<h4>Examen cardio-pulmonaire :</h4>
	<textarea name="cardioResp" id="cardioResp"  rows="3" cols="120" onblur="myFunctionZoneFinale()">Les bruits du coeur sont réguliers, non soufflants, pas de signe d'insuffisance cardiaque, pouls périphériques perçus, mollets souples et indolores. 
Auscultation pulmonaire : Claire et symétrique. MV : +/+</textarea>

	
	<br><br>
	
	
	
	<h4>Examen abdominal :</h4>
	<textarea name="abdoTxt" id="abdoTxt"  rows="3" cols="120" onblur="myFunctionZoneFinale()">Abdomen souple à la palpation, indolore, pas d'organomégalie perçue.</textarea>
<br>Transit* : <br>
	<label><input type = "radio" name="radioAbdo" value="Transit normal" checked onblur="myFunctionZoneFinale()">Normal</label><br>
	<label><input type = "radio" name="radioAbdo" value="Constipation" onblur="myFunctionZoneFinale()">Constipation </label>: <input type="text" size="20" name="txtConstip" id="txtConstip" value="" onblur="myFunctionZoneFinale()"><br>
	<label><input type = "radio" name="radioAbdo" value="Diarrhées" onblur="myFunctionZoneFinale()">Diarrhées</label> : <span class="marge1"><input type="text" size="20" name="txtDia" id="txtDia" value="" onblur="myFunctionZoneFinale()"></span>

	<br><br>
	<h4>Examen génito-urinaire : 
	</h4>
	<textarea name="uroTxt" id="uroTxt"  rows="3" cols="120" onblur="myFunctionZoneFinale()">Pas de signe fonctionnel urinaire. Pas de fuites.</textarea>

	<br><br>
	<h4>Examen cutanéo-muqueux : 
	</h4>
	<textarea name="cutaTxt" id="cutaTxt"  rows="3" cols="120" onblur="myFunctionZoneFinale()">Pansement propre non taché.
Langue propre, muqueuse humide. </textarea> <br>
<br>

	<h4>Examen neurologique : </h4>
	<textarea name="neuroTxt" id="neuroTxt"  rows="2" cols="120" onblur="myFunctionZoneFinale()">
lucide, orienté, pas de signe de focalisation.</textarea><br><br>

	<h4>Examen ostéo-articulaire : </h4>
Membre opéré :<br>
<div id="tableau_amplitudes">
<table id="table_amplitudes">
	<tr>
		<th class="th_amp"></th> <!-- call the css class th_amp to fix the width -->
		<th class="th_amp"></th>
	</tr>
	<tr>
		<td>Flexion passive : <input type="nombre" size="4" name="flexP" id="flexP" value="" onblur="myFunctionZoneFinale()"></td>
		<td> Extension passive : <input type="nombre" size="4" name="extP" id="extP" value="" onblur="myFunctionZoneFinale()"></td>
		<td>Abduction passive : <input type="nombre" size="4" name="abdP" id="abdP" value="" onblur="myFunctionZoneFinale()"></td>

	</tr>
	<tr>
		<td>Flexion active :  &nbsp;&nbsp; <input type="nombre" size="4" name="flexA" id="flexA" value="" onblur="myFunctionZoneFinale()"></td>
		<td>Extension active : &nbsp;&nbsp;&nbsp;<input type="nombre" size="4" name="extA" id="extA" value="" onblur="myFunctionZoneFinale()"></td>
		<td>Abduction active :  &nbsp;&nbsp; <input type="nombre" size="4" name="abdA" id="abdA" value="" onblur="myFunctionZoneFinale()"></td>

	</tr>


</table>
</div>
	<textarea name="orthoOpTxt" id="orthoOpTxt"  rows="3" cols="120" onblur="myFunctionZoneFinale()">Pas de déficit des releveurs, pas de déficit de sensibilité. </textarea>
<br><br>

    Membre inférieur non opéré : <textarea name="orthoNOpTxt" id="orthoNOpTxt"  rows="2" cols="120" onblur="myFunctionZoneFinale()">Pas de déficit d'amplitude ni de douleurs.</textarea><br><br>
	Membres supérieurs : <br><textarea name="orthoMSTxt" id="orthoMSTxt"  rows="2" cols="120" onblur="myFunctionZoneFinale()">Pas de limitations ni douleurs.</textarea>	<br><br>
	Sur le plan fonctionnel : <br><textarea name="orthoFct" id="orthoFct"  rows="2" cols="120" onblur="myFunctionZoneFinale()">Escaliers non réalisables.</textarea>
	

	</fieldset>
	
	<br><br>
			<fieldset>
			<legend>Projet de soins : </legend>
	

	<input type="checkbox" id="PdSCBDouleur" checked onblur="myFunctionZoneFinale()">
	<input type="text" size="80" name="PdSTxDouleur" id="PdSTxDouleur" value="Adaptation du traitement antalgique ;" onblur="myFunctionZoneFinale()">  <br>
	
	<input type="checkbox" id="PdSCBThromboEmbolique" checked onblur="myFunctionZoneFinale()">
	<input type="text" size="80" name="PdSTxThromboEmbolique" id="PdSTxThromboEmbolique" value="Prévention de la maladie thrombo-embolique ;" onblur="myFunctionZoneFinale()">  <br>

	<input type="checkbox" id="PdSCBEscarres" checked onblur="myFunctionZoneFinale()">
	<input type="text" size="80" name="PdSTxEscarres" id="PdSTxEscarres" value="Prévention des escarres ;" onblur="myFunctionZoneFinale()">  <br>

	<input type="checkbox" id="PdSCBCicat" checked onblur="myFunctionZoneFinale()">
	<input type="text" size="80" name="PdSTxCicat" id="PdSTxCicat" value="Surveillance cicatrice et soins locaux ;" onblur="myFunctionZoneFinale()">  <br>

	<input type="checkbox" id="PdSCBErgo" checked onblur="myFunctionZoneFinale()">
	<input type="text" size="80" name="PdSTxErgo" id="PdSTxErgo" value="Prise en charge en ergothérapie : installation  ;" onblur="myFunctionZoneFinale()">  <br>

	<input type="checkbox" id="PdSCBKine" checked onblur="myFunctionZoneFinale()">

	<textarea name="PdSTxKine" id="PdSTxKine"  rows="1" cols="120" onblur="myFunctionZoneFinale()">Prise en charge en kinésithérapie : récupération des amplitudes articulaires, lutte contre le flexum; renforcement musculaire, travail de l'équilibre, de la marche et des escaliers; </textarea> <br>
	
	<input type="checkbox" id="PdSCBBalneo" checked onblur="myFunctionZoneFinale()">
	<input type="text" size="80" name="PdSTxBalneo" id="PdSTxBalneo" value="Balnéothérapie à cicatrisation;" onblur="myFunctionZoneFinale()">  <br>

	<input type="checkbox" id="PdSCBApa" checked onblur="myFunctionZoneFinale()">
	<input type="text" size="80" name="PdSTxApa" id="PdSTxApa" value="Prise en charge APA à distance: travail de la marche dans les conditions de la vie quotidienne ;" onblur="myFunctionZoneFinale()">  <br>

	<input type="checkbox" id="PdSCBAS" checked onblur="myFunctionZoneFinale()">
	<input type="text" size="80" name="PdSTxAS" id="PdSTxAS" value="Point social pour retour à domicile;" onblur="myFunctionZoneFinale()">  <br>

	<input type="checkbox" id="PdSCBCsChir" checked onblur="myFunctionZoneFinale()">
	<input type="text" size="80" name="PdSTxCsChir" id="PdSTxCsChir" value="Consultation de contrôle radioclinique avec le xxx le xxx ;" onblur="myFunctionZoneFinale()">  <br>

	<input type="checkbox" disabled="disabled" id="casePdSLibre1" checked onblur="myFunctionZoneFinale()">
	<input type="text" size="80" name="PdSLibre1" id="PdSLibre1" value="" onblur="myFunctionZoneFinale()">  <br>
	<input type="checkbox" disabled="disabled" id="casePdSLibre2" checked onblur="myFunctionZoneFinale()">
	<input type="text" size="80" name="PdSLibre2" id="PdSLibre2" value="" onblur="myFunctionZoneFinale()">  <br>
	<input type="checkbox" disabled="disabled" id="casePdSLibre3" checked onblur="myFunctionZoneFinale()">
	<input type="text" size="80" name="PdSLibre3" id="PdSLibre3" value="" onblur="myFunctionZoneFinale()">  <br>


	</fieldset>
	

<br>	
	
			<br>
		Zone HDM: 
		<br><textarea NAME="TexteSortie1" id="TexteSortie1" ROWS="8" COLS="120" readonly="true" WRAP="physical"></textarea>
		  
		  <center><button id="copy1" type="button">Copier<span class="copiedtext" aria-hidden="true">Copié</span></button></center><br>
<br>

		Zone ATCD: 
		<br><textarea NAME="TexteSortie1b" id="TexteSortie1b" ROWS="8" readonly="true" WRAP="physical"></textarea>
	
		  <center><button id="copy1b" type="button">Copier<span class="copiedtext" aria-hidden="true">Copié</span></button></center><br>
<br>

		Zone examen: 
		<br><textarea NAME="TexteSortie2" id="TexteSortie2" ROWS="8" COLS="120" readonly="true" WRAP="physical"></textarea>
	
		  <center><button id="copy2" type="button">Copier<span class="copiedtext" aria-hidden="true">Copié</span></button></center><br>
<br>
		Zone Conclusion et Projet de soins : <br><textarea NAME="TexteSortie3" id = "TexteSortie3" ROWS="8" COLS="120" readonly="true" WRAP="physical"></textarea>
		  
		  <center><button id="copy3" type="button">Copier<span class="copiedtext" aria-hidden="true">Copié</span></button></center>
<br>
<br>
	
	
	
	<input id="prodId" name="prodId" type="hidden" value="xm234jq">
	



	<br><br><br>
	 <center><input type="submit" name = "ButtonPmsi" value="Generer PMSI"></center> 

	
	
	</form>
	<a rel="license" href="http://creativecommons.org/licenses/by-nc/3.0/fr/"><img alt="Licence Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/3.0/fr/80x15.png" /></a><br />

	</body>

</html>