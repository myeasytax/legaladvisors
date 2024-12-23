router.get('/api/dashboard', authenticateToken, dashboardController.getDashboardData); // Fetch dashboard data
