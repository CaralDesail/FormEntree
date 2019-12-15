function auto_fulfill() {
	var form_to_use=document.querySelector('input[name="quel_form"]:checked').value;

	var table_amplitudes=document.getElementById("table_amplitudes");

if (form_to_use=="PTG_Complet")
	{
		document.formulaire.typeOpe.value="pose de PTG";
		document.formulaire.etiologie.value="gonarthrose";
		

		// will select witch colums to print in table_amplitudes array
		table_amplitudes.rows[1].cells[1].style.display="";
		table_amplitudes.rows[2].cells[1].style.display="";

		table_amplitudes.rows[1].cells[2].style.display="none";
		table_amplitudes.rows[2].cells[2].style.display="none";
		
		
		document.formulaire.PdSTxErgo.value="Prise en charge en ergothérapie : installation  ;";
		
	}

if (form_to_use=="PTH_Complet")
	{
		document.formulaire.typeOpe.value="pose de PTH";
		document.formulaire.etiologie.value="coxarthrose";


		// will select witch colums to print in table_amplitudes array
		table_amplitudes.rows[1].cells[2].style.display="";
		table_amplitudes.rows[2].cells[2].style.display="";

		table_amplitudes.rows[1].cells[1].style.display="none";
		table_amplitudes.rows[2].cells[1].style.display="none";
		
		document.formulaire.PdSTxErgo.value="Prise en charge en ergothérapie : installation, éducation à l'éviction des gestes luxants ;";
	}


}