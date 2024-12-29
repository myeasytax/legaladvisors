package com.example.servicemanagement.repository;

import com.example.servicemanagement.model.Subscription;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface SubscriptionRepository extends JpaRepository<Subscription, Long> {

    /**
     * Find subscriptions by lawyer ID.
     *
     * @param lawyerId ID of the lawyer.
     * @return List of subscriptions for the given lawyer.
     */
    List<Subscription> findByLawyerId(Long lawyerId);

    /**
     * Find subscriptions by status.
     *
     * @param status Status of the subscription (e.g., "Active").
     * @return List of subscriptions with the specified status.
     */
    List<Subscription> findByStatus(String status);

    /**
     * Find subscriptions by type.
     *
     * @param type Subscription type (e.g., "Basic").
     * @return List of subscriptions with the specified type.
     */
    List<Subscription> findByType(String type);
}
