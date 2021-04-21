
/// <references types="cypress" /> // agrega el json de cypress

describe('carga la pagina principal', () =>{
    it('prueba el header de la pagina principal', () =>{
            cy.visit('/')  // visit envia el cypress al enlace

            cy.get('[data-cy="heading-sitio"]').should('exist');// indica si existe el elemento
            // invoke(text) invoca el texto del elemento y el equal indica que debe ser igual al segundo parametro
            cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal','Venta de casas y departamentos exclusivos de lujo');
            // lo mismo pero verifica que NO tenga el texto del segundo parametro
            cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal','bienes raices');
        
           
        });

    it('Prueba el bloque de los iconos principales', () =>{

        cy.get('[data-cy="heading-massobre"]').should('exist');
        // have.prop verifica que tenga la propiedad
        cy.get('[data-cy="heading-massobre"]').should('have.prop','tagName').should('equal','H2');
    
        cy.get('[data-cy="iconos-nosotros"]').should('exist');
        // find encuentra un elemento dentro del seleccionado, have.length verifica que tenga el numero puesto (3)

        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length',3);
    
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('not.have.length',4);
    })
    it('Prueba la seccion de imagenes', () => {
        
        cy.get('[data-cy="titulo-seccion-casas"]').should('have.prop','tagName').should('equal','H2');

        cy.get('[data-cy="contenido-anuncio"]').find('.contenido-anuncio').should('have.length',3);
    
        cy.get('[data-cy="contenido-anuncio"]').find('.contenido-anuncio').should('not.have.length',4);
   
        cy.get('[data-cy="enlace-propiedad"]').should('have.class', 'boton-amarillo-block');
        // .first() indica el primero de todos los que cumple 
        cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal','ver propiedad');
    
        //probar enlace de una propiedad
        cy.get('[data-cy="enlace-propiedad"]').first().click();

       // cy.get('[data-cy="titulo-propiedad"]').should('exist');
       // .wait espera en milisegundos
       // .go devuelve a la pagina anterior
       cy.wait(1000);
       cy.go('back');
    })
    it('prueba del routing hacia todas las propiedades', () => {

        cy.get('[data-cy="todas-propiedades"]').should('exist');
    
        cy.get('[data-cy="todas-propiedades"]').should('have.class','boton-verde');
            // verifica que el enlace del boton sea correcto
        cy.get('[data-cy="todas-propiedades"]').invoke('attr', 'href').should('equal','anuncios.php');

        //cy.get('[data-cy="todas-propiedades"]').click();
    })
    
    it('prueba el bloque de contacto',() => {
        cy.get('[data-cy="imagen-contacto"]').should('exist');
        cy.get('[data-cy="imagen-contacto"]').find('h2').invoke('text').should('equal', 'Encuentra la casa de tus sueños');
        cy.get('[data-cy="imagen-contacto"]').find('p').invoke('text').should('equal', 'llena el formulario y un asesor se pondra en contacto contigo a la brevedad');
        cy.get('[data-cy="imagen-contacto"]').find('p').should('have.class','cambio');
        cy.get('[data-cy="imagen-contacto"]').find('a').invoke('attr','href')
        .then( href => {
            cy.visit(href);
        });
        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.wait(1000);
        cy.visit('/');// cuando se usa el .then de javascript, no se puede usar el .go de cypress
    })

    it('prueba el bloque de contacto',() =>{
        cy.get('[data-cy="blog"]').should('exist');
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('equal', 'Nuestro blog');
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('not.equal', 'Blog');
        cy.get('[data-cy="blog"]').find('img').should('have.length',2);

        cy.get('[data-cy="testimoniales"]').should('exist');
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('equal', 'Testimoniales');
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('not.equal', 'Nuestros Testimoniales');
    })
})
Cypress.on('uncaught:exception', (err, runnable) => {
    console.log(err);
    return false;
  })