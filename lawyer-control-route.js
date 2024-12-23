router.get('/api/lawyers', lawyerController.getAllLawyers); // Get list of lawyers
router.get('/api/lawyers/:id', lawyerController.getLawyerById); // Get lawyer details by ID
router.post('/api/lawyers', lawyerController.addLawyer); // Add new lawyer (admin or self-registration)
router.put('/api/lawyers/:id', lawyerController.updateLawyer); // Update lawyer details
router.delete('/api/lawyers/:id', lawyerController.deleteLawyer); // Remove lawyer (admin action)
