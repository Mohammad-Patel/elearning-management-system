@extends('admin')

@section('details')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    /* -- Your Original CSS (unchanged) -- */

    .table-scroll-wrapper {
        overflow-x: auto;
        overflow-y: auto;
        max-height: 500px; /* adjust height as needed */
        border: 1px solid #ccc;
        border-radius: 5px;
    }

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
    .btn-print:hover {
        background-color: #218838;
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
    .btn-print { background-color: #28a745; margin-left: 10px; }
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
    <h2 style="text-align: center;">Student Details</h2>

    <div class="top-section">
        <div class="search-container">
            <input type="text" id="searchInput" class="search-box" placeholder="Search Faculty...">
            <i class="search-icon">&#128269;</i> 
        </div>
        <button class="btn-action btn-print" onclick="printReceipt()" style="display: flex; align-items: center; gap: 6px; padding: 10px 15px; font-size: 15px;">
            <i class="fa fa-print"></i> Print
        </button>
    </div>
<div class="table-scroll-wrapper">
    <table id="courseTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Enrollment No.</th>
                <th>Name</th>
                <th>Birth Date</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>E-mail</th>
                <th>School Name</th>
                <th>Board</th>
                <th>Passing Year</th>
                <th>CGPA/Per</th>
                <th>Course Applied</th>
                <th>Department</th>
                <th>Duration</th>
                <th>Category</th>
                <th>Passport Photo</th>
                <th>Marksheet Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @foreach($stu as $st)
            <tr>
                <th>{{$st->id}}</th>
                <th>{{$st->enrollment_number}}</th>
                <td>{{$st->name}}</td>
                <td>{{$st->birth_date}}</td>
                <td>{{$st->gender}}</td>
                <td>{{$st->contact}}</td>
                <td>{{$st->email}}</td>
                <td>{{$st->school_name}}</td>
                <td>{{$st->board}}</td>
                <td>{{$st->passing_year}}</td>
                <td>{{$st->cgpa}}</td>
                <td>{{$st->course_applied}}</td>
                <td>{{$st->department}}</td>
                <td>{{$st->duration}}</td>
                <td>{{$st->admission_cate}}</td>
                <td>
                    <img src="{{'/passport_image/'.$st->passport_image}}" width="50" height="50" style="border-radius: 50%; object-fit: cover;">
                </td>
                <td>
                    <img src="{{'/marksheet_image/'.$st->marksheet_image}}" width="50" height="50" style="border-radius: 50%; object-fit: cover;">
                </td>
                <td>
                    <div class="action-buttons">
                        <a href="{{url('delete_student_admin',$st->id)}}" class="btn-action btn-delete"><i class="fa fa-trash"></i></a>
                        <a href="{{url('update_student_admin',$st->id)}}" class="btn-action btn-edit"><i class="fa fa-edit"></i></a>
                        <a href="{{ url('student_print_admin/'.$st->id) }}" class="btn-action btn-show"><i class="fa fa-eye"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

<script>
function getBase64Image(img) {
    const canvas = document.createElement("canvas");
    canvas.width = img.naturalWidth;
    canvas.height = img.naturalHeight;
    const ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0);
    return canvas.toDataURL("image/png");
}

function printReceipt() {
    let rows = document.querySelectorAll("#tableBody tr");
    let receiptContent = "<html><head><title>Print Students Details</title><style>";
    
    receiptContent += `
        body { font-family: Arial, sans-serif; text-align: center; margin: 20px; }
        .receipt-container { width: 90%; margin: auto; padding: 15px; border: 1px solid #000; box-sizing: border-box; }
        .receipt-header { text-align: center; font-size: 20px; font-weight: bold; margin-bottom: 15px; text-transform: uppercase; }
        .receipt-table { width: 100%; border-collapse: collapse; font-size: 14px; margin: auto; }
        .receipt-table td { padding: 8px; border: 1px solid #000; text-align: left; }
        .receipt-footer { text-align: center; font-weight: bold; margin-top: 10px; }
        .receipt-authr { margin-top: 10px; text-align: right; font-weight: bold; }
        .profile-img { width: 80px; height: 80px; border-radius:0; object-fit: cover; display: block; margin: 10px auto; }
        .divider { text-align: center; margin: 15px 0; font-size: 14px; }
        @media print { .receipt-container { page-break-after: always; } }
    `;
    receiptContent += "</style></head><body>";

    rows.forEach(row => {
        let profileImgEl = row.children[15].querySelector("img");
        let marksheetImgEl = row.children[16]?.querySelector("img");

        let profileImgSrc = profileImgEl ? getBase64Image(profileImgEl) : "";
        let marksheetImgSrc = marksheetImgEl ? getBase64Image(marksheetImgEl) : "";

        receiptContent += `
            <div class="receipt-container">
                <table class="receipt-table">
                    <tr><td><b>Profile Photo:</b></td><td><img src="${profileImgSrc}" class="profile-img" alt="Profile Image"></td></tr>
                    <tr><td><b>Enrollment No.:</b></td><td>${row.children[1].innerText}</td></tr>
                    <tr><td><b>Name:</b></td><td>${row.children[2].innerText}</td></tr>
                    <tr><td><b>Birth Date:</b></td><td>${row.children[3].innerText}</td></tr>
                    <tr><td><b>Gender:</b></td><td>${row.children[4].innerText}</td></tr>
                    <tr><td><b>Contact:</b></td><td>${row.children[5].innerText}</td></tr>
                    <tr><td><b>Email:</b></td><td>${row.children[6].innerText}</td></tr>
                    <tr><td><b>School Name:</b></td><td>${row.children[7].innerText}</td></tr>
                    <tr><td><b>Board:</b></td><td>${row.children[8].innerText}</td></tr>
                    ${marksheetImgSrc ? `<tr><td><b>Marksheet:</b></td><td><img src="${marksheetImgSrc}" class="profile-img" alt="Marksheet Image"></td></tr>` : ""}
                    <tr><td><b>Passing Year:</b></td><td>${row.children[9].innerText}</td></tr>
                    <tr><td><b>CGPA/Per:</b></td><td>${row.children[10].innerText}</td></tr>
                    <tr><td><b>Corse Applied:</b></td><td>${row.children[11].innerText}</td></tr>
                    <tr><td><b>Department:</b></td><td>${row.children[12].innerText}</td></tr>
                    <tr><td><b>Duration:</b></td><td>${row.children[13].innerText}</td></tr>
                    <tr><td><b>Category:</b></td><td>${row.children[14].innerText}</td></tr>
                </table>
                <div class="receipt-authr">Authorized Sign: ____________________</div>
                <div class="receipt-footer">Thank You!</div>
            </div>
            <p class="divider">----------------------------------------------------- ✂ --------------------------------------------------</p>
        `;
    });

    receiptContent += "</body></html>";

    let newWin = window.open("", "", "width=900,height=700");
    newWin.document.write(receiptContent);
    newWin.document.close();

    newWin.onload = function () {
        const images = newWin.document.images;
        let loaded = 0;

        if (images.length === 0) {
            newWin.focus();
            newWin.print();
            return;
        }

        for (let img of images) {
            img.onload = img.onerror = () => {
                loaded++;
                if (loaded === images.length) {
                    newWin.focus();
                    newWin.print();
                }
            };
        }

        // Fallback timer just in case
        setTimeout(() => {
            newWin.focus();
            newWin.print();
        }, 4000);
    };
}
</script>

<script>
    // 🔍 SEARCH ONLY BY NAME
    document.getElementById("searchInput").addEventListener("input", function () {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll("#tableBody tr");

        rows.forEach(row => {
            const nameCell = row.children[2]; // 0-based index, so 2 = "Name"
            const nameText = nameCell.textContent.toLowerCase();

            row.style.display = nameText.includes(filter) ? "" : "none";
        });
    });
</script>

@endsection
