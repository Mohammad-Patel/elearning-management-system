@extends('admin')

@section('details')

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

    
    .btn-delete {
        background-color: #dc3545;
        border: none;
        padding: 8px 12px;
        color: white;
        border-radius: 3px;
        cursor: pointer;
    }

    .btn-delete a {
        color: white;
        text-decoration: none;
    }

    .btn-delete:hover {
        background-color: #a71d2a;
    }

    
    .btn-edit {
        background-color: #28a745;
        border: none;
        padding: 8px 12px;
        color: white;
        border-radius: 3px;
        cursor: pointer;
    }

    .btn-edit a {
        color: white;
        text-decoration: none;
    }

    .btn-edit:hover {
        background-color: #1e7e34;
    }
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
    <h2 style="text-align: center;">User Reviews Details</h2>

   
    <div class="top-section">
        <div class="search-container">
            <input type="text" id="searchInput" class="search-box" placeholder="Search Faculty...">
            <i class="search-icon">&#128269;</i> 
        </div>
    </div>

    <table id="courseTable">
        <thead>
            <tr>
                <th>#</th>
                <th>User-ID</th>
                <th>User name</th>
                <th>Phone No.</th>
                <th>User Type</th>
                <th>Rating</th>
                <th>User Review</th>
                <th>Review Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @foreach($review as $rev)
            <tr>
                <th>{{$rev->id}}</th>
                <td>{{$rev->user_id}}</td>
                <td>{{$rev->username}}</td>
                <td>{{$rev->phone}}</td>
                <td>{{$rev->usertype}}</td>
                <td>{{$rev->rating}}</td>
                <td>{{$rev->review}}</td>
                <td>{{$rev->date_display}}</td>
                <td>
                    <button class="btn-delete"><a href="{{url('delete_review',$rev->id)}}">Delete</a></button>
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
