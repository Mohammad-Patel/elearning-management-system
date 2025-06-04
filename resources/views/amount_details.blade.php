<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Payment Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        #detailsSection {
            width: 80%;
            margin: auto;
            margin-top: 40px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background: white;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
        }

        .details-table th, .details-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 16px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }

        .btn-back {
            background-color: #007bff;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }

        .btn-print {
            background-color: #28a745;
            margin-left: 10px;
        }

        .btn-print:hover {
            background-color: #218838;
        }

        @media print {
            body * {
                visibility: hidden;
            }
            #printableContent, #printableContent * {
                visibility: visible;
            }
            #printableContent {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div id="detailsSection">
    <h2>Student Payment Details</h2>
    
    <div id="printableContent">
        <table class="details-table">
            <tr><th>Enrollment No.</th> <td>{{ $student->enrollment_number }}</td></tr>
            <tr><th>Student Name</th> <td>{{ $student->name }}</td></tr>
            <tr><th>Course Name</th> <td>{{ $student->department }}</td></tr>
            <tr><th>Category</th> <td>{{ $student->admission_cate }}</td></tr>
            <tr><th>Amount Paid</th> <td>{{ $student->payment }}</td></tr>
            <tr><th>Payment Type</th> <td>{{ $student->payment_type }}</td></tr>
            <tr><th>Paying Date</th> <td>{{ $student->payment_date }}</td></tr>
        </table>
    </div>

    <div class="btn-container">
        <a href="{{ url('amount') }}" class="btn btn-back"><i class="fa fa-arrow-left"></i> Back</a>
        <button class="btn btn-print" onclick="printDetails()"><i class="fa fa-print"></i> Print</button>
    </div>
</div>

<script>
    function printDetails() {
        window.print();
    }
</script>

</body>
</html>
