/// <references types="cypress" /> // agrega el json de cypress

describe('prueba la autenticacion', ()=> {
    it('prueba la autenticacion en /login',()=> {
        cy.visit('login.php');

    cy.get('[data-cy="heading-login"]').should('exist');
    cy.get('[data-cy="heading-login"]').should('have.text','Iniciar sesion');
    cy.get('[data-cy="formulario-login"]').should('exist');
        // LOS ESPACIOS ENTRE ELEMENTOS PUEDEN ARROJAR ERROR
    // ambos campos son obligatorios
    cy.get('[data-cy="formulario-login"]').submit();
    cy.get('[data-cy="alerta-login"]').should('exist')
    cy.get('[data-cy="alerta-login"]').first().should('have.class','error');    
    cy.get('[data-cy="alerta-login"]').first().should('have.text','El email es obligatorio o no es valido'); 

    cy.get('[data-cy="alerta-login"]').eq(1).should('have.class','error');    
    cy.get('[data-cy="alerta-login"]').eq(1).should('have.text','El password es obligatorio o no es valido'); 
    //el usuario exista


    // verificar el password
    })
})


Cypress.on('uncaught:exception', (err, runnable) => {
    console.log(err);
    return false;
  })