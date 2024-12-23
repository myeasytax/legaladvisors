import { Navigate } from 'react-router-dom';

function ProtectedRoute({ element, isAuthenticated }) {
  return isAuthenticated ? element : <Navigate to="/login" />;
}

// Example usage
<Route
  path="/dashboard"
  element={<ProtectedRoute element={<Dashboard />} isAuthenticated={isAuthenticated} />}
/>
