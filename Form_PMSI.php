		<!-- Copyright (c) Alain CARROT 15-12-2019
	https://creativecommons.org/licenses/by-nc/3.0/
	-->
<html>
	<head>

		<link rel="icon" type="image/png" href=".\images\tanpmsi.png" />
		<title>PMSI</title>
		
		<link href="StyleImpression.css" rel="stylesheet" type="text/css">

	</head>

	<body>
	
	<?php 
	if (isset ($_POST['ButtonPmsi']))
	{
		
		class TableauGen 
		{
			/* this class will create main big array : To do so it has to :
1. integrate differents label to use (ie constipation, obesity, pain ... )
2. put these informations in a unmaterial array named _my_array
3. print the differents items of this array in real array			*/
			private $_nombre_de_lignes;
			private $_index=1;
			private $_my_array=[];
			private $_var_code="| &nbsp;&nbsp | &nbsp;&nbsp | &nbsp;&nbsp | &nbsp;&nbsp | &nbsp;&nbsp |";
			private $_label = "";
			
			public function __construct ($_passage_de_nombre){
			$this->_nombre_de_lignes = $_passage_de_nombre;
			$this->table_gen();
			}
			
			private function table_gen(){ // generate void table
				while ($this->_index <= $this->_nombre_de_lignes){
					$this -> _my_array[$this->_index] = "";					
					$this->_index ++;										
				}
			}
			
			private function print_ligne($_label){ // template to print information 
				echo    '<tr>';            
					echo 	   '<td class="cal-code">',$this->_var_code,'</td>';
					echo 	 	'<td>';
					
					echo $_label;
					
					echo    	'</td>';
					echo        '</tr>';
			}
									
			
			private function find_next_void(){ // function that will find in _my_array what is next "void place"
				$i=1;
				$tarjet_void=4;
				$next_void=0;
				while ($i<=$this->_nombre_de_lignes && $this -> _my_array[$i] != "" ){
					$i++;
					$next_void++;
					
				}
				$next_void++;
				return $next_void;
			}

			public function attr_var_labl_list($list_to_integrate){ // will select each element of a list given as argument (ie comorbidites_split, ...) and fullfill _my_array 
				foreach ($list_to_integrate as $value)
				{
					$this -> _my_array[$this->find_next_void()] = $value; 
				}
			}
			public function attr_var_labl_item($item_to_integrate){ // will use given element and fullfill _my_array 

					$this -> _my_array[$this->find_next_void()] = $item_to_integrate; 

			}
			
			public function print_debut(){ //template to print the beginning of array
				echo '<div contenteditable="true">';
				echo '<table id="table_pmsi_zone2">';

			}
			

			public function array_construct(){ // will construct real printed array from _my_array
				$n=1;
				foreach($this ->_my_array as $item){
					$this -> print_ligne($item);
					$n++;
				}
				
			}
			
			public function print_fin(){
				echo '</table>';
				echo '</div>';
			}
			
			public function debug_array(){
				var_dump( $this -> _my_array);
				echo $this -> _my_array[1];
				}
			
		}
		


		
		
		$dateOpe=$_POST['dateOpe'];
        $maDateOpe = date("d-m-Y", strtotime($dateOpe)); // convert date
			if ($maDateOpe=='01-01-1970') // if date = 01/01/1970, it signify that it is null
			{
			$maDateOpe = 'DATE ND';
			}
		
		$typeOpe=$_POST['typeOpe'];
		$cote=$_POST['radioCote'];
		$etiologie=$_POST['etiologie'];

		
		$comorbidites=(stripslashes(strip_tags($_POST['comorbidites'])));
		$comorbidites_split=explode("\n",$comorbidites); //split the concatenate textarea ie : "ligne1\nligne2" to make a list
		$comorbidites_reconcatenate = implode("<br>",$comorbidites_split); // create a new string with <br> in replacement of \n 
		// an other possibility would have been to use string remplacement but here I can catch every line.
		
		$complicationsInterc=(stripslashes(strip_tags($_POST['complicationsInterc'])));
		if ($complicationsInterc=="Suites simples"){ // if complications == "Simple outcome", then complications = void.
			$complicationsInterc="";}
		$complicationsInterc_split=explode("\n",$complicationsInterc); //split the concatenate textarea ie : "ligne1\nligne2" to make a list
		$complicationsInterc_reconcatenate = implode("<br>",$complicationsInterc_split); // create a new string with <br> in replacement of \n 

		$imc=$_POST['imc'];
		$eva=$_POST['eva'];
		$heteroeval = $_POST['heteroeval'];
		$temperature=$_POST['temperature'];
		
		$radioPsy=$_POST['radioPsy'];
		$psytxt=$_POST['psytxt'];
		
		$radioAbdo=$_POST['radioAbdo'];
		
		$CODE_FinPrinc='| Z| &nbsp;&nbsp | &nbsp;&nbsp | &nbsp;&nbsp | &nbsp;&nbsp |';
		$CODE_ManifMorb='| &nbsp;&nbsp | &nbsp;&nbsp | &nbsp;&nbsp | &nbsp;&nbsp | &nbsp;&nbsp |';
		$CODE_AffEt='| &nbsp;&nbsp | &nbsp;&nbsp | &nbsp;&nbsp | &nbsp;&nbsp | &nbsp;&nbsp |';

		// calculate first day of week
		$day = date('w');
		$week_start = date('d|m|Y', strtotime('-'.($day-1).' days'));

		
		echo '<div class="date_decal" contenteditable="true">'.' <font size="-3"> Edité le : '.date('j M Y h:i A').'</font><br>';
		echo 'Semaine <u>|' . date('W',strtotime(date("Ymd"))) . '|</u> de ' . date('o',strtotime(date("Ymd"))).'<br><br>';
		echo '<font size="-3">Etiquette patient</font>';
		echo '</div>';

		echo '<div class="entete_central" contenteditable="true">';
		echo '<br>Lundi de la semaine : ';
		echo '<u>|';
		echo $week_start;
		echo '|</u>';
		echo '<br>';

		echo 'Unité médicale : <u>|7|0|0|7|</u>';

		echo '</div>';		
		
		echo '<br><br><br><br><br>';		
		
		echo '<div align="right" contenteditable="true" >';
		echo '<br>';
		echo '<table id="table_pmsi_motifs">';
		echo    '<tr>';
		echo 	   '<td class="cal-morb">MORBIDITES</td>';
		echo 	   '<td class="cal-code" >CODES CIM10</td>';
		echo 	   '<td >LIBELLES</td>';
		echo    '</tr>';
		echo    '<tr>';
		echo 	   '<td class="cal-morb">Finalité principale de prise en charge </td>';
		echo 	   '<td class="cal-code">',$CODE_FinPrinc,'</td>';
		echo 	   '<td>Prise en charge rééducative suite à :</td>';
		echo    '</tr>';
		
		echo    '<tr>';
		echo 	   '<td class="cal-morb">Manifestation morbide principale</td>';
		echo 	   '<td class="cal-code">',$CODE_ManifMorb,'</td>';
		echo 		'<td>';
		echo            $typeOpe,' côté ',$cote, ' le ',$maDateOpe, ' sur :';
		echo    	'</td>';
		echo    '</tr>';
		echo    '<tr>';
		echo 	   '<td>Affection etiologique </td>';
		echo 	   '<td>',$CODE_AffEt,'</td>';
		echo 		'<td>';
		echo 			$etiologie;
		echo    	'</td>';
		echo    '</tr>';
	
		echo '</table>';
		echo '</div>';
		
		echo '<br>';
		
		// second tableau
		$table_gen= new TableauGen(24);
		$table_gen ->attr_var_labl_list($complicationsInterc_split);
		$table_gen ->attr_var_labl_list($comorbidites_split);

		
		
		
// about the pain
		if ($eva >= '5' ||$heteroeval >='2')
		{		
			$var_alg= 'Etat algique important';
			$table_gen ->attr_var_labl_item($var_alg);
		}



// about the weight
		$var_poids= '';
		if ($imc <= '18.5')
		{
			$var_poids= 'Denutrition';
		}
		if (($imc >= '25') && ($imc < '30'))
		{
			$var_poids= 'Surpoids';

		}
		if (($imc >= '30') && ($imc < '35'))
		{
			$var_poids= 'Obésité grade I';

		}
		if (($imc >= '35') && ($imc < '40'))
		{
			$var_poids= 'Obésité grade II';

		}
		if ($imc >= '40'&& ($imc < '80'))
		{
			$var_poids= 'Obésité grade III';

		}

		if ($var_poids!= ''){
			$table_gen ->attr_var_labl_item($var_poids);
		};

		

//about the fever
		
		if ($temperature >= '38')
		{
			$var_temp= 'Fièvre à '. $temperature;
			$table_gen ->attr_var_labl_item($var_temp);
		}
		
		
//about psychological state
		$var_psy="";
		if ($radioPsy == 'psytxt' && $psytxt != "Pas de syndrome anxiodépressif cliniquement mis en évidence.")
		{
			$var_psy='Elements Psychologiques :* ';
		}
		if ($radioPsy == 'Etat anxieux')
		{
			$var_psy='Etat anxieux ';
		}
		if ($radioPsy == 'Elements dépressifs')
		{
			$var_psy='Elements dépressifs ';
		}
		if ($radioPsy == 'Elements anxio-dépressifs')
		{
			$var_psy='Elements anxio-dépressifs';
		}
		
		if ($var_psy!= ''){
			$table_gen ->attr_var_labl_item($var_psy);
		}
				
//about abdominal state
		
		$var_abdo="";
		if ($radioAbdo == 'Constipation')
		{
			$var_abdo='Constipation';

		}
		if ($radioAbdo == 'Diarrhées')
		{
			$var_abdo='Diarrhées';

		}
		if ($var_abdo!= ''){
			$table_gen ->attr_var_labl_item($var_abdo);
		}

	echo '</div>';
	
	
	
		$table_gen ->print_debut();
		$table_gen ->array_construct();
		$table_gen ->print_fin();

		// troisième tableau
	
		echo "Actes médicaux";
		$ecg="ECG";
		
		$table_gen_bas= new TableauGen(3);
	
		$table_gen_bas ->attr_var_labl_item($ecg);
		$table_gen_bas ->print_debut();
		$table_gen_bas ->array_construct();
		$table_gen_bas ->print_fin();


	}
	

	
	?>
	
	</body>

</html>