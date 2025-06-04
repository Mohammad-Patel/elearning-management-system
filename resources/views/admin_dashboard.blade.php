@extends('admin')

@section('details')

<style>
    /* Body & Overall Background */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f7fa; /* Light gray background */
        margin: 0;
        padding: 0;
    }

    /* Container for the stats section */
    .stats-container {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap; /* Allows items to wrap on smaller screens */
        margin: 30px auto;
        width: 90%;
        gap: 20px;
    }

    /* Individual stat block */
    .stat-block {
        color: white;
        padding: 40px;
        border-radius: 15px;
        width: 30%;
        text-align: center;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 200px; 
    }

    /* Hover effect on each stat block */
    .stat-block:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    /* Stat Title Style */
    .stat-block h1 {
        font-size: 2.5rem;
        font-weight: bold;
        margin: 0;
    }

    /* Additional info under the stat */
    .stat-block span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #d1c4e9;
        margin-top: 10px;
    }

    /* Specific color gradients for each stat block */
    .stat-block.students {
        background: linear-gradient(135deg, #006ba6, #1e88e5); /* Blue gradient */
    }

    .stat-block.teachers {
        background: linear-gradient(135deg, #d81159, #8f2d56); /* Orange gradient */
    }

    .stat-block.courses {
        background: linear-gradient(135deg, #66bb6a, #388e3c); /* Green gradient */
    }

    /* Table Styling */
    /* table {
        width: 98%;
        max-width: 1400px;
        margin: 30px auto;
        border-collapse: collapse;
        background: #fff;
        border-radius: 3px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    th, td {
        padding: 18px 20px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        min-height: 60px;
    }

    th {
        background-color: rgb(15, 41, 97);
        color: white;
    }

    td {
        background-color: #fafafa;
        font-size: 1.1rem;
        color: #333;
    }

    img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid rgb(15, 41, 97);
    }

    .action-buttons button {
        padding: 6px 12px;
        border: none;
        border-radius: 3px;
        margin-right: 5px;
        cursor: pointer;
        color: white;
    }

    .edit-btn {
        background-color: #2196F3;
    }

    .delete-btn {
        background-color: #f44336;
    } */

    /* JavaScript-based Transition Styles */
    .fade-in {
        opacity: 0;
        animation: fadeIn 1.5s forwards;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .stat-block {
            width: 45%;
        }
    }

    @media (max-width: 768px) {
        .stat-block {
            width: 100%;
        }
    }

    /* Canvas Styling for Graphs */
    .charts-container {
        display: flex;
        justify-content: space-around;
        gap: 20px;
        margin: 20px auto;
        width: 90%;
    }

    canvas {
        width: 300px !important;
        height: 200px !important;
        max-width: 100%;
        margin: 0 auto;
    }
</style>

@if(session('success'))
    <script>
        Swal.fire({
            title: '✅ Success!',
            text: @json(session('success')),
            icon: 'success',
            confirmButtonText: 'OK',
            width: '650px',
            padding: '3em',
            customClass: {
                title: 'swal-title-custom',
                popup: 'swal-popup-custom',
                confirmButton: 'swal-button-custom'
            }
        });
    </script>
    <style>
        .swal-title-custom {
            font-size: 2.2rem !important;
            font-weight: bold;
            color: #2d6a4f;
            text-align: center;
            margin-bottom: 1em;
        }

        .swal-popup-custom {
            font-size: 1.4rem;
            padding: 2em;
            background-color: #f0f8f1;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .swal-button-custom {
            font-size: 1.2rem;
            padding: 12px 25px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .swal-button-custom:hover {
            background-color: #218838;
        }
    </style>
@endif

<br><br><br><br>
<h2 style="text-align: center; font-size: 36px; font-weight: bold; background: linear-gradient(90deg, #4CAF50, #2196F3); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: 2px 2px 8px rgba(0,0,0,0.2); margin-top: 30px; margin-bottom: 40px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; letter-spacing: 1px;">
  Admin Dashboard
</h2>

<!-- The three stats section (Separate divs) -->
<div class="stats-container fade-in">
  <div class="stat-block students">
    <h1>Students: {{$totalStudent}}</h1>
    <span>Total enrolled students across courses.</span>
  </div>
  <div class="stat-block teachers">
    <h1>Teacher: {{$totalTeacher}}</h1>
    <span>Total active teaching staff in the system.</span>
  </div>
  <div class="stat-block courses">
    <h1>Course: {{$totalCourse}}</h1>
    <span>Available courses offered to the students.</span>
  </div>
</div>

<br><br>
<!-- Chart.js - Display Graphs -->
<div class="charts-container fade-in">
    <div>
        <h3 style="text-align: center;">Student Enrollment Trends</h3>
        <canvas id="studentsChart"></canvas>
    </div>

    <div>
        <h3 style="text-align: center;">Teacher Trends</h3>
        <canvas id="teachersChart"></canvas>
    </div>

    <div>
        <h3 style="text-align: center;">Course Trends</h3>
        <canvas id="coursesChart"></canvas>
    </div>
</div>

<br>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data for the charts
    var studentsData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Total Students Enrolled',
            data: [30, 50, 70, 90, 110, 130],
            backgroundColor: 'rgba(66, 165, 245, 0.2)',
            borderColor: '#42a5f5',
            borderWidth: 1
        }]
    };

    var teachersData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Total Teachers Active',
            data: [10, 12, 15, 18, 20, 25],
            backgroundColor: 'rgba(255, 112, 67, 0.2)',
            borderColor: '#d81159',
            borderWidth: 1
        }]
    };

    var coursesData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Courses Offered',
            data: [5, 6, 7, 8, 9, 10],
            backgroundColor: 'rgba(102, 187, 106, 0.2)',
            borderColor: '#66bb6a',
            borderWidth: 1
        }]
    };

    // Student Chart
    var studentsChart = new Chart(document.getElementById('studentsChart'), {
        type: 'line',
        data: studentsData,
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Teacher Chart
    var teachersChart = new Chart(document.getElementById('teachersChart'), {
        type: 'line',
        data: teachersData,
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Course Chart
    var coursesChart = new Chart(document.getElementById('coursesChart'), {
        type: 'line',
        data: coursesData,
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

@endsection
