<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Job Application</title>

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.21/dist/sweetalert2.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.21/dist/sweetalert2.min.js"></script>


</head>
<body>

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
            color: #2d6a4f; /* Custom green color */
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

@include('navbar')
<div style="font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh;">
    <form action="{{url('save_teacher')}}" method="POST" enctype="multipart/form-data" style="background: white; padding: 50px; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2); width: 1200px; max-width: 1200px; display: flex; flex-direction: column;">
       @csrf
        <div style="display: flex;">
            <div style="width: 50%; padding: 25px;">
                <div style="padding-top: 5px;">
                    <h2 style="text-align: center; width: 100%; margin-top: -15px; font-family: 'Arial', sans-serif; font-weight: bold;">Teacher Application Details</h2>
                </div>

                <div style="margin-bottom: 25px; margin-top:50px;">
                    <label for="name" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Full Name:</label>
                    <input type="text" id="name" name="name" required placeholder="Enter your full name" style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;">
                </div>

                <div style="margin-bottom: 25px;">
                    <label for="email" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Email:</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email" style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;">
                </div>

                <div style="margin-bottom: 25px;">
                    <label for="phone" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number" style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;">
                </div>

                <div style="margin-bottom: 25px;">
                    <label for="image" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Upload Your Image:</label>
                    <input type="file" id="image" name="passport_image" accept="image/*" required style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;">
                </div>
            </div>

            <div style="width: 4px; background-color: #444; margin: 0 25px;"></div>

            <div style="width: 50%; padding: 25px;">
                <div style="padding-top: 5px;">
                    <h2 style="text-align: center; width: 100%; margin-top: -15px; font-family: 'Arial', sans-serif; font-weight: bold;">Qualifications Details</h2>
                </div>

                <div style="margin-bottom: 25px; margin-top:50px;">
                    <label for="qualification" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Qualifications:</label>
                    <input type="text" id="qualification" name="qualification" required placeholder="Enter your qualifications" style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;">
                </div>

                <div style="margin-bottom: 25px;">
                    <label for="subject" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Subject Specialization</label>
                    <select id="subject" name="subject" required style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;">
                        <option value="">Select your subject specialization</option>
                        <option value="sql">SQL</option>
                        <option value="java">Java</option>
                        <option value="python">Python</option>
                        <option value="web-designer">Web-Designer</option>
                        <option value="Web-Devloper">Web-Devloper</option>
                        <option value="Graphic Designer">Graphic Designer</option>
                        <option value="Video Editing">Video Editing</option>
                    </select>
                </div>

                <div style="margin-bottom: 25px;">
                    <label for="experience" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Teaching Experience (Years)</label>
                    <input type="number" id="experience" name="experience" required placeholder="Enter your years of experience" style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;">
                </div>

                <div style="margin-bottom: 25px;">
                    <label for="message" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Why do you want to join?</label>
                    <textarea id="message" name="message" rows="2" required placeholder="Write a short message about why you want to join" style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;"></textarea>
                </div>
            </div>
        </div>

        <div style="margin-top: 25px;">
            <button type="submit" style="width: 100%; padding: 18px; background:rgb(84, 162, 199); color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;">Apply Now</button>
        </div>
    </form>
</div>

@include('footer')
</body>
</html>
