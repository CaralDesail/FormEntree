//script to make buttons copy the fields
var toCopy1  = document.getElementById( 'TexteSortie1' ),
    btnCopy1 = document.getElementById( 'copy1' );
var toCopy1b  = document.getElementById( 'TexteSortie1b' ),
    btnCopy1b = document.getElementById( 'copy1b' );
var toCopy2  = document.getElementById( 'TexteSortie2' ),
    btnCopy2 = document.getElementById( 'copy2' );
var toCopy3  = document.getElementById( 'TexteSortie3' ),
    btnCopy3 = document.getElementById( 'copy3' );


btnCopy1.addEventListener( 'click', function(){ // will listen if we click on button 
  toCopy1.select(); //select the text (= ctrl + a)
  
  if ( document.execCommand( 'copy' ) ) { //copy it in clipboard
      btnCopy1.classList.add( 'copied' ); //for button interaction
    
    
      var temp = setInterval( function(){ // let 0.6 sec for animation
        btnCopy1.classList.remove( 'copied' );
        clearInterval(temp);
      }, 600 );
    
  } else {
    console.info( 'document.execCommand went wrong…' ) //if failure
  }
  
  return false;
} );

btnCopy1b.addEventListener( 'click', function(){ // will listen if we click on button 
  toCopy1b.select(); //select the text (= ctrl + a)
  
  if ( document.execCommand( 'copy' ) ) { //copy it in clipboard
      btnCopy1b.classList.add( 'copied' ); //for button interaction
    
    
      var temp = setInterval( function(){ // let 0.6 sec for animation
        btnCopy1b.classList.remove( 'copied' );
        clearInterval(temp);
      }, 600 );
    
  } else {
    console.info( 'document.execCommand went wrong…' ) //if failure
  }
  
  return false;
} );

btnCopy2.addEventListener( 'click', function(){
  toCopy2.select();
  
  if ( document.execCommand( 'copy' ) ) {
      btnCopy2.classList.add( 'copied' );
    
    
      var temp = setInterval( function(){
        btnCopy2.classList.remove( 'copied' );
        clearInterval(temp);
      }, 600 );
    
  } else {
    console.info( 'document.execCommand went wrong…' )
  }
  
  return false;
} );
btnCopy3.addEventListener( 'click', function(){
  toCopy3.select();
  
  if ( document.execCommand( 'copy' ) ) {
      btnCopy3.classList.add( 'copied' );
    
    
      var temp = setInterval( function(){
        btnCopy3.classList.remove( 'copied' );
        clearInterval(temp);
      }, 600 );
    
  } else {
    console.info( 'document.execCommand went wrong…' )
  }
  
  return false;
} );
