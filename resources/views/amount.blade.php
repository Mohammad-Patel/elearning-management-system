@extends('admin')

@section('details')

<style>
    #courseSection { width: 90%; margin: auto; margin-top: 40px; }
    .top-section { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
    .search-container { position: relative; width: 250px; }
    .search-box { width: 100%; padding: 10px 35px 10px 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; outline: none; }
    .search-icon { position: absolute; right: 10px; top: 50%; transform: translateY(-50%); color: gray; font-size: 18px; }
    .btn { border: none; padding: 8px 12px; color: white; border-radius: 5px; cursor: pointer; font-size: 16px; display: flex; align-items: center; gap: 5px; }
    .btn-print { background-color: #28a745; margin-left: 10px; }
    .btn-edit { background-color: #ffc107; color: white; }
    .btn-delete { background-color: #dc3545; color: white; }
    .btn-show { background-color: #17a2b8; color: white; }
    .btn i { font-size: 16px; }
    #courseTable { width: 100%; border-collapse: collapse; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
    #courseTable th, #courseTable td { padding: 15px; border: 1px solid #ddd; text-align: center; font-size: 16px; }
    .btn-container { display: flex; justify-content: center; gap: 8px; }
    
    /* Receipt Styling */
    .receipt-container { width: 400px; margin: auto; padding: 20px; border: 1px solid #000; font-family: Arial, sans-serif; display: none; }
    .receipt-header { text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 20px; }
    .receipt-table { width: 100%; border-collapse: collapse; }
    .receipt-table td { padding: 8px; border: 1px solid #000; font-size: 16px; }
    .receipt-footer { text-align: center; margin-top: 20px; font-weight: bold; }
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
    <h2 style="text-align: center;">Payment Details</h2>

    <div class="top-section">
        <div class="search-container">
            <input type="text" id="searchInput" class="search-box" placeholder="Search Payment...">
            <i class="search-icon">&#128269;</i> 
        </div>
        <button class="btn btn-print" onclick="printReceipt()"><i class="fa fa-print"></i> Print</button>
    </div>

    <table id="courseTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Enrollment No.</th>
                <th>Student Name</th>
                <th>Course Name</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Payment Type</th>
                <th>Paying Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tableBody">
        @foreach($stu as $st)
    <tr>
        <th>{{$st->id}}</th>
        <th>{{$st->enrollment_number}}</th>
        <th>{{$st->name}}</th>
        <th>{{$st->department}}</th>
        <th>{{$st->admission_cate}}</th>
        <th>{{$st->payment}}</th>
        <th>{{$st->payment_type}}</th>
        <th>{{$st->payment_date}}</th>
        <td class="btn-container">
            <a href="{{url('delete_student',$st->id)}}"><button class="btn btn-delete"><i class="fa fa-trash"></i></button></a>
            <a href="{{url('update_amount',$st->id)}}"><button class="btn btn-edit"><i class="fa fa-edit"></i></button></a>
            <a href="{{ url('amount_details/'.$st->id) }}"><button class="btn btn-show"><i class="fa fa-eye"></i></button></a>
        </td>
    </tr>
@endforeach

<!-- Total Amount row inside the table -->
<tr>
    <td colspan="9" style="text-align: center; background-color: #e9ecef;">
        <div style="display: inline-block; padding: 10px 20px; border-radius: 8px; background-color: #e9ecef; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <strong style="font-size: 18px; color: #333;">Total Amount Collected:</strong>
            <span style="font-size: 20px; color: green;">₹{{ $totalAmount }}</span>
        </div>
    </td>
</tr>

        </tbody>
    </table>
</div>


<div id="receipt" class="receipt-container">
    <div class="receipt-header">Payment Receipt</div>
    <table class="receipt-table" style="width: 100%; border-collapse: collapse; border: 1px solid #000;">
        <tr>
            <td style="padding: 8px; border: 1px solid #000; font-weight: bold;">Enrollment No.:</td>
            <td id="receipt-enrollment" style="padding: 8px; border: 1px solid #000;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #000; font-weight: bold;">Student Name:</td>
            <td id="receipt-student-name" style="padding: 8px; border: 1px solid #000;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #000; font-weight: bold;">Course Name:</td>
            <td id="receipt-course" style="padding: 8px; border: 1px solid #000;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #000; font-weight: bold;">Category:</td>
            <td id="receipt-category" style="padding: 8px; border: 1px solid #000;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #000; font-weight: bold;">Amount Paid:</td>
            <td id="receipt-amount" style="padding: 8px; border: 1px solid #000;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #000; font-weight: bold;">Payment Type:</td>
            <td id="receipt-method" style="padding: 8px; border: 1px solid #000;"></td>
        </tr>
        <tr>
            <td style="padding: 8px; border: 1px solid #000; font-weight: bold;">Paying Date:</td>
            <td id="receipt-date" style="padding: 8px; border: 1px solid #000;"></td>
        </tr>
    </table>

    <div class="receipt-authr">Authorized Sign:____________________</div>
    <div class="receipt-footer" style="text-align: center; font-weight: bold; margin-top: 20px;">Thank You!</div>
</div>

<script>
   document.getElementById("searchInput").addEventListener("keyup", function () {
    let searchValue = this.value.toLowerCase();
    document.querySelectorAll("#tableBody tr").forEach(row => {
        let courseName = row.getElementsByTagName("th")[3].textContent.toLowerCase();
        row.style.display = courseName.includes(searchValue) ? "" : "none";
    });
});


function printReceipt() {
    let rows = document.querySelectorAll("#tableBody tr");
    let receiptContent = "<html><head><title>Print Receipts</title><style>";
    
    // Updated Styles
    receiptContent += `
        body { font-family: Arial, sans-serif; text-align: center; }
        .receipt-container { width: 100%; margin-bottom: 20px; padding: 15px; border: 1px solid #000; display: inline-block; box-sizing: border-box; }
        .receipt-header { text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 10px; }
        .receipt-table { width: 100%; border-collapse: collapse; font-size: 14px; margin: auto; }
        .receipt-table td { padding: 6px; border: 1px solid #000; }
        .receipt-footer { text-align: center; font-weight: bold; margin-top: 10px; }
        .receipt-authr { margin-top: 10px; }
        @media print { .receipt-container { page-break-after: always; } }
    `;
    receiptContent += "</style></head><body>";

    // Generate receipts for each row
    rows.forEach(row => {
    // Skip if row is the total amount row (based on a known column's text or class)
    if (row.children[0].colSpan === 9) return; // this means it's the total row

    receiptContent += `
        <div class="receipt-container">
            <div class="receipt-header">Payment Receipt</div>
            <table class="receipt-table">
                <tr><td><b>Enrollment No.:</b></td><td>${row.children[1].innerText}</td></tr>
                <tr><td><b>Student Name:</b></td><td>${row.children[2].innerText}</td></tr>
                <tr><td><b>Course Name:</b></td><td>${row.children[3].innerText}</td></tr>
                <tr><td><b>Category:</b></td><td>${row.children[4].innerText}</td></tr>
                <tr><td><b>Amount Paid:</b></td><td>${row.children[5].innerText}</td></tr>
                <tr><td><b>Payment Type:</b></td><td>${row.children[6].innerText}</td></tr>
                <tr><td><b>Paying Date:</b></td><td>${row.children[7].innerText}</td></tr>
            </table>
            <div class="receipt-authr">Authorized Sign:____________________</div>
            <div class="receipt-footer">Thank You!</div>
        </div>
      <p class="divider">----------------------------------------------------- ✂ --------------------------------------------------</p>
    `;
});


    receiptContent += "</body></html>";

    // Open new window and print
    let newWin = window.open("", "", "width=900,height=700");
    newWin.document.write(receiptContent);
    newWin.document.close();
    newWin.print();
}

</script>

<script>
    document.getElementById("searchInput").addEventListener("input", function () {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll("#tableBody tr");

        rows.forEach(row => {
            // Skip total row (colSpan check)
            if (row.children[0].colSpan === 9) return;

            const studentName = row.children[2].textContent.toLowerCase();
            const courseName = row.children[3].textContent.toLowerCase();

            const matches = studentName.includes(filter) || courseName.includes(filter);

            row.style.display = matches ? "" : "none";
        });
    });
</script>



@endsection
