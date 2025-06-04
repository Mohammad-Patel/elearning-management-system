<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Reviews</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 40px 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        .review-card {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 6px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .review-card strong {
            font-size: 18px;
            color: #333;
        }

        .review-card small {
            display: block;
            color: #888;
            margin-bottom: 10px;
        }

        .stars {
            color: gold;
            margin: 5px 0;
        }

        .form-section {
            display: none; /* Initially hidden */
            background: #ffffff;
            padding: 30px;
            margin-top: 30px;
            border-radius: 6px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
        }

        .submit-btn, .show-form-btn {
            margin-top: 20px;
            background: #007bff;
            color: #fff;
            padding: 12px;
            border: none;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn:hover,
        .show-form-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
@include('navbar2')

<div class="container">
    <h2>What People Are Saying</h2>

    {{-- All Reviews --}}
    @foreach($reviews as $review)
        <div class="review-card">
            <strong>{{ $review->username }}</strong> ({{ ucfirst($review->usertype) }})
            <small>{{ $review->date_display }}</small>

            <div class="stars">
                @for ($i = 0; $i < $review->rating; $i++)
                    ⭐
                @endfor
                @for ($i = $review->rating; $i < 5; $i++)
                    ☆
                @endfor
            </div>

            <p>{{ $review->review }}</p>
        </div>
    @endforeach

    {{-- Show Form Button --}}
    <button class="show-form-btn" onclick="document.querySelector('.form-section').style.display='block'; this.style.display='none';">
        Leave a Review
    </button>

    {{-- Add Review Form (Initially Hidden) --}}
    <div class="form-section">
        <form action="{{ route('save_review') }}" method="POST">
            @csrf

            <label>Your Email</label>
            <input type="email" name="user_id" placeholder="Email" required>

            <label>Your Phone No</label>
            <input type="text" name="phone" required>

            <label>Your Name</label>
            <input type="text" name="username" placeholder="Name" required>

            <label>User Type</label>
            <select name="usertype" required>
                <option value="">-- Select --</option>
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
            </select>

            <label>Rating</label>
            <select name="rating" required>
                <option value="">-- Rate Us --</option>
                <option value="5">5 - Excellent</option>
                <option value="4">4 - Good</option>
                <option value="3">3 - Average</option>
                <option value="2">2 - Poor</option>
                <option value="1">1 - Bad</option>
            </select>

            <label>Your Review</label>
            <textarea name="review" placeholder="Your feedback..." required></textarea>

            <input type="hidden" name="date_display" value="{{ date('Y-m-d') }}">

            <button class="submit-btn" type="submit">Submit Review</button>
        </form>
    </div>
</div>

@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif

@include('footer')
</body>
</html>