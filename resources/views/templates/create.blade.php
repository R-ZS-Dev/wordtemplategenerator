<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .upload-card {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        .btn-success {
            width: 100%;
        }
        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="upload-card p-4">
        <h3 class="text-center text-success">
            <i class="fas fa-file-upload"></i> Upload a New Template
        </h3>
        <hr>
        <form action="{{ route('templates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label"><i class="fas fa-file-alt"></i> Template Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter template name" required>
            </div>

            <div class="mb-3">
                <label for="file" class="form-label"><i class="fas fa-upload"></i> Upload Template (.docx)</label>
                <input type="file" name="file" id="file" class="form-control" accept=".docx" required>
                <small class="text-muted">Only .docx files are allowed.</small>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-cloud-upload-alt"></i> Upload
            </button>
        </form>
    </div>
</div>

</body>
</html>
