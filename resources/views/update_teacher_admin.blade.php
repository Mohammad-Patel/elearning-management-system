@extends('admin')

@section('details')

<!-- Show Teacher ID as heading -->
 <br><br>
 <br><br>
 <div style="text-align: center; margin-bottom: 5px;">
    <div style="display: inline-block; background-color: #fff; padding: 10px 20px; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
        <h2 style="font-size: 26px; color: #555; margin: 0;">
            Editing Teacher ID: 
            <span style="color: #1e90ff; font-weight: bold;">{{$teacher->id}}</span>
        </h2>
    </div>
</div>
<br><br>

<!-- Main Form Section -->
<div style="font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: flex-start; padding-top: 10px; min-height: 100vh;"> {{-- changed align-items & added padding-top --}}
    <form action="{{url('edit_teacher_admin')}}" method="POST" enctype="multipart/form-data" style="background: white; padding: 50px; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2); width: 1200px; max-width: 1200px; display: flex; flex-direction: column;">
       @csrf

        <div style="display: flex;">
            <div style="width: 50%; padding: 25px;">
                <div style="padding-top: 5px;">
                    <h2 style="text-align: center; width: 100%; margin-top: -15px; font-family: 'Arial', sans-serif; font-weight: bold;">Teacher Application Details</h2>
                </div>

                <input type="hidden" name="id" value="{{$teacher->id}}">

                <div style="margin-bottom: 25px; margin-top:50px;">
                    <label for="name" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Full Name:</label>
                    <input type="text" id="name" name="name" value="{{$teacher->name}}" required placeholder="Enter your full name" style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;">
                </div>

                <div style="margin-bottom: 25px;">
                    <label for="email" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Email:</label>
                    <input type="email" id="email" name="email" value="{{$teacher->email}}" required placeholder="Enter your email" style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;">
                </div>

                <div style="margin-bottom: 25px;">
                    <label for="phone" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" value="{{$teacher->phone}}" required placeholder="Enter your phone number" style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;">
                </div>

                <!-- <div style="margin-bottom: 15px;">
                    <p style="font-size: 16px; color: #555;">Current Image:</p>
                    <img src="{{ asset('uploads/passport_images/'.$teacher->passport_image) }}" alt="Passport Image" style="max-height: 100px; border: 1px solid #ccc; border-radius: 5px;">
                </div> -->

                <div style="margin-bottom: 25px;">
                    <label for="image" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Upload Your Image:</label>
                    <input type="file" id="image" name="passport_image"  accept="image/*" style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;">
                </div>
            </div>

            <div style="width: 4px; background-color: #444; margin: 0 25px;"></div>

            <div style="width: 50%; padding: 25px;">
                <div style="padding-top: 5px;">
                    <h2 style="text-align: center; width: 100%; margin-top: -15px; font-family: 'Arial', sans-serif; font-weight: bold;">Qualifications Details</h2>
                </div>

                <div style="margin-bottom: 25px; margin-top:50px;">
                    <label for="qualification" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Qualifications:</label>
                    <input type="text" id="qualification" name="qualification" value="{{$teacher->qualification}}" required placeholder="Enter your qualifications" style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;">
                </div>

                <div style="margin-bottom: 25px;">
                    <label for="subject" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Subject Specialization</label>
                    <select id="subject" name="subject" required style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;">
                            <option value="">Select your subject specialization</option>
                            <option value="SQL" {{ $teacher->subject == 'SQL' ? 'selected' : '' }}>SQL</option>
                            <option value="Java" {{ $teacher->subject == 'Java' ? 'selected' : '' }}>Java</option>
                            <option value="Python" {{ $teacher->subject == 'Python' ? 'selected' : '' }}>Python</option>
                            <option value="Web-Designer" {{ $teacher->subject == 'Web-Designer' ? 'selected' : '' }}>Web-Designer</option>
                            <option value="Web-Devloper" {{ $teacher->subject == 'Web-Devloper' ? 'selected' : '' }}>Web-Devloper</option>
                            <option value="Graphic Designer" {{ $teacher->subject == 'Graphic Designer' ? 'selected' : '' }}>Graphic Designer</option>
                            <option value="Video Editing" {{ $teacher->subject == 'Video Editing' ? 'selected' : '' }}>Video Editing</option>
                    </select>
                </div>

                <div style="margin-bottom: 25px;">
                    <label for="experience" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Teaching Experience (Years)</label>
                    <input type="number" id="experience" name="experience" min="0" value="{{$teacher->experience}}" required placeholder="Enter your years of experience" style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;">
                </div>

                <div style="margin-bottom: 25px;">
                    <label for="message" style="display: block; margin-bottom: 5px; font-size: 20px; font-weight: bold; color: #333;">Why do you want to join?</label>
                    <textarea id="message" name="message" rows="2" required placeholder="Write a short message about why you want to join" style="width: 100%; padding: 14px; border: 1px solid #444; border-radius: 3px; font-size: 18px; background-color: #f9f9f9; color: #222;">{{ $teacher->message }}</textarea>
                </div>
            </div>
        </div>

        <div style="margin-top: 25px;">
            <button type="submit" style="width: 100%; padding: 18px; background:rgb(84, 162, 199); color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 20px;">Apply Now</button>
        </div>
    </form>
</div>

@endsection
