describe('Browse Lawyers', () => {
  it('should allow a user to view a list of lawyers', () => {
    cy.visit('/lawyers'); // Navigate to the lawyers page
    cy.get('.lawyer-card').should('have.length.greaterThan', 0); // Ensure lawyers are displayed
    cy.contains('John Doe'); // Check if a specific lawyer is listed
  });
});
