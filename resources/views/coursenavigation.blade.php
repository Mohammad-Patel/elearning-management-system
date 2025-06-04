@extends('admin')

@section('details')

<style>
  .popular-course-wrapper {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f7fa;
    font-size: 18px;
    max-width: 1500px;
    margin: 30px auto;
    padding: 30px;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  }

  .pc-btn, .pc-delete-btn {
    padding: 14px 22px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s ease;
  }

  .pc-btn {
    background-color:rgb(39, 129, 158);
    color: white;
    margin-bottom: 20px;
  }

  .pc-btn:hover {
    background-color: #45a049;
  }

  .pc-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
  }

  .pc-table th, .pc-table td {
    padding: 16px 20px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  .pc-table th {
    background-color: #f2f2f2;
    color: #333;
    font-size: 18px;
  }

  .pc-table tr:hover {
    background-color: #f9f9f9;
  }

  .pc-img {
    border-radius: 50%;
    object-fit: cover;
    width: 70px;
    height: 70px;
  }

  .pc-delete-btn {
    background-color: #e74c3c;
    color: white;
  }

  .pc-delete-btn:hover {
    background-color: #c0392b;
  }

  @media (max-width: 600px) {
    .pc-table, .pc-table thead, .pc-table tbody, .pc-table th, .pc-table td, .pc-table tr {
      display: block;
    }

    .pc-table th {
      display: none;
    }

    .pc-table td {
      position: relative;
      padding-left: 55%;
      margin-bottom: 16px;
      font-size: 16px;
    }

    .pc-table td::before {
      content: attr(data-label);
      position: absolute;
      left: 16px;
      font-weight: bold;
    }
  }
</style>

<script>
  function confirmRedirect(url) {
    if (confirm("Are you sure you want to add a new course?")) {
      window.location.href = url;
    }
  }

  function confirmDelete(courseId) {
    if (confirm("Are you sure you want to delete this course?")) {
      window.location.href = `/delete-course/${courseId}`;
    }
  }
</script>
<br><br><br><br>
<br><br>
<div class="popular-course-wrapper">
  <button class="pc-btn" onclick="confirmRedirect('{{ url('add_coursenavigation') }}')">ADD NEW NAVIGATION</button>

  <table class="pc-table">
    <thead>
      <tr>
        <th>Course ID</th>
        <th>Title</th>
        <th>Course Image</th>
        <th>Course Instructor</th>
        <th>Course Duration</th>
        <th>Students</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($popcourse as $course)
      <tr>
        <td data-label="Course ID">{{ $course->id }}</td>
        <td data-label="Title">{{ $course->title }}</td>
        <td data-label="Course Image">
          <img src="{{ asset('/image/' . $course->image) }}" class="pc-img" alt="Course Image">
        </td>
        <td data-label="Instructor">{{ $course->instructor }}</td>
        <td data-label="Duration">{{ $course->duration }}</td>
        <td data-label="Students">{{ $course->students }}</td>
        <td data-label="Actions">
          <a href="{{url('delete_navigation',$course->id )}}"><button class="pc-delete-btn">Delete</button></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
