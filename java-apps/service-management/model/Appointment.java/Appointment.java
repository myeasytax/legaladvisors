package com.example.servicemanagement.model;

import jakarta.persistence.*;
import lombok.Data;

@Entity
@Data
public class Appointment {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @ManyToOne
    @JoinColumn(name = "user_id", nullable = false)
    private User user;

    @ManyToOne
    @JoinColumn(name = "lawyer_id", nullable = false)
    private Lawyer lawyer;

    @Column(nullable = false)
    private String date;

    @Column(nullable = false)
    private String time;

    @Column(length = 50)
    private String status; // E.g., "Pending", "Confirmed", "Completed"
}
