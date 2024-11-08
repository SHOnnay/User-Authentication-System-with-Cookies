<?php
session_start();
if (!isset($_SESSION['uname'])) {
   
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Borrow System</title>
    <style>
        h1 {
            text-align: center;
            font-family: "Sofia";
            color: #4CAF50;
        }

        body {
            background: #f0f5f5;
            color: #555;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            line-height: 1.6em;
            margin: 0;
            position: relative;
        }

        .button {
            background-color: #04AA6D;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        figure {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            text-align: center;
        }

        figcaption {
            font-size: 20px;
            margin-top: 10px;
        }

        .image-container {
            margin: 10px;
        }

        form {
            background-color: #266657;
            color: #fdfefe; 
            font-family: "Sofia";
            padding: 20px;
            max-width: 500px;
            margin: 0 auto;
            border-radius: 10px;
        }

        label {
            width: 150px;
            display: inline-block;
        }

        input, select {
            width: calc(100% - 160px);
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: auto;
            padding: 10px 20px;
            background-color: #04AA6D;
            color: white;
            border: none;
            cursor: pointer;
        }

        .form-row {
            display: flex;
            align-items: center;
        }

        h2 {
            text-align: center;
        }

        .logout-button {
            position: absolute;
            top: 10px;
            right: 20px;
        }

        .logout-button a {
            text-decoration: none;
            background-color: red;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }

    </style>
</head>
<body>

<?php
if (isset($_SESSION['uname'])) {
    echo '
    <div class="logout-button">
        <a href="logout.php">Logout</a>
    </div>
    ';
}
?>

<h1>Book Borrowing System</h1>
    <br><br>
    <figure>
        <div class="image-container">
            <img src="book1.JFIF" alt="Book 1" width="300" height="350">
            <figcaption>Book 1</figcaption>
        </div>
        <div class="image-container">
            <img src="book2.JFIF" alt="Book 2" width="300" height="350">
            <figcaption>Book 2</figcaption>
        </div>
        <div class="image-container">
            <img src="book3.JFIF" alt="Book 3" width="300" height="350">
            <figcaption>Book 3</figcaption>
        </div>
        <div class="image-container">
            <img src="book4.JFIF" alt="Book 4" width="300" height="350">
            <figcaption>Book 4</figcaption>
        </div>
        <div class="image-container">
            <img src="book5.JFIF" alt="Book 5" width="300" height="350">
            <figcaption>Book 5</figcaption>
        </div>
        <div class="image-container">
            <img src="book6.JFIF" alt="Book 6" width="300" height="350">
            <figcaption>Book 6</figcaption>
        </div>
    </figure>

    <h2>Fill up this form for Borrowing Book </h2>
    
    <form method="POST" action="process.php">
        <div class="form-row">
            <label for="U_name">Enter Your Name:</label>
            <input type="text" name="U_name" required>
        </div>
        
        <div class="form-row">
            <label for="U_ID">Enter Your ID:</label>
            <input type="text" name="U_ID" required>
        </div>

        <div class="form-row">
            <label for="Books">Choose a Book:</label>
            <select name="Books" required>
                <option value="Book 1">Book 1</option>
                <option value="Book 2">Book 2</option>
                <option value="Book 3">Book 3</option>
                <option value="Book 4">Book 4</option>
                <option value="Book 5">Book 5</option>
                <option value="Book 6">Book 6</option>
            </select>
        </div>
        
        <div class="form-row">
            <label for="Borrow_Date">Borrowing Date:</label>
            <input type="date" name="Borrow_Date" required>
        </div>
        
        <div class="form-row">
            <label for="Return_Date">Return Date:</label>
            <input type="date" name="Return_Date" required>
        </div>
        
        <input type="submit" value="Submit" name="submit">
    </form>

</body>
</html>
