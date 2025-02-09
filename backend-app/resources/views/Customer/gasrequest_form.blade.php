<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas Request Form - GasByGas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <style>
        :root {
            --primary-yellow: #FFC107;
            --secondary-yellow: #FFD54F;
            --dark-yellow: #FFA000;
            --light-yellow: #FFF3E0;
        }

        body {
            background: var(--light-yellow);
            font-family: 'Poppins', sans-serif;
        }

        .form-card {
            background: white;
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            animation: slideIn 0.5s ease-out;
        }

        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid #eee;
            padding: 12px;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-yellow);
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }

        .btn-primary {
            background: var(--primary-yellow);
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            color: #2C3E50;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background: var(--dark-yellow);
            transform: translateY(-2px);
        }

        .section-title {
            color: #2C3E50;
            border-bottom: 2px solid var(--primary-yellow);
            padding-bottom: 8px;
            margin-bottom: 20px;
        }

        #tokenDetails {
            display: none;
            animation: slideIn 0.5s ease-out;
        }

        .token-card {
            background: var(--light-yellow);
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-card p-4">
                    <h3 class="mb-4 text-center">Gas Cylinder Request</h3>

                    <form id="gasRequestForm">
                        <!-- Delivery Information Section -->
                        <div class="mb-4">
                            <h5 class="section-title">Delivery Information</h5>

                            <div class="mb-3">
                                <label class="form-label">Select Gas Type</label>
                                <select class="form-select" id="gasType" required>
                                    <option value="">Select Gas Type</option>
                                    <option value="DOM125">12.5 KG Domestic Cylinder</option>
                                    <option value="COM375">37.5 KG Commercial Cylinder</option>
                                    <option value="POR050">5 KG Portable Cylinder</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" min="1" max="5" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Preferred Outlet</label>
                                <select class="form-select" id="outlet" required>
                                    <option value="">Select Nearest Outlet</option>
                                    <option value="CMB01">Colombo Central</option>
                                    <option value="KDW01">Kaduwela Branch</option>
                                    <option value="NUG01">Nugegoda Outlet</option>
                                </select>
                            </div>
                        </div>

                        <!-- Delivery Address Section -->
                        <div class="mb-4">
                            <h5 class="section-title">Delivery Address</h5>

                            <div class="mb-3">
                                <label class="form-label">Address Line 1</label>
                                <input type="text" class="form-control" id="address1" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address Line 2</label>
                                <input type="text" class="form-control" id="address2">
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Postal Code</label>
                                    <input type="text" class="form-control" id="postalCode" required>
                                </div>
                            </div>
                        </div>

                        <!-- Confirmation Section -->
                        <div class="mb-4">
                            <h5 class="section-title">Additional Information</h5>

                            <div class="alert alert-info mb-3">
                                <i class="fas fa-info-circle me-2"></i>
                                Please verify your token will be generated after confirmation
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Special Instructions (Optional)</label>
                                <textarea class="form-control" id="instructions" rows="3"></textarea>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the terms and conditions
                                </label>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                            </div>
                        </div>
                    </form>

                    <!-- Token Details Section (Initially Hidden) -->
                    <div id="tokenDetails" class="token-card">
                        <h5 class="section-title">Request Token Generated</h5>
                        <div class="row">
                            <div class="col-md-8">
                                <p><strong>Token ID:</strong> <span id="tokenId"></span></p>
                                <p><strong>Request ID:</strong> <span id="requestId"></span></p>
                                <p><strong>Customer ID:</strong> <span id="customerId"></span></p>
                                <p><strong>Gas Type:</strong> <span id="tokenGasType"></span></p>
                                <p><strong>Outlet Code:</strong> <span id="tokenOutlet"></span></p>
                                <p><strong>Generated On:</strong> <span id="tokenDate"></span></p>
                            </div>
                            <div class="col-md-4">
                                <div id="qrcode"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Generate a unique customer ID (simplified for demo)
        const generateCustomerId = () => {
            return 'CUS' + Math.random().toString(36).substr(2, 6).toUpperCase();
        };

        // Generate token ID based on the specified format
        const generateTokenId = () => {
            const date = new Date();
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            const sequence = String(Math.floor(Math.random() * 999) + 1).padStart(3, '0');
            return `TGS-${year}-${month}${day}-${sequence}`;
        };

        // Form submission handler
        document.getElementById('gasRequestForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Validate form fields
            if (!this.checkValidity()) {
                e.stopPropagation();
                this.classList.add('was-validated');
                return;
            }

            // Generate token and details
            const tokenId = generateTokenId();
            const customerId = generateCustomerId();
            const requestId = 'REQ001';
            const gasType = document.getElementById('gasType');
            const outlet = document.getElementById('outlet');

            // Update token details in the UI
            document.getElementById('tokenId').textContent = tokenId;
            document.getElementById('requestId').textContent = requestId;
            document.getElementById('customerId').textContent = customerId;
            document.getElementById('tokenGasType').textContent = gasType.options[gasType.selectedIndex].text;
            document.getElementById('tokenOutlet').textContent = outlet.options[outlet.selectedIndex].text;
            document.getElementById('tokenDate').textContent = new Date().toLocaleString();



            // Show token details section
            document.getElementById('tokenDetails').style.display = 'block';

            // Disable form submission
            this.querySelector('button[type="submit"]').disabled = true;
        });
    </script>
</body>
</html>
