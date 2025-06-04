<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Admission Form</title>

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

        /* Custom Button Styling */
        .swal-button-custom {
            font-size: 1.2rem;
            padding: 12px 25px;
            background-color: #28a745; 
            color: white;
            border: none;
            border-radius: 5px;
        }

        /* Button hover effect */
        .swal-button-custom:hover {
            background-color: #218838; 
        }
    </style>
@endif


@include('navbar')
<div style="font-family: Arial, sans-serif; background-color: #e3f2fd; display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="width: 650px; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); box-sizing: border-box;">
        <div style="position: relative; margin-bottom: 20px;">
            <div style="position: absolute; top: 50%; left: 0; width: 100%; height: 5px; background-color: grey;">
                <div id="progressBar" style="width: 0%; height: 5px; background-color: #007BFF; transition: width 0.4s;"></div>
            </div>
            <div style="display: flex; justify-content: space-between; position: relative; z-index: 1;">
                <div class="step-circle" style="width: 35px; height: 35px; background-color: grey; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: white;">1</div>
                <div class="step-circle" style="width: 35px; height: 35px; background-color: grey; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: white;">2</div>
                <div class="step-circle" style="width: 35px; height: 35px; background-color: grey; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: white;">3</div>
                <div class="step-circle" style="width: 35px; height: 35px; background-color: grey; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: white;">4</div>
                <div class="step-circle" style="width: 35px; height: 35px; background-color: grey; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: white;">5</div>
            </div>
        </div>

        <form id="multiStepForm" action="{{ url('save_student') }}" method="POST" enctype="multipart/form-data">
         @csrf
            <div class="step" id="step1" style="display: block;">
                <h3>Step 1: Personal Details</h3>
                <label>Full Name:</label>
                <input type="text"  name="name" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                <label>Date of Birth:</label>
                <input type="date" name="birth_date" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                <label>Gender:</label>
                <select name="gender" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                    <option value="">Select</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
                <label>Contact Number:</label>
                <input type="text" name="contact" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                <label>Email ID:</label>
                <input type="email" name="email" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                <button type="button" onclick="nextStep(1)" style="background-color: #007BFF; color: white; border: none; padding: 12px 20px; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; transition: background 0.3s ease;">Next</button>
            </div>

            <div class="step" id="step2" style="display: none;">
                <h3>Step 2: Educational Details</h3>
                <label>Last School/College Name:</label>
                <input type="text" name="school_name" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                <label>Board/University:</label>
                <input type="text" name="board" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                <label>Year of Passing:</label>
                <input type="number" name="passing_year" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                <label>Percentage/CGPA:</label>
                <input type="text" name="cgpa" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">

                <div style="position: relative; width: 100%; height: 50px; padding-bottom: 10px; margin-top: 15px;">
                <button type="button" onclick="prevStep(2)" style="background-color: #DC3545; color: white; border: none; padding: 12px 20px; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; transition: background 0.3s ease; position: absolute; left: 0;">Previous</button>
                <button type="button" onclick="nextStep(2)" style="background-color: #007BFF; color: white; border: none; padding: 12px 20px; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; transition: background 0.3s ease; position: absolute; right: 0;">Next</button>
            </div>



            </div>

            <div class="step" id="step3" style="display: none;">
                <h3>Step 3: Course Details</h3>

                <label>Course Applied For:</label>
                <input type="text" name="course_applied" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                <label>Department:</label>
                <input type="text" name="department" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                <label>Course Duration:</label>
                <select name="duration" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                <option value="">Select</option>
                <option>1 Year</option>
                <option>2 Years</option>
                <option>3 Years</option>
                <option>4 Years</option>
                <option>5 Years</option>
                </select>

                <label>Admission Category:</label>
                <select name="admission_cate" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                    <option value="">Select</option>
                    <option>Merit-Based</option>
                    <option>Entrance Exam</option>
                    <option>Sports Quota</option>
                </select>
                <div style="position: relative; width: 100%; height: 50px; padding-bottom: 10px; margin-top: 15px;">
                    <button type="button" onclick="prevStep(3)" style="background-color: #DC3545; color: white; border: none; padding: 12px 20px; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; transition: background 0.3s ease; position: absolute; left: 0;">Previous</button>
                    <button type="button" onclick="nextStep(3)" style="background-color: #007BFF; color: white; border: none; padding: 12px 20px; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; transition: background 0.3s ease; position: absolute; right: 0;">Next</button>
                </div>
            </div>

            <div class="step" id="step4" style="display: none;">
                <h3>Step 4: Upload Documents</h3>
                <label>Passport Size Photo:</label>
                <input type="file" name="passport_image" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                <label>Mark Sheets (10th, 12th):</label>
                <input type="file" name="marksheet_image" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
               
                <div style="position: relative; width: 100%; height: 50px; padding-bottom: 10px; margin-top: 15px;">
                    <button type="button" onclick="prevStep(4)" style="background-color: #DC3545; color: white; border: none; padding: 12px 20px; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; transition: background 0.3s ease; position: absolute; left: 0;">Previous</button>
                    <button type="button" onclick="nextStep(4)" style="background-color: #007BFF; color: white; border: none; padding: 12px 20px; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; transition: background 0.3s ease; position: absolute; right: 0;">Next</button>
                </div>

            </div>

            <div class="step" id="step5" style="display: none;">
                <h3>Step 5: payment Details</h3>
                <label>Enter The Payment:</label>
                <input type="text" name="payment" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                <label>Payment Type:</label>
                <select name="payment_type" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                    <option value="">Select Payment Type</option>
                    <option value="Check">Check</option>
                    <option value="Cash">Cash</option>
                    <option value="UPI">UPI</option>
                </select>

                <label>Payment Date:</label>
                <input type="date" name="payment_date" id="paymentDate" required style="width: 100%; padding: 15px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 18px; box-sizing: border-box;">
                <div style="position: relative; width: 100%; height: 50px; padding-bottom: 10px; margin-top: 15px;">
                    <button type="button" onclick="prevStep(4)" style="background-color: #DC3545; color: white; border: none; padding: 12px 20px; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; transition: background 0.3s ease; position: absolute; left: 0;">Previous</button>
                    <button type="submit" style="background-color: #28A745; color: white; border: none;padding: 12px 20px; border-radius: 5px; cursor: pointer;font-size: 16px; font-weight: bold; transition: background 0.3s ease;position: absolute; right: 0;">Submit</button>
                </div>
             </div>
        </form>
    </div>
