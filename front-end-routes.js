const routes = [
  { path: '/', element: <Home /> }, // Home page
  { path: '/login', element: <Login /> }, // User login
  { path: '/signup', element: <Signup /> }, // User signup
  { path: '/dashboard', element: <Dashboard />, protected: true }, // Dashboard (protected route for clients and lawyers)
  { path: '/profile/:id', element: <Profile /> }, // Lawyer profile page (dynamic route by ID)
  { path: '/appointments', element: <Appointments />, protected: true }, // Appointment booking page
  { path: '/lawyers', element: <LawyersList /> }, // Browse lawyers
  { path: '/subscription', element: <Subscription />, protected: true }, // Subscription management for lawyers
  { path: '/about', element: <About /> }, // About page
  { path: '/contact', element: <Contact /> }, // Contact page
  { path: '*', element: <NotFound /> }, // 404 page
];
