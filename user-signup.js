describe('User Signup Flow', () => {
  it('should allow a user to sign up', () => {
    cy.visit('/signup'); // Navigate to the signup page
    cy.get('#name').type('Test User'); // Enter name
    cy.get('#email').type('testuser@example.com'); // Enter email
    cy.get('#password').type('securepassword'); // Enter password
    cy.get('#confirmPassword').type('securepassword'); // Confirm password
    cy.get('button[type="submit"]').click(); // Submit the form

    // Assert successful signup
    cy.url().should('include', '/dashboard'); // Redirect to the dashboard
    cy.contains('Welcome, Test User'); // Check for a welcome message
  });
});
