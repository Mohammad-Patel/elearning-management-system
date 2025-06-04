<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
</head>
<body>

<h1>Student Information</h1>

<table border=2>
    <thead>
        <tr>
            <th>ID</th>
            <th>Enrollment</th>
            <th>Name</th>
            <th>Birth Date</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>E-mail</th>
            <th>LastSchool name</th>
            <th>Board</th>
            <th>Passing Year</th>
            <th>Department</th>
            <th>Duration</th>
            <th>Category</th>
            <th>Passport Photo</th>
            <th>Marksheet Photo</th>
            <th>Payment</th>
            <th>Payment Type</th>
            <th>Payment Date</th>
        </tr>
    </thead>
    <tbody>
        <!--THIS IS $student TABLE NAME AND $std IS VARIABLE NAME-->
        @foreach($stu as $st)
        <tr>
            <td>{{ $st->id}}</td>
            <td>{{ $st->enrollment_number,}}</td>
            <td>{{ $st->name}}</td>
            <td>{{ $st->birth_date}}</td>
            <td>{{ $st->gender}}</td>
            <td>{{ $st->contact}}</td>
            <td>{{ $st->email }}</td>
            <td>{{ $st->school_name }}</td>
            <td>{{ $st->board }}</td>
            <td>{{ $st->passing_year }}</td>
            <td>{{ $st->department }}</td>
            <td>{{ $st->duration }}</td>
            <td>{{ $st->admission_cate }}</td>
            <td>{{ $st->passport_image }}</td>
            <td>{{ $st->marksheet_image }}</td>
            <td>{{ $st->payment }}</td>
            <td>{{ $st->payment_type }}</td>
            <td>{{ $st->payment_date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
