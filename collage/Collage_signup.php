<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    @use postcss-preset-env {
  stage: 0;
}

/* config.css */

:root {
  --baseColor: #606468;
}

/* helpers/align.css */

.align {
  display: grid;
  place-items: center;
}

.grid {
  inline-size: 90%;
  margin-inline: auto;
  max-inline-size: 20rem;
}

/* helpers/hidden.css */

.hidden {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}

/* helpers/icon.css */

:root {
  --iconFill: var(--baseColor);
}

.icons {
  display: none;
}

.icon {
  block-size: 1em;
  display: inline-block;
  fill: var(--iconFill);
  inline-size: 1em;
  vertical-align: middle;
}

/* layout/base.css */

:root {
  --htmlFontSize: 100%;

  --bodyBackgroundColor: #2c3338;
  --bodyColor: var(--baseColor);
  --bodyFontFamily: "Open Sans";
  --bodyFontFamilyFallback: sans-serif;
  --bodyFontSize: 0.875rem;
  --bodyFontWeight: 400;
  --bodyLineHeight: 1.5;
}

* {
  box-sizing: inherit;
}

html {
  box-sizing: border-box;
  font-size: var(--htmlFontSize);
}

body {
  background-color: var(--bodyBackgroundColor);
  color: var(--bodyColor);
  font-family: var(--bodyFontFamily), var(--bodyFontFamilyFallback);
  font-size: var(--bodyFontSize);
  font-weight: var(--bodyFontWeight);
  line-height: var(--bodyLineHeight);
  margin: 0;
  min-block-size: 100vh;
}

/* modules/anchor.css */

:root {
  --anchorColor: #eee;
}

a {
  color: var(--anchorColor);
  outline: 0;
  text-decoration: none;
}

a:focus,
a:hover {
  text-decoration: underline;
}

/* modules/form.css */

:root {
  --formGap: 0.875rem;
}

input {
  background-image: none;
  border: 0;
  color: inherit;
  font: inherit;
  margin: 0;
  outline: 0;
  padding: 0;
  transition: background-color 0.3s;
}

input[type="submit"] {
  cursor: pointer;
}

.form {
  display: grid;
  gap: var(--formGap);
}

.form input[type="password"],
.form input[type="text"],
.form input[type="submit"] {
  inline-size: 100%;
}

.form__field {
  display: flex;
}

.form__input {
  flex: 1;
}

/* modules/login.css */

:root {
  --loginBorderRadus: 0.25rem;
  --loginColor: #eee;

  --loginInputBackgroundColor: #3b4148;
  --loginInputHoverBackgroundColor: #434a52;

  --loginLabelBackgroundColor: #363b41;

  --loginSubmitBackgroundColor: #ea4c88;
  --loginSubmitColor: #eee;
  --loginSubmitHoverBackgroundColor: #d44179;
}

.login {
  color: var(--loginColor);
}

.login label,
.login input[type="text"],
.login input[type="password"],
.login input[type="submit"] {
  border-radius: var(--loginBorderRadus);
  padding: 1rem;
}

.login label {
  background-color: var(--loginLabelBackgroundColor);
  border-bottom-right-radius: 0;
  border-top-right-radius: 0;
  padding-inline: 1.25rem;
}

.login input[type="password"],
.login input[type="text"] {
  background-color: var(--loginInputBackgroundColor);
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
}

.login input[type="password"]:focus,
.login input[type="password"]:hover,
.login input[type="text"]:focus,
.login input[type="text"]:hover {
  background-color: var(--loginInputHoverBackgroundColor);
}

.login input[type="submit"] {
  background-color: var(--loginSubmitBackgroundColor);
  color: var(--loginSubmitColor);
  font-weight: 700;
  text-transform: uppercase;
}

.login input[type="submit"]:focus,
.login input[type="submit"]:hover {
  background-color: var(--loginSubmitHoverBackgroundColor);
}

/* modules/text.css */

p {
  margin-block: 1.5rem;
}

.text--center {
  text-align: center;
}

</style>
<body class="align mt-5">
<button type="button" onclick="window.location.href = '../index.html'" class="btn btn-outline-secondary position-absolute top-0 start-0 mt-3 mx-3"><i class="bi bi-arrow-left" style="color:gray;font-size:20px;"></i>Are you a Student?</button>
  <div class="grid">
  <h2>Collage Registration</h2>
    <form action="Collage_logic.php" method="POST" class="form login" enctype="multipart/form-data">

      <div class="form__field">
        <label for="CName"><i class="bi-person-circle" style="color:gray;font-size:20px;"></i></label>
        <input autocomplete="CName" id="CName" type="text" name="CName" class="form__input" placeholder="Collage Name" required>
      </div>
      <small style="color:gray">Upload Collage Logo</small>
      <div class="form__field">
        <input class="form-control form-control-sm" type="file" name="file">
      </div>

      <div class="form__field">
        <label for="Cemail"><i class="bi bi-envelope" style="color:gray;font-size:20px;"></i></label>
        <input autocomplete="Cemail" id="Cemail" type="text" name="Cemail" class="form__input" placeholder="Collage Email" required>
      </div>

      <div class="form__field">
        <label for="Cphno"><i class="bi bi-geo-alt-fill" style="color:gray;font-size:20px;"></i><span class="hidden">Phno</span></label>
        <input autocomplete="Cphno" id="Cphno" type="number" name="Cphno" class="form__input" placeholder="91 xxxxxxxxx" required>
      </div>

      <div class="form__field">
        <label for="CState"><i class="bi bi-geo-alt-fill" style="color:gray;font-size:20px;"></i><span class="hidden">State</span></label>
        <input autocomplete="CState" id="CState" type="text" name="CState" class="form__input" placeholder="State" required>
      </div>

      <div class="form__field">
        <label for="CCity"><i class="bi bi-geo-alt-fill" style="color:gray;font-size:20px;"></i><span class="hidden">City</span></label>
        <input autocomplete="CCity" id="CCity" type="text" name="CCity" class="form__input" placeholder="City" required>
      </div>

      <div class="form__field">
        <label for="Caddress"><i class="bi bi-geo-alt-fill" style="color:gray;font-size:20px;"></i><span class="hidden">address</span></label>
        <input autocomplete="Caddress" id="Caddress" type="text" name="Caddress" class="form__input" placeholder="Address" required>
      </div>
      

      <div class="form__field">
        <label for="Cpassword"><i class="bi bi-key-fill" style="color:gray;font-size:20px;"></i><span class="hidden">Password</span></label>
        <input id="Cpassword" type="password" name="CPass" class="form__input" placeholder="Password" required>
      </div>

      <div class="form__field">
        <label for="Conpassword"><i class="bi bi-key-fill" style="color:gray;font-size:20px;"></i><span class="hidden">Password</span></label>
        <input id="Conpassword" type="password" name="ConPass" class="form__input" placeholder="Confirm Password" required>
      </div>

      <div class="form__field">
        <input type="submit" name="signup" value="Sign Up">
      </div>

    </form>

    <p class="text--center">Already a Member? <a href="Collage_login.php">Log In now</a>&nbsp;<i class="bi bi-arrow-right" style="color:gray;font-size:20px;"></i></p>

  </div>
  

</body>