describe('Dashboard Functionality', () => {
  before(() => {
    cy.login('testuser@example.com', 'securepassword'); // Custom command for logging in
  });

  it('should display user-specific data on the dashboard', () => {
    cy.visit('/dashboard'); // Navigate to the dashboard
    cy.contains('Your Appointments'); // Check for appointments section
    cy.get('.appointment-card').should('have.length.greaterThan', 0); // Ensure appointments are listed
  });
});
