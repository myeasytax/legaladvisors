<?php
include 'db-connect.php';
include 'cleanup.php'; // Include the cleanup script
include 'helpers.php'; // Include helper functions if necessary

/**
 * Send reminders for upcoming appointments.
 *
 * @param PDO $pdo
 */
function sendAppointmentReminders(PDO $pdo)
{
    $upcomingDate = date('Y-m-d H:i:s', strtotime('+24 hours'));

    $stmt = $pdo->prepare('SELECT * FROM bookings WHERE date_time <= :upcomingDate AND reminder_sent = 0');
    $stmt->execute([':upcomingDate' => $upcomingDate]);
    $bookings = $stmt->fetchAll();

    foreach ($bookings as $booking) {
        // Simulate sending an email (replace with actual email logic)
        echo "Reminder sent to {$booking['email']} for booking ID {$booking['id']}.\n";

        // Mark reminder as sent
        $updateStmt = $pdo->prepare('UPDATE bookings SET reminder_sent = 1 WHERE id = :id');
        $updateStmt->execute([':id' => $booking['id']]);
    }

    echo "Appointment reminders sent.\n";
}

/**
 * Perform periodic tasks.
 */
function runCronJobs()
{
    global $pdo;

    // 1. Clean up old session and temp files
    clearExpiredSessions();
    clearTempFiles(__DIR__ . '/tmp'); // Adjust temp directory as needed

    // 2. Remove outdated records from the database
    removeOutdatedRecords($pdo);

    // 3. Send reminders for upcoming appointments
    sendAppointmentReminders($pdo);

    echo "All cron jobs executed successfully.\n";
}

// Execute cron jobs
runCronJobs();
