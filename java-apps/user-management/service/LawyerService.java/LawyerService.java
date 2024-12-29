package com.example.usermanagement.service;

import com.example.usermanagement.model.Lawyer;
import com.example.usermanagement.repository.LawyerRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class LawyerService {

    @Autowired
    private LawyerRepository lawyerRepository;

    public List<Lawyer> getAllLawyers() {
        return lawyerRepository.findAll();
    }

    public Lawyer getLawyerById(Long id) {
        return lawyerRepository.findById(id)
                .orElseThrow(() -> new RuntimeException("Lawyer not found with id: " + id));
    }

    public Lawyer createLawyer(Lawyer lawyer) {
        return lawyerRepository.save(lawyer);
    }

    public Lawyer updateLawyer(Long id, Lawyer lawyer) {
        return lawyerRepository.findById(id)
                .map(existingLawyer -> {
                    existingLawyer.setName(lawyer.getName());
                    existingLawyer.setSpecialization(lawyer.getSpecialization());
                    existingLawyer.setEmail(lawyer.getEmail());
                    existingLawyer.setLicenseNumber(lawyer.getLicenseNumber());
                    return lawyerRepository.save(existingLawyer);
                })
                .orElseThrow(() -> new RuntimeException("Lawyer not found with id: " + id));
    }

    public void deleteLawyer(Long id) {
        lawyerRepository.deleteById(id);
    }
}
