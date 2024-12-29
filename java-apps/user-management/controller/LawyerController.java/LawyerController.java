package com.example.usermanagement.controller;

import com.example.usermanagement.model.Lawyer;
import com.example.usermanagement.service.LawyerService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/lawyers")
public class LawyerController {

    private final LawyerService lawyerService;

    @Autowired
    public LawyerController(LawyerService lawyerService) {
        this.lawyerService = lawyerService;
    }

    /**
     * Get all lawyers.
     *
     * @return List of lawyers.
     */
    @GetMapping
    public ResponseEntity<List<Lawyer>> getAllLawyers() {
        List<Lawyer> lawyers = lawyerService.getAllLawyers();
        return ResponseEntity.ok(lawyers);
    }

    /**
     * Get a lawyer by ID.
     *
     * @param id Lawyer ID.
     * @return Lawyer details.
     */
    @GetMapping("/{id}")
    public ResponseEntity<Lawyer> getLawyerById(@PathVariable Long id) {
        Lawyer lawyer = lawyerService.getLawyerById(id);
        return ResponseEntity.ok(lawyer);
    }

    /**
     * Create a new lawyer.
     *
     * @param lawyer Lawyer details.
     * @return Created lawyer.
     */
    @PostMapping
    public ResponseEntity<Lawyer> createLawyer(@RequestBody Lawyer lawyer) {
        Lawyer createdLawyer = lawyerService.createLawyer(lawyer);
        return ResponseEntity.status(201).body(createdLawyer);
    }

    /**
     * Update an existing lawyer.
     *
     * @param id     Lawyer ID.
     * @param lawyer Updated lawyer details.
     * @return Updated lawyer.
     */
    @PutMapping("/{id}")
    public ResponseEntity<Lawyer> updateLawyer(
            @PathVariable Long id,
            @RequestBody Lawyer lawyer) {
        Lawyer updatedLawyer = lawyerService.updateLawyer(id, lawyer);
        return ResponseEntity.ok(updatedLawyer);
    }

    /**
     * Delete a lawyer by ID.
     *
     * @param id Lawyer ID.
     * @return Success message.
     */
    @DeleteMapping("/{id}")
    public ResponseEntity<String> deleteLawyer(@PathVariable Long id) {
        lawyerService.deleteLawyer(id);
        return ResponseEntity.ok("Lawyer deleted successfully.");
    }
}
