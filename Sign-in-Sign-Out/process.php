<!DOCTYPE html>
<html>
<head>
    <title>Form Submission Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #4CAF50;
            text-align: center;
        }
        p {
            font-size: 18px;
        }
        .back-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #c4331a;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
        }
        .back-button:hover {
            background-color: #a12a15;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST['submit'])) {
            $username = trim($_POST['U_name']);
            $id = trim($_POST['U_ID']);
            $book = isset($_POST['Books']) ? trim($_POST['Books']) : '';
            $borrowing_date = trim($_POST['Borrow_Date']);
            $return_date = trim($_POST['Return_Date']);
        
            // Validate that all fields are filled
            if (empty($username) || empty($id) || empty($book) || empty($borrowing_date) || empty($return_date)) {
                echo "<div class='container'><h1>Error</h1><p>All fields are required. Please go back and fill out the form completely.</p></div>";
            } else {
                // Cookie and borrowing logic
                $cookie_name = "BookBorrow";
                
                if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == $id) {
                    echo "Sorry! You are not allowed to borrow another book. You need to return the previously borrowed book first.";
                } else {
                    setcookie($cookie_name, $id, time() + 604800); // 1 week
                    echo "<div class='container'>";
                    echo "<h1>Form Submission Result</h1>";
                    echo "Successfully Borrowed!<br>";
                    echo "Username: $username<br>";
                    echo "Student ID: $id<br>";
                    echo "Book: $book<br>";
                    echo "Borrowing Date: $borrowing_date<br>";
                    echo "Return Date: $return_date<br>";
                    echo "</div>";
                }
            }
        }
        ?>
        <a href="PRIVATE.php" class="back-button">BACK</a>
    </div>
</body>
</html>
