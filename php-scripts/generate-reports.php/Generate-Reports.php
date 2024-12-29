<?php
require_once '../vendor/autoload.php';
require_once '../Backend/includes/db-connect.php';
require_once '../Backend/helpers/utilities.php';
use FPDF\FPDF;

class ReportGenerator
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    /**
     * Fetch report data from the database.
     *
     * @return array
     */
    public function fetchReportData()
    {
        $query = "SELECT id, name, email, created_at FROM users";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Generate a CSV report.
     *
     * @param string $filePath
     */
    public function generateCSV($filePath)
    {
        $data = $this->fetchReportData();

        $file = fopen($filePath, 'w');

        // Add CSV header
        fputcsv($file, ['ID', 'Name', 'Email', 'Created At']);

        // Add data rows
        foreach ($data as $row) {
            fputcsv($file, $row);
        }

        fclose($file);
    }

    /**
     * Generate a PDF report.
     *
     * @param string $filePath
     */
    public function generatePDF($filePath)
    {
        $data = $this->fetchReportData();

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);

        // Add title
        $pdf->Cell(0, 10, 'User Report', 0, 1, 'C');

        // Add table header
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 10, 'ID', 1);
        $pdf->Cell(60, 10, 'Name', 1);
        $pdf->Cell(80, 10, 'Email', 1);
        $pdf->Cell(30, 10, 'Created At', 1);
        $pdf->Ln();

        // Add data rows
        $pdf->SetFont('Arial', '', 10);
        foreach ($data as $row) {
            $pdf->Cell(20, 10, $row['id'], 1);
            $pdf->Cell(60, 10, $row['name'], 1);
            $pdf->Cell(80, 10, $row['email'], 1);
            $pdf->Cell(30, 10, $row['created_at'], 1);
            $pdf->Ln();
        }

        $pdf->Output('F', $filePath);
    }
}

// Usage example
try {
    $reportGenerator = new ReportGenerator($conn);

    // Generate CSV
    $csvPath = '../storage/reports/user_report.csv';
    $reportGenerator->generateCSV($csvPath);
    echo "CSV report generated at: $csvPath\n";

    // Generate PDF
    $pdfPath = '../storage/reports/user_report.pdf';
    $reportGenerator->generatePDF($pdfPath);
    echo "PDF report generated at: $pdfPath\n";
} catch (Exception $e) {
    echo "Error generating reports: " . $e->getMessage();
}
?>
