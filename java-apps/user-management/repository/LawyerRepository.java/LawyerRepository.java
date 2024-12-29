package com.example.usermanagement.repository;

import com.example.usermanagement.model.Lawyer;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.Optional;
import java.util.List;

@Repository
public interface LawyerRepository extends JpaRepository<Lawyer, Long> {

    /**
     * Find a lawyer by their email.
     *
     * @param email Email of the lawyer.
     * @return Optional containing the lawyer if found.
     */
    Optional<Lawyer> findByEmail(String email);

    /**
     * Find a lawyer by their license number.
     *
     * @param licenseNumber License number of the lawyer.
     * @return Optional containing the lawyer if found.
     */
    Optional<Lawyer> findByLicenseNumber(String licenseNumber);

    /**
     * Find lawyers by their specialization.
     *
     * @param specialization Specialization of the lawyers.
     * @return List of lawyers with the specified specialization.
     */
    List<Lawyer> findBySpecialization(String specialization);

    /**
     * Check if a lawyer exists by their email.
     *
     * @param email Email of the lawyer.
     * @return True if the lawyer exists, false otherwise.
     */
    boolean existsByEmail(String email);

    /**
     * Check if a lawyer exists by their license number.
     *
     * @param licenseNumber License number of the lawyer.
     * @return True if the lawyer exists, false otherwise.
     */
    boolean existsByLicenseNumber(String licenseNumber);
}
