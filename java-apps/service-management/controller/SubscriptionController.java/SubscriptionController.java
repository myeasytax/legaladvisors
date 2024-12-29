package com.example.servicemanagement.controller;

import com.example.servicemanagement.model.Subscription;
import com.example.servicemanagement.service.SubscriptionService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/subscriptions")
public class SubscriptionController {

    private final SubscriptionService subscriptionService;

    @Autowired
    public SubscriptionController(SubscriptionService subscriptionService) {
        this.subscriptionService = subscriptionService;
    }

    /**
     * Get all subscriptions.
     *
     * @return List of subscriptions.
     */
    @GetMapping
    public ResponseEntity<List<Subscription>> getAllSubscriptions() {
        List<Subscription> subscriptions = subscriptionService.getAllSubscriptions();
        return ResponseEntity.ok(subscriptions);
    }

    /**
     * Get a subscription by ID.
     *
     * @param id Subscription ID.
     * @return Subscription details.
     */
    @GetMapping("/{id}")
    public ResponseEntity<Subscription> getSubscriptionById(@PathVariable Long id) {
        Subscription subscription = subscriptionService.getSubscriptionById(id);
        return ResponseEntity.ok(subscription);
    }

    /**
     * Create a new subscription.
     *
     * @param subscription Subscription details.
     * @return Created subscription.
     */
    @PostMapping
    public ResponseEntity<Subscription> createSubscription(@RequestBody Subscription subscription) {
        Subscription createdSubscription = subscriptionService.createSubscription(subscription);
        return ResponseEntity.status(201).body(createdSubscription);
    }

    /**
     * Update an existing subscription.
     *
     * @param id           Subscription ID.
     * @param subscription Updated subscription details.
     * @return Updated subscription.
     */
    @PutMapping("/{id}")
    public ResponseEntity<Subscription> updateSubscription(
            @PathVariable Long id,
            @RequestBody Subscription subscription) {
        Subscription updatedSubscription = subscriptionService.updateSubscription(id, subscription);
        return ResponseEntity.ok(updatedSubscription);
    }

    /**
     * Delete a subscription by ID.
     *
     * @param id Subscription ID.
     * @return Success message.
     */
    @DeleteMapping("/{id}")
    public ResponseEntity<String> deleteSubscription(@PathVariable Long id) {
        subscriptionService.deleteSubscription(id);
        return ResponseEntity.ok("Subscription deleted successfully.");
    }
}
