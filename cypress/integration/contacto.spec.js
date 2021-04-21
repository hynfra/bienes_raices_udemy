/// <references types="cypress" /> // agrega el json de cypress

describe('Prueba el formulario de contacto', () =>{
    it('prueba la pagina de contacto y el envio de emails', () => {
        cy.visit('/contacto.php');

        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal','Contacto');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('not.equal','Formulario de contacto')
    
        cy.get('[data-cy="heading-formulario"]').should('exist');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal','Llene el formulario');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('not.equal','Llene el formulario de contacto')
        cy.get('[data-cy="formulario-contacto"]').should('exist'); 
    })
    it('llena los campos del formulario', () => {
        // type pone el texto escrito dentro en el input
        cy.get('[data-cy="input-nombre"]').type('Juan');
        cy.get('[data-cy="input-mensaje"]').type('dese comprar una casa');
        // esto es para un select
        cy.get('[data-cy="input-opciones"]').select('compra');
        cy.get('[data-cy="input-precio"]').type('12000');
        // esto es para los radiobutton
        cy.get('[data-cy="forma-contacto"]').eq(0).check();
        // para fechas se escribe segun el formato que diga el input 
        cy.get('[data-cy="input-fecha"]').type('2021-03-30');
        cy.get('[data-cy="input-hora"]').type('10:30:45');
        // aqui se selecciona el boton para enviar y lo envia 
        cy.get('[data-cy="formulario-contacto"]').submit();
    })
})

Cypress.on('uncaught:exception', (err, runnable) => {
    console.log(err);
    return false;
  })