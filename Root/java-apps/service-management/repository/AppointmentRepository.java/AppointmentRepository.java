package com.example.servicemanagement.repository;

import com.example.servicemanagement.model.Appointment;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface AppointmentRepository extends JpaRepository<Appointment, Long> {

    /**
     * Find appointments by user ID.
     *
     * @param userId ID of the user.
     * @return List of appointments for the given user.
     */
    List<Appointment> findByUserId(Long userId);

    /**
     * Find appointments by lawyer ID.
     *
     * @param lawyerId ID of the lawyer.
     * @return List of appointments for the given lawyer.
     */
    List<Appointment> findByLawyerId(Long lawyerId);

    /**
     * Find appointments by status.
     *
     * @param status Status of the appointments (e.g., "Pending").
     * @return List of appointments with the specified status.
     */
    List<Appointment> findByStatus(String status);
}
