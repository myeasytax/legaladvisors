router.get('/api/subscriptions', subscriptionController.getAllSubscriptions); // Get subscription plans
router.post('/api/subscriptions', subscriptionController.subscribe); // Subscribe to a plan
router.get('/api/subscriptions/:userId', subscriptionController.getSubscriptionByUser); // Get user subscription details
router.put('/api/subscriptions/:userId', subscriptionController.updateSubscription); // Update subscription plan
router.delete('/api/subscriptions/:userId', subscriptionController.cancelSubscription); // Cancel subscription
