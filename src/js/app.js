document.addEventListener('DOMContentLoaded',function(){// el evento ejecutara esta funcion una vez haya cargado toda la pagina (DOMContentLoaded)
    eventListeners();
    darkMode();
    
})
function darkMode(){
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');//pone el modo dark si el color elegido por defecto en el navegador del usuario es asi
    //console.log(prefiereDarkMode.matches);
    if(prefiereDarkMode.matches){// ve si coincide el modo con el que tiene el usuario por defecto en el navegado
        document.body.classList.add(prefiereDarkMode);// agrega el modo dark
    }else{
    document.body.classList.remove(prefiereDarkMode);//quita el modo dark  
    }
    prefiereDarkMode.addEventListener('change',function(){// ve si ha cambiado el evento y ejecuta el mismo codigo de arriba 
        if(prefiereDarkMode.matches){
        document.body.classList.add(prefiereDarkMode);
        }else{ document.body.classList.remove(prefiereDarkMode); 
        }
        
    })
    const botonDarkMode = document.querySelector('.dark-mode-boton');// asigna a una variable la clase puesta en html dark-mode--boton
    botonDarkMode.addEventListener('click',function(){//evento que se activa al click
        document.body.classList.toggle('dark-mode');// se hace refencia al body de lhtml y se agrega o se quita la clase dark-mode
    })
}
function eventListeners(){
   const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);
}
function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');
      navegacion.classList.toggle('mostrar');
    /*if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    }else{
        navegacion.classList.add('mostrar');
    }*/
}