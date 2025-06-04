@extends('admin')

@section('details')

<h2 class="admin-heading">Edit Admin Details</h2>

<style>
  .admin-heading {
    text-align: center;
    font-size: 32px;
    font-weight: bold;
    background: linear-gradient(90deg, #4CAF50, #2196F3);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 2px 2px 8px rgba(0,0,0,0.2);
    margin-top: 30px;
    margin-bottom: 40px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .admin-form {
    width: 70%;
    margin: 0 auto;
    background: #fff;
    padding: 30px;
    border-radius: 4px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px 40px;
  }

  .admin-form label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #333;
  }

  .admin-form input[type="text"],
  .admin-form input[type="email"],
  .admin-form input[type="tel"],
  .admin-form input[type="password"],
  .admin-form input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: border-color 0.3s ease;
  }

  .admin-form input:focus {
    border-color: #4CAF50;
    outline: none;
  }

  .admin-form img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    border: 2px solid #4CAF50;
    margin-bottom: 20px;
  }

  .admin-form button {
    grid-column: 1 / -1;
    width: 100%;
    background-color: rgb(15, 41, 97);
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease;
  }

  .admin-form button:hover {
    background-color: #45a049;
  }

  .flex-row {
    display: flex;
    gap: 20px;
    align-items: flex-end;
  }

  .flex-row > div {
    flex: 1;
  }
</style>

<form class="admin-form" enctype="multipart/form-data" action="{{ url('edit_admin') }}" method="POST">
  @csrf

  <input type="hidden" name="id" value="{{ $admin->id }}">

  <div>
    <label>Full Name:</label>
    <input type="text" name="fullname" value="{{ $admin->fullname }}" placeholder="Enter full name">

    <label>Email:</label>
    <input type="email" name="email" value="{{ $admin->email }}" placeholder="Enter email">

    <label>Phone No.:</label>
    <input type="tel" name="phone" value="{{ $admin->phone }}" placeholder="Enter phone number">
  </div>

  <div>
  <label>Password:</label>
  <input type="password" name="password" value="{{ $admin->password }}" placeholder="Enter new password">

  <div style="text-align: center; margin-top: 30px;">
    <label>Current Profile Image:</label><br>
    <img src="{{ '/profile/' . $admin->profile }}" alt="Current Profile">
  </div>
</div>



  <div class="flex-row" style="grid-column: 1 / -1;">
    <div>
      <label>Username:</label>
      <input type="text" name="username" value="{{ $admin->username }}" placeholder="Enter username">
    </div>
    <div>
      <label>Change Profile Image:</label>
      <input type="file" name="profile">
    </div>
  </div>

  <button type="submit">Update</button>
</form>

@endsection
