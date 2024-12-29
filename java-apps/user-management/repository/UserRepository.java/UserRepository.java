package com.example.usermanagement.repository;

import com.example.usermanagement.model.User;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.Optional;

@Repository
public interface UserRepository extends JpaRepository<User, Long> {

    /**
     * Find a user by their username.
     *
     * @param username Username of the user.
     * @return Optional containing the user if found.
     */
    Optional<User> findByUsername(String username);

    /**
     * Find a user by their email.
     *
     * @param email Email of the user.
     * @return Optional containing the user if found.
     */
    Optional<User> findByEmail(String email);

    /**
     * Check if a user exists by their username.
     *
     * @param username Username of the user.
     * @return True if the user exists, false otherwise.
     */
    boolean existsByUsername(String username);

    /**
     * Check if a user exists by their email.
     *
     * @param email Email of the user.
     * @return True if the user exists, false otherwise.
     */
    boolean existsByEmail(String email);
}
