@extends('admin')

@section('details')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
    
    #courseSection {
        width: 90%;
        margin: auto;
        margin-top: 40px;
    }

   
    .top-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

   
    .search-container {
        position: relative;
        width: 250px;
    }

    
    .search-box {
        width: 100%;
        padding: 10px 35px 10px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        outline: none;
    }

    
    .search-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: gray;
        font-size: 18px;
    }

    
    .btn-add {
        background-color: #007bff;
        border: none;
        padding: 10px 15px;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-add a {
        color: white;
        text-decoration: none;
    }

    .btn-add:hover {
        background-color: #0056b3;
    }

    
    #courseTable {
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    #courseTable thead {
        background-color: #f9f9f9;
        color: black;
    }

    #courseTable th, #courseTable td {
        padding: 15px;
        border: 1px solid #ddd;
        text-align: center;
        font-size: 16px;
    }

    
    .action-buttons {
            display: flex;
            gap: 5px;
            justify-content: center;
            align-items: center;
        }
        .btn-action {
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .btn-delete { background: #dc3545; }
        .btn-edit { background: #ffc107; }
        .btn-show { background: #007bff; }

</style>

@if(session('success'))
    @php
        $msg = session('success');
        $isWarning = \Illuminate\Support\Str::contains(strtolower($msg), ['delete', 'removed', 'deleted']);
    @endphp

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: '{{ $isWarning ? 'warning' : 'success' }}',
            title: '{{ $msg }}',
            background: '{{ $isWarning ? '#fff3f3' : '#e6f9ec' }}',
            color: '{{ $isWarning ? '#d33' : '#155724' }}',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
        });
    </script>
@endif

<div id="courseSection">
    <h2 style="text-align: center;">Faculty Details</h2>

   
    <div class="top-section">
        <div class="search-container">
            <input type="text" id="searchInput" class="search-box" placeholder="Search Faculty...">
            <i class="search-icon">&#128269;</i> 
        </div>
        <!-- <button class="btn-add"><a href="{{url('add_course')}}">Add New Course</a></button> -->
    </div>

    <table id="courseTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Faculty Name</th>
                <th>E-mail</th>
                <th>Contact</th>
                <th>Photo</th>
                <th>Qualifications</th>
                <th>Subject</th>
                <th>Experience</th>
                <th>Join Reason</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tableBody">
        @foreach($teacher as $tea)
            <tr>
                <th>{{$tea->id}}</th>
                <td>{{$tea->name}}</td>
                <td>{{$tea->email}}</td>
                <td>{{$tea->phone}}</td>
                <td>
                    <img src="{{'/passport_image/'.$tea->passport_image}}" width="50" height="50" style="border-radius: 50%; object-fit: cover;">
                </td>
                <td>{{$tea->qualification}}</td>
                <td>{{$tea->subject}}</td>
                <td>{{$tea->experience}}</td>
                <td>{{$tea->message}}</td>
                <td style="padding: 10px; text-align: center;">
        <div class="action-buttons">
            <!-- Delete Button -->
            <a href="{{url('delete_teacher_admin',$tea->id)}}" class="btn-action btn-delete">
                <i class="fa fa-trash"></i> 
            </a>

            <!-- Edit Button -->
            <a href="{{url('update_teacher_admin',$tea->id)}}" class="btn-action btn-edit">
                <i class="fa fa-edit"></i> 
            </a>

            <!-- Show Button -->
            <a href="{{url('teacher_print_admin',$tea->id)}}" class="btn-action btn-show">
                <i class="fa fa-eye"></i> 
            </a>
        </div>
    </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script>
   
    document.getElementById("courseTable").addEventListener("mouseover", function () {
        this.style.transform = "translateY(-5px)";
    });

    document.getElementById("courseTable").addEventListener("mouseleave", function () {
        this.style.transform = "translateY(0px)";
    });

   
    document.getElementById("searchInput").addEventListener("keyup", function () {
        var searchValue = this.value.toLowerCase();
        var tableRows = document.querySelectorAll("#tableBody tr");

        tableRows.forEach(function (row) {
            var courseName = row.getElementsByTagName("td")[0].textContent.toLowerCase();
            if (courseName.includes(searchValue)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
</script>

@endsection
