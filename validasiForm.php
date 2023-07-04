<?php
$errors = [];

$name = $email = $website = $comment = $gender = '';
function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = sanitizeInput($_POST["name"]);
  $email = sanitizeInput($_POST["email"]);
  $website = sanitizeInput($_POST["website"]);
  $comment = sanitizeInput($_POST["comment"]);
  $gender = sanitizeInput($_POST["gender"]);
  if (empty($name)) {
    $errors[] = "Nama harus diisi.";
  }
  if (empty($email)) {
    $errors[] = "Email harus diisi.";
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Format email tidak valid.";
    }
  }
  if (!empty($website)) {
    // Memeriksa format URL yang valid
    if (!filter_var($website, FILTER_VALIDATE_URL)) {
      $errors[] = "Format website tidak valid.";
    }
  }
  if (empty($comment)) {
    $errors[] = "Komentar harus diisi.";
  }
  if (empty($gender)) {
    $errors[] = "Jenis kelamin harus dipilih.";
  }
  if (empty($errors)) {
    $successMsg = "Form berhasil dikirim!";
    $name = $email = $website = $comment = $gender = '';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Validasi Form dengan PHP</title>
</head>
<body>
  <h2>Formulir</h2>

  <?php if (!empty($errors)) { ?>
    <div style="color: red;">
      <ul>
        <?php foreach ($errors as $error) { ?>
          <li><?php echo $error; ?></li>
        <?php } ?>
      </ul>
    </div>
  <?php } ?>

  <?php if (isset($successMsg)) { ?>
    <div style="color: green;"><?php echo $successMsg; ?></div>
  <?php } ?>

  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Nama:</label>
    <input type="text" name="name" value="<?php echo $name; ?>"><br>

    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>"><br>

    <label for="website">Website:</label>
    <input type="text" name="website" value="<?php echo $website; ?>"><br>

    <label for="comment">Komentar:</label>
    <textarea name="comment"><?php echo $comment; ?></textarea><br>

    <label for="gender">Jenis Kelamin:</label>
    <input type="radio" name="gender" value="Pria" <?php if ($gender == "Pria") echo "checked"; ?>>Pria
    <input type="radio" name="gender" value="Wanita" <?php if ($gender == "Wanita") echo "checked"; ?>>Wanita<br>

    <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>
