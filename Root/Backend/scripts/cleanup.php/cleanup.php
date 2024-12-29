<?php
include 'db-connect.php';

/**
 * Clear expired sessions.
 */
function clearExpiredSessions()
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_unset();
        session_destroy();
    }

    $sessionDir = ini_get('session.save_path') ?: sys_get_temp_dir();
    $files = glob("$sessionDir/sess_*");

    foreach ($files as $file) {
        if (filemtime($file) < time() - 3600) { // Clear sessions older than 1 hour
            unlink($file);
        }
    }

    echo "Expired sessions cleared.\n";
}

/**
 * Clear temporary files.
 *
 * @param string $dir
 * @param int $expiryTime
 */
function clearTempFiles($dir, $expiryTime = 3600)
{
    $files = glob("$dir/*");
    foreach ($files as $file) {
        if (is_file($file) && filemtime($file) < time() - $expiryTime) {
            unlink($file);
        }
    }

    echo "Temporary files in '$dir' cleared.\n";
}

/**
 * Remove outdated database records.
 *
 * @param PDO $pdo
 */
function removeOutdatedRecords(PDO $pdo)
{
    $expiryDate = date('Y-m-d H:i:s', strtotime('-30 days'));

    // Example: Clean up old subscriptions
    $stmt = $pdo->prepare('DELETE FROM subscriptions WHERE created_at < :expiryDate');
    $stmt->execute([':expiryDate' => $expiryDate]);

    echo "Outdated database records removed.\n";
}

// Perform cleanup tasks
clearExpiredSessions();
clearTempFiles(__DIR__ . '/tmp'); // Replace with your temp directory
removeOutdatedRecords($pdo);

echo "Cleanup completed.\n";
