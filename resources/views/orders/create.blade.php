<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center">
                <h2><i class="fas fa-file-invoice"></i> Create Invoice</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Enter customer name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email address" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="order_date" class="form-label">Order Date</label>
                        <input type="date" name="order_date" id="order_date" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="total_amount" class="form-label">Total Amount</label>
                        <input type="number" step="0.01" name="total_amount" id="total_amount" class="form-control" placeholder="Enter total amount" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="template_id" class="form-label">Select Template</label>
                        <select name="template_id" id="template_id" class="form-select" required>
                            @foreach($templates as $template)
                                <option value="{{ $template->id }}">{{ $template->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-success w-100 py-2">
                            <i class="fas fa-file-invoice-dollar"></i> Generate Invoice
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
