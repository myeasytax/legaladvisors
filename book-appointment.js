describe('Book an Appointment', () => {
  it('should allow a user to book an appointment with a lawyer', () => {
    cy.visit('/lawyers'); // Navigate to the lawyers page
    cy.contains('John Doe').click(); // Select a specific lawyer
    cy.get('#appointment-date').type('2024-12-30'); // Select a date
    cy.get('#appointment-time').select('10:00 AM'); // Select a time
    cy.get('button[type="submit"]').click(); // Book the appointment

    // Assert successful booking
    cy.contains('Appointment confirmed'); // Check for a confirmation message
  });
});
