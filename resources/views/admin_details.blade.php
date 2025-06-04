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

    
    /* Table Styling */
    table {
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

<br><br><br>
<br><br><br>
<h2 style="text-align: center; font-size: 36px; font-weight: bold; background: linear-gradient(90deg, #4CAF50, #2196F3); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: 2px 2px 8px rgba(0,0,0,0.2); margin-top: 30px; margin-bottom: 40px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; letter-spacing: 1px;">
  Admin Details
</h2>

<!-- Table displaying the admin details -->
<table>
  <tr>
    <th>Profile</th>
    <th>Full Name</th>
    <th>Email</th>
    <th>Phone No.</th>
    <th>Username</th>
    <th>Password</th>
    <th>Action</th>
  </tr>
  @foreach($admin as $ad)
  <tr>
    <td><img src="{{'/profile/'.$ad->profile}}" width="50" height="50" style="border-radius: 50%; object-fit: cover;"></td>
    <td>{{$ad->fullname}}</td>
    <td>{{$ad->email}}</td>
    <td>{{$ad->phone}}</td>
    <td>{{$ad->username}}</td>
    <td>{{$ad->password}}</td>
    <td class="action-buttons">
      <a href="{{url('update_admin',$ad->id)}}" class="edit-btn" style="text-decoration: none; display: inline-block; padding: 6px 12px; border-radius: 5px; background-color: #2196F3; color: white;">Edit</a>
    </td>
  </tr>
  @endforeach
</table>

@endsection
