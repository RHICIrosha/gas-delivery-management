<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Customer Dashboard - GasByGas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #f7d44a;
            --secondary-color: #f8a427;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        }

        .sidebar {
            background: #fff;
            min-height: calc(100vh - 56px);
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .nav-link {
            color: #333;
            padding: 0.8rem 1rem;
        }

        .nav-link:hover {
            background-color: #fff3cd;
        }

        .nav-link.active {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: #fff;
        }

        .card {
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .stats-card {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: #fff;
        }

        .btn-custom {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            color: #fff;
        }

        .btn-custom:hover {
            opacity: 0.9;
            color: #fff;
        }

        .table th {
            background-color: #fff3cd;
        }

        .usage-chart {
            height: 300px;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                GasByGas Business Portal
            </a>
            <div class="d-flex align-items-center">
                <span class="text-white me-3">Welcome, ABC Industries Ltd</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-light btn-sm">Logout</button>
                </form>

            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar pt-3">
                <div class="p-3 mb-3 bg-light rounded">
                    <h6 class="mb-1">Business Account</h6>
                    <small>ID: BUS-2024-001</small>
                    <hr>
                    <small>Status: <span class="badge bg-success">Verified</span></small>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-shopping-cart me-2"></i>Place Order
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-history me-2"></i>Order History
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-file-invoice me-2"></i>Invoices
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-chart-line me-2"></i>Usage Analytics
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-cog me-2"></i>Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-headset me-2"></i>Support
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 p-4">
                <!-- Business Details Alert -->
                <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                    <strong>Certification Renewal Required!</strong> Your business certification will expire in 30 days.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>

                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <h5 class="card-title">Active Contract</h5>
                                <h2 class="mb-0">12 Months</h2>
                                <small>Renewal: Dec 2024</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <h5 class="card-title">Monthly Quota</h5>
                                <h2 class="mb-0">50/75</h2>
                                <small>Cylinders Used</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <h5 class="card-title">Current Stock</h5>
                                <h2 class="mb-0">15</h2>
                                <small>Cylinders Available</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stats-card">
                            <div class="card-body">
                                <h5 class="card-title">Active Orders</h5>
                                <h2 class="mb-0">3</h2>
                                <small>In Processing</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Pending Orders -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Recent Orders</h5>
                                <button class="btn btn-custom btn-sm">View All</button>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                            <th>Delivery Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>BO-2024-001</td>
                                            <td>10 cylinders</td>
                                            <td><span class="badge bg-warning">Processing</span></td>
                                            <td>2024-01-15</td>
                                        </tr>
                                        <tr>
                                            <td>BO-2024-002</td>
                                            <td>15 cylinders</td>
                                            <td><span class="badge bg-info">Scheduled</span></td>
                                            <td>2024-01-18</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Usage Analytics -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Monthly Usage Analysis</h5>
                                <select class="form-select form-select-sm" style="width: auto;">
                                    <option>Last 3 Months</option>
                                    <option>Last 6 Months</option>
                                    <option>Last Year</option>
                                </select>
                            </div>
                            <div class="card-body">
                                <div class="usage-chart">
                                    <!-- Placeholder for chart -->
                                    <img src="/api/placeholder/600/300" alt="Usage Chart" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Business Contract Details -->
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Contract Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Contract Information</h6>
                                <ul class="list-unstyled">
                                    <li><strong>Contract Type:</strong> Annual Business Supply</li>
                                    <li><strong>Monthly Quota:</strong> 75 Cylinders (37.5kg)</li>
                                    <li><strong>Rate:</strong> LKR 7,500 per cylinder</li>
                                    <li><strong>Payment Terms:</strong> Net 30</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6>Delivery Schedule</h6>
                                <ul class="list-unstyled">
                                    <li><strong>Primary Delivery Day:</strong> Every Monday</li>
                                    <li><strong>Emergency Delivery Available:</strong> Yes</li>
                                    <li><strong>Preferred Time Slot:</strong> 9:00 AM - 11:00 AM</li>
                                    <li><strong>Special Instructions:</strong> Delivery at loading dock only</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
