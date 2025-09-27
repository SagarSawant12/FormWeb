<?php
$servername = "localhost"; // Change if necessary
$username = "root"; // Default for XAMPP
$password = ""; // Default for XAMPP
$database = "internship";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serialNo = $_POST["serialNo"];
    $studentName = $_POST["studentName"];
    $year = $_POST["year"];
    $company = $_POST["company"];
    $workDetails = $_POST["workDetails"];
    $stipend = $_POST["stipend"];
    $duration = $_POST["duration"];
    $fromDate = $_POST["fromDate"];
    $toDate = $_POST["toDate"];
    $internshipType = $_POST["internshipType"];
    $internalType = isset($_POST["internalType"]) ? $_POST["internalType"] : NULL;

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO internships (serialNo, studentName, year, company, workDetails, stipend, duration, fromDate, toDate, internshipType, internalType) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssisisss", $serialNo, $studentName, $year, $company, $workDetails, $stipend, $duration, $fromDate, $toDate, $internshipType, $internalType);

    if ($stmt->execute()) {
        echo "<script>alert('Internship details submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<section id="form-section" class="form-container">
    <h2>Internship Details</h2>
    <form method="POST" action="">
        <label for="serialNo">Serial No.</label>
        <input type="text" id="serialNo" name="serialNo" required>

        <label for="studentName">Name of the Student</label>
        <input type="text" id="studentName" name="studentName" required>

        <label for="year">Year</label>
        <select id="year" name="year">
            <option value="se">SE</option>
            <option value="te">TE</option>
            <option value="be">BE</option>
        </select>

        <label for="company">Company Name and Location</label>
        <input type="text" id="company" name="company" required>

        <label for="workDetails">Work Details</label>
        <textarea id="workDetails" name="workDetails"></textarea>

        <label for="stipend">Stipend (in Rupees)</label>
        <input type="number" id="stipend" name="stipend">

        <label for="duration">Duration</label>
        <input type="text" id="duration" name="duration">

        <label for="fromDate">From Date</label>
        <input type="date" id="fromDate" name="fromDate">

        <label for="toDate">To Date</label>
        <input type="date" id="toDate" name="toDate">

        <label for="internshipType">Internship Type</label>
        <select id="internshipType" name="internshipType">
            <option value="internal">Internal</option>
            <option value="external">External</option>
        </select>

        <div id="internalOptions" style="display: none;">
            <label for="internalType">If Internal</label>
            <select id="internalType" name="internalType">
                <option value="sdp">SDP</option>
                <option value="byProject">By Project</option>
            </select>
        </div>

        <button type="submit">Submit</button>
    </form>
</section>

<script>
document.getElementById("internshipType").addEventListener("change", function () {
    const internalOptions = document.getElementById("internalOptions");
    if (this.value === "internal") {
        internalOptions.style.display = "block";
    } else {
        internalOptions.style.display = "none";
    }
});
</script>

</body>
</html>