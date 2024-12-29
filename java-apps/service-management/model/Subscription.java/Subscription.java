package com.example.servicemanagement.model;

import jakarta.persistence.*;
import lombok.Data;

@Entity
@Data
public class Subscription {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @ManyToOne
    @JoinColumn(name = "lawyer_id", nullable = false)
    private Lawyer lawyer;

    @Column(nullable = false)
    private String type; // E.g., "Basic", "Standard", "Advanced"

    @Column(nullable = false)
    private Double price;

    @Column(nullable = false, length = 50)
    private String status; // E.g., "Active", "Expired", "Pending"

    @Column(nullable = false)
    private String startDate; // E.g., "2024-01-01"

    @Column(nullable = true)
    private String endDate; // E.g., "2024-12-31"
}
