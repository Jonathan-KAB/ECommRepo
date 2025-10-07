<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SeamLink Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="../login-register.css" rel="stylesheet">
    </head>
    <body>
            <div class="register-main">
                <div class="register-left">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" alt="Kente fabric slideshow" id="kente-img-0" class="slideshow-img active">
                    <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=600&q=80" alt="Kente fabric slideshow" id="kente-img-1" class="slideshow-img">
                    <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=600&q=80" alt="Kente fabric slideshow" id="kente-img-2" class="slideshow-img">
                    <img src="https://images.unsplash.com/photo-1502082553048-f009c37129b9?auto=format&fit=crop&w=600&q=80" alt="Kente fabric slideshow" id="kente-img-3" class="slideshow-img">
                </div>
                <div class="register-right">
                    <div style="width:100%;display:flex;align-items:center;justify-content:center;min-height:calc(100vh - 160px);">
                        <form method="POST" action="../actions/register_user_action.php" class="register-form" id="register-form">
                            <h2>Create Account</h2>
                            <div class="input-field">
                                <input type="text" id="name" name="name" required placeholder=" ">
                                <label for="name">Name</label>
                            </div>
                            <div class="input-field">
                                <input type="email" id="email" name="email" required placeholder=" ">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input type="password" id="password" name="password" required placeholder=" ">
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="phone_number" name="phone_number" required placeholder=" ">
                                <label for="phone_number">Phone Number</label>
                            </div>
                            <div class="input-field">
                                <select id="country" name="country" required>
                                    <option value="" disabled selected></option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Ivory Coast">Ivory Coast</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Other">Other</option>
                                </select>
                                <label for="country">Country</label>
                            </div>
                            <div class="input-field">
                                <input type="text" id="city" name="city" required placeholder=" ">
                                <label for="city">City</label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label d-block mb-2">Register As</label>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" id="customer" value="buyer" checked>
                                        <label class="form-check-label" for="customer">Customer</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" id="seller" value="seller">
                                        <label class="form-check-label" for="seller">Seller</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn">Register</button>
                            <div class="bottom-link">
                                Already have an account? <a href="login.php">Login here</a>.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                // Refined slideshow with fade effect
                const totalSlides = 4;
                let idx = 0;
                setInterval(() => {
                    idx = (idx + 1) % totalSlides;
                    for (let i = 0; i < totalSlides; i++) {
                        const img = document.getElementById('kente-img-' + i);
                        if (i === idx) {
                            img.classList.add('active');
                        } else {
                            img.classList.remove('active');
                        }
                    }
                }, 3500);
            </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../js/register.js"></script>
    </body>
    </html>