</div>
@include('footer')
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        let today = new Date().toISOString().split('T')[0];
        document.getElementById("paymentDate").value = today;
    });

        let currentStep = 1;
        function showStep(step) {
            document.querySelectorAll('.step').forEach(s => s.style.display = 'none');
            document.getElementById("step" + step).style.display = 'block';
            updateProgress(step);
        }

        function nextStep(step) {
            let inputs = document.querySelectorAll("#step" + step + " input");
            let allFilled = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    allFilled = false;
                    input.style.border = "2px solid red";
                } else {
                    input.style.border = "1px solid #ccc";
                }
            });

            if (allFilled) {
                currentStep = step + 1;
                showStep(currentStep);
            } else {
                alert("Please fill all the details before proceeding.");
            }
        }

        function prevStep(step) {
            currentStep = step - 1;
            showStep(currentStep);
        }

        function updateProgress(step) {
            let progress = ((step - 1) / 4) * 100;
            document.getElementById("progressBar").style.width = progress + "%";

            document.querySelectorAll('.step-circle').forEach((circle, index) => {
                if (index + 1 < step) {
                    circle.style.backgroundColor = "#007BFF";
                    circle.innerHTML = "✔";
                } else {
                    circle.style.backgroundColor = "grey";
                    circle.innerHTML = index + 1;
                }
            });
        }
        
    </script>
</body>
</html>
