<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script>
        function printPage() {
            window.print();
        }
    </script>
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh; font-family: Arial, sans-serif; margin: 0;">
    
    @include('navbar')

    <div class="content" style="flex: 1; padding: 20px;">
        <div id="courseSection" style="width: 90%; margin: auto; text-align: center;">
            <h2>Student Details</h2>
            <button onclick="printPage()" style="margin-bottom: 10px; padding: 8px 12px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">
                <i class="fa fa-print"></i>
            </button>
            <table style="width: 100%; border-collapse: collapse; border: 2px solid #000; margin-top: 10px;">
                <thead>
                    <tr style="background-color: #f8f9fa;">
                        <th style="border: 2px solid #000; padding: 10px;">ID</th>
                        <th style="border: 2px solid #000; padding: 10px;">Name</th>
                        <th style="border: 2px solid #000; padding: 10px;">E-mail</th>
                        <th style="border: 2px solid #000; padding: 10px;">Contact</th>
                        <th style="border: 2px solid #000; padding: 10px;">Photo</th>
                        <th style="border: 2px solid #000; padding: 10px;">Qualifications</th>
                        <th style="border: 2px solid #000; padding: 10px;">Subject</th>
                        <th style="border: 2px solid #000; padding: 10px;">Teaching Experience</th>
                        <th style="border: 2px solid #000; padding: 10px;">Join Reason?</th>
                        <th style="border: 2px solid #000; padding: 10px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teacher as $tea)
                    <tr>
                        <td style="border: 2px solid #000; padding: 10px;">{{ $tea->id }}</td>
                        <td style="border: 2px solid #000; padding: 10px;">{{ $tea->name }}</td>
                        <td style="border: 2px solid #000; padding: 10px;">{{ $tea->email }}</td>
                        <td style="border: 2px solid #000; padding: 10px;">{{ $tea->phone }}</td>
                        <td style="border: 2px solid #000; padding: 10px;">
                            <img src="{{'/passport_image/'.$tea->passport_image}}" width="50" height="50" style="border-radius: 50%; object-fit: cover;">
                        </td>
                        <td style="border: 2px solid #000; padding: 10px;">{{ $tea->qualification }}</td>
                        <td style="border: 2px solid #000; padding: 10px;">{{ $tea->subject }}</td>
                        <td style="border: 2px solid #000; padding: 10px;">{{ $tea->experience }}</td>
                        <td style="border: 2px solid #000; padding: 10px;">{{ $tea->message }}</td>

                        <td class="btn-container" style="display: flex; gap: 5px; justify-content: center;">
                            <a href="#">
                                <button style="border: none; background: #dc3545; color: white; padding: 8px; border-radius: 5px; cursor: pointer;">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </a>
                            <a href="#">
                                <button style="border: none; background: #ffc107; color: white; padding: 8px; border-radius: 5px; cursor: pointer;">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                            <a href="{{url('student_print')}}">
                                <button style="border: none; background: #007bff; color: white; padding: 8px; border-radius: 5px; cursor: pointer;">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('footer')

</body>
</html>
