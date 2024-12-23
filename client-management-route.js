router.get('/api/clients/:id', clientController.getClientById); // Get client details
router.post('/api/clients', clientController.addClient); // Add new client
router.put('/api/clients/:id', clientController.updateClient); // Update client details
router.delete('/api/clients/:id', clientController.deleteClient); // Remove client (admin action)
