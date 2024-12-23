router.get('/api/appointments', appointmentController.getAllAppointments); // Get all appointments
router.get('/api/appointments/:id', appointmentController.getAppointmentById); // Get appointment details by ID
router.post('/api/appointments', appointmentController.bookAppointment); // Book a new appointment
router.put('/api/appointments/:id', appointmentController.updateAppointment); // Update appointment
router.delete('/api/appointments/:id', appointmentController.cancelAppointment); // Cancel appointment
