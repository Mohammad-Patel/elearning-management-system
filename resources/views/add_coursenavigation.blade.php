@extends('admin')

@section('details')

<style>
  .pc-form-wrapper {
    max-width: 800px; 
    margin: 60px auto;
    padding: 40px;
    background-color: #ffffff;
    border-radius: 6px; 
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1); 
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .pc-form-title {
    text-align: center;
    margin-bottom: 40px; 
    font-size: 32px; 
    color: #2c3e50;
    font-weight: 600;
  }

  .pc-form {
    display: flex;
    flex-direction: column;
    gap: 25px; 
  }

  .pc-form-group {
    display: flex;
    flex-direction: column;
  }

  .pc-form-group label {
    margin-bottom: 8px; 
    font-weight: 600;
    color: #34495e;
    font-size: 18px; 
  }

  .pc-form-group input[type="text"],
  .pc-form-group input[type="number"],
  .pc-form-group input[type="file"],
  .pc-form-group textarea {
    padding: 16px 20px;
    font-size: 18px; 
    border: 1px solid #ccc;
    border-radius: 6px; 
    transition: 0.3s ease;
    background-color: #f9f9f9; 
  }

  .pc-form-group textarea {
    resize: vertical;
    min-height: 100px; 
  }

  .pc-form-group input:focus,
  .pc-form-group textarea:focus {
    border-color: #4CAF50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
    outline: none;
  }

  .pc-form-actions {
    display: flex;
    justify-content: space-between;
    gap: 20px; 
    margin-top: 20px;
  }

  .pc-btn {
    padding: 16px 22px; 
    border: none;
    border-radius: 4px; 
    font-size: 18px;
    cursor: pointer;
    background-color:rgb(15, 44, 186);
    color: white;
    transition: background 0.3s ease;
    width: auto; 
  }

  .pc-btn:hover {
    background-color: #45a049;
  }

  .pc-reset-btn {
    background-color: #95a5a6;
  }

  .pc-reset-btn:hover {
    background-color: #7f8c8d;
  }

  @media (max-width: 600px) {
    .pc-form-actions {
      flex-direction: column; 
    }

    .pc-btn {
      width: 100%; 
    }
  }
</style>

<div class="pc-form-wrapper">
  <h2 class="pc-form-title">Add New Popular Course</h2>
  <form action="{{ url('save_coursenavigation') }}" method="POST" enctype="multipart/form-data" class="pc-form">
    @csrf

    <div class="pc-form-group">
      <label for="title">Course Title</label>
      <textarea name="title" id="title" required></textarea>
    </div>

    <div class="pc-form-group">
      <label for="instructor">Instructor</label>
      <input type="text" name="instructor" id="instructor" required>
    </div>

    <div class="pc-form-group">
      <label for="duration">Duration</label>
      <input type="text" name="duration" id="duration" required>
    </div>

    <div class="pc-form-group">
      <label for="students">Number of Students</label>
      <input type="number" name="students" id="students" required>
    </div>

    <div class="pc-form-group">
      <label for="image">Course Image</label>
      <input type="file" name="courseImage" id="courseImage" accept="courseImage/*" required>
    </div>

    <div class="pc-form-actions">
      <button type="submit" class="pc-btn">Save Course</button>
      <button type="reset" class="pc-btn pc-reset-btn">Reset</button>
    </div>
  </form>
</div>

@endsection
