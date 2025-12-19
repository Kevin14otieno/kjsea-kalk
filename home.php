<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KJSEA Score Calculator</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@5/dist/tesseract.min.js"></script>


    <style>
        body {
            background: #f4f6f8;
        }
        .card {
            border-radius: 12px;
        }
        .form-control {
            border-radius: 8px;
        }
        #result {
            font-size: 1.3rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">

  
    <div class="text-center mb-4">
        <h1 class="fw-bold">Welcome to KJSEA Calculator</h1>
        <p class="text-muted">
            Calculate a student’s CBC score based on 9 learning areas
        </p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm p-4">

                <h4 class="text-center mb-3">Enter points of Learning Area Scores (0–8)</h4>


                <form id="scoreForm">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Mathematics</label>
                            <input type="number" name="mathematics" class="form-control score" placeholder="0–8" min="0" max="8">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">English</label>
                            <input type="number"name="english" class="form-control score" placeholder="0–8" min="0" max="8">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Kiswahili</label>
                            <input type="number" name="kiswahili" class="form-control score" placeholder="0–8" min="0" max="8">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Integrated Science</label>
                            <input type="number" name="integrated_science"class="form-control score" placeholder="0–8" min="0" max="8">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Social Studies </label>
                            <input type="number" name="social_studies"class="form-control score" placeholder="0–8" min="0" max="8">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Religious Education/Islamic Education</label>
                            <input type="number"name="religious_education" class="form-control score" placeholder="0–8" min="0" max="8">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Creative Arts and Sports</label>
                            <input type="number" name="creative_arts" class="form-control score" placeholder="0–8" min="0" max="8">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pretechnical Studies</label>
                            <input type="number" name="physical_education" class="form-control score" placeholder="0–8" min="0" max="8">
                        </div>

                        <div class="col-md-14">
                            <label class="form-label">Agriculture and Nutrion</label>
                            <input type="number" name="life_skills" class="form-control score" placeholder="0–8" min="0" max="8">
                        </div>

                    </div>

                    <div class="d-grid mt-4">
                        <button type="button" class="btn btn-primary btn-lg" onclick="calculateScore()">
                            Calculate Score
                        </button>
                    </div>
                
</div>

                </form>

             
                <div class="text-center mt-4" id="result"></div>

            </div>
        </div>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
