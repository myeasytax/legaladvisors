package com.example.usermanagement.model;

import jakarta.persistence.*;
import lombok.Data;

@Entity
@Data
public class Lawyer {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(nullable = false)
    private String name;

    @Column(nullable = false)
    private String specialization; // e.g., "Criminal Law", "Family Law"

    @Column(nullable = false, unique = true)
    private String email;

    @Column(nullable = false, unique = true)
    private String licenseNumber;

    @Column
    private String phoneNumber;
}
