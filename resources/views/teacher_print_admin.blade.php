<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Fee Receipt</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f4f4f4; 
            margin: 0; 
            padding: 0; 
        }

        .receipt-container { 
            width: 80%; 
            max-width: 900px; /* A4 पेज की सही चौड़ाई */
            margin: auto; 
            margin-top: 40px; 
            padding: 20px; 
            border: 2px solid #333; 
            border-radius: 5px; 
            background: white; 
            page-break-inside: avoid; 
        }

        .receipt-header { 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
        }

        .school-logo { 
            width: 80px; 
            height: 80px; 
        }

        .details-table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }

        .details-table th, 
        .details-table td { 
            padding: 10px; 
            border: 1px solid #000; 
            text-align: left; 
            font-size: 16px; 
            word-wrap: break-word; 
        }

        .btn-container { 
            display: flex; 
            justify-content: center; 
            gap: 20px; /* Buttons के बीच कम स्पेस */
            margin-top: 20px; 
        }

        .btn { 
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
        } 
        .btn-print:hover { 
            background-color: #218838; 
        }

        .school-logo {
            width: 400px; 
            height: 180px; 
            object-fit: contain; 
            display: block;
            margin: 0; 
            padding: 10px; 
            background-color: white; 
        }


        /* A4 Page Print Optimization */
        @media print { 
            body { 
                background-color: white; 
            }

            .receipt-container { 
                width: 100%; 
                max-width: 1000px; /* A4 Page width */
                padding: 30px; 
                margin: 0; 
                box-sizing: border-box; 
                page-break-after: always; 
            }

            .details-table th, 
            .details-table td { 
                font-size: 14px; /* Font को A4 में सही दिखाने के लिए */
                padding: 12px; 
            }

            .btn-container { 
                display: none; /* Print में बटन दिखाने की जरूरत नहीं */
            }

        }
    </style>
</head>
<body>

<div class="receipt-container">
    <div class="receipt-header">
    <img src="{{ asset('img/school logo.PNG') }}" class="school-logo" alt="School Logo">

        <div>
            <h2>ABC International School</h2>
            <p>123, Main Street, City, State - 123456</p>
            <p><strong>Fee Receipt</strong></p>
        </div>
    </div>
    
    <table class="details-table">
        <tr>
            <th>Teacher Profile</th>
            <td>
                <a href="{{ '/passport_image/'.$teacher->passport_image }}" target="_blank">
                    <img src="{{ '/passport_image/'.$teacher->passport_image }}" width="80" height="80" style="border: 2px solid #ddd; object-fit: cover;">
                </a>
            </td>
        </tr>
        <tr><th>ID</th><td>#{{ $teacher->id }}</td></tr>
        <tr><th>Teacher Name</th><td>{{ $teacher->name }}</td></tr>
        <tr><th>E-mail</th><td>{{ $teacher->email }}</td></tr>
        <tr><th>Contact</th><td>{{ $teacher->phone }}</td></tr>
        <tr><th>Qualifications</th><td>{{ $teacher->qualification }}</td></tr>
        <tr><th>Subject</th><td>{{ $teacher->subject }}</td></tr>
        <tr><th>Teaching Experience</th><td>{{ $teacher->experience }}</td></tr>
        <tr><th>Join Reason ?</th><td>{{ $teacher->message }}</td></tr>
    </table>

    <p style="margin-top: 20px;"><strong>Authorized Signatory:</strong></p>
    <p>______________________</p>

    <div class="btn-container">
        <a href="{{ url('teacher_description')}}" class="btn btn-back"><i class="fa fa-arrow-left"></i> Back</a>
        <button class="btn btn-print" onclick="window.print()"><i class="fa fa-print"></i> Print Receipt</button>
    </div>
</div>

</body>
</html>
