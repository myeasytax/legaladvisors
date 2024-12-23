describe('User Login Flow', () => {
  it('should allow a user to log in', () => {
    cy.visit('/login'); // Navigate to the login page
    cy.get('#email').type('testuser@example.com'); // Enter email
    cy.get('#password').type('securepassword'); // Enter password
    cy.get('button[type="submit"]').click(); // Submit the login form

    // Assert successful login
    cy.url().should('include', '/dashboard'); // Redirect to the dashboard
    cy.contains('Welcome back'); // Check for a welcome message
  });
});
