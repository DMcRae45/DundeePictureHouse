<?php
/*
    Description: Dundee Picture House API file
    Collection of functions used in the system

    Author: David McRae, Aaron Hay
*/
//Get All Movies
function GetAllMovies()
{
    require 'dbConnection.php';;

    $dateFilter = '';
    if (filter_input(INPUT_POST, "month", FILTER_SANITIZE_STRING))
    {
        $month = filter_input (INPUT_POST, "month", FILTER_SANITIZE_STRING);
        if ($month == "0")
        {
            $dateFilter = '';
        }
        else
        {
            $dateFilter = "WHERE MONTH(Release_Date) = '$month'";
        }
    }

    $sql = "SELECT * FROM DPH_Movie $dateFilter ORDER BY Release_Date desc";

    $stmt = $pdo->prepare($sql);
    $result = $stmt->fetch();
    $success = $stmt->execute();

    if($success && $stmt->rowCount() > 0)
    {
      //  convert to JSON
      $rows = array();
      while($r = $result->fetch())
      {
        $rows[] = $r;
      }
      return json_encode($rows);
    }
}

//  Function to create a new customer
function CreateNewCustomer()
{
  Require 'dbConnection.php';

  if (isset($_POST["registerCustomerSubmit"]))
  {
    $firstName = (filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING));
    $surname = (filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING));
    $email = (filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $username = (filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $password = (filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $passwordConfirm = (filter_input(INPUT_POST, 'passwordConfirm', FILTER_SANITIZE_STRING));

    $Error = false;

    if (!preg_match("/^[a-zA-Z ]*$/",$firstName) || !preg_match("/^[a-zA-Z ]*$/",$surname))
    {
      $Error = true;
      $nameError = "Your name can only contain letters";
      echo $nameError;
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      $Error = true;
      $emailError = "Invalid email format";
      echo $emailError;
    }
    elseif(preg_match('/^[a-zA-Z0-9]{5,}$/', $username))
    {
      $Error = true;
      $usernameError = "Username Must be atleast 5 characters long and Contain only letters and numbers";
      echo $usernameError;
    }
    elseif(!empty($password) && $password == $passwordConfirm)
    {
      if(strlen($password) <= '8')
      {
        $Error = true;
        $passwordError = "Your Password Must Contain At Least 8 Characters!";
        echo $passwordError;
      }
      elseif(!preg_match("#[0-9]+#",$password))
      {
        $Error = true;
        $passwordError = "Your Password Must Contain At Least 1 Number!";
        echo $passwordError;
      }
      elseif(!preg_match("#[A-Z]+#",$password))
      {
        $Error = true;
        $passwordError = "Your Password Must Contain At Least 1 Capital Letter!";
        echo $passwordError;
      }
      elseif(!preg_match("#[a-z]+#",$password))
      {
        $Error = true;
        $passwordError = "Your Password Must Contain At Least 1 Lowercase Letter!";
        echo $passwordError;
      }
    }
  }
  elseif(!empty($password))
  {
    $passwordConfirmError = "Please Check You've Entered Or Confirmed Your Password!";
    echo $passwordConfirmError;
  }
  elseif(empty($password))
  {
     $passwordError = "Please enter a password";
     echo $passwordError;
  }

  // Hash the password
  $password = password_hash($password, PASSWORD_DEFAULT);
  $passwordConfirm ="";

  // Create SQL Template
  $query = $pdo->prepare
  ("

  INSERT INTO DPH_Customer (First_Name, Surname, Email, Username, Password)
  VALUES( :firstName, :surname, :email, :username, :password)

  ");

  $success = $query->execute
  ([
    'firstName' => $firstName,
    'surname' => $surname,
    'email' => $email,
    'username' => $username,
    'password' => $password
  ]);

  $count = $query->rowCount();
  if($count > 0)
  {
    echo "Insert Successful";
  }
  else
  {
    echo "Insert Failed";
    echo $query -> errorInfo()[2];
  }
}

// Function to create a new employee
function CreateNewEmployee()
{
  Require 'dbConnection.php';

  if (isset($_POST["registerEmployeeSubmit"]))
  {
    $firstName = (filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING));
    $surname = (filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING));
    $jobrole = (filter_input(INPUT_POST, 'jobrole' , FILTER_SANITIZE_STRING));
    $username = (filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $password = (filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

    //Hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Create SQL Template
    $query = $pdo->prepare
    ("

    INSERT INTO DPH_Employee (First_Name, Surname, Job_Role, Username, Password)
    VALUES( :firstName, :surname, :jobrole, :username, :password)

    ");

    $success = $query->execute
    ([
      'firstName' => $firstName,
      'surname' => $surname,
      'jobrole' => $jobrole,
      'username' => $username,
      'password' => $password
    ]);

    $count = $query->rowCount();
    if($count > 0)
    {
      echo "Insert Successful";
    }
    else
    {
      echo "Insert Failed";
      echo $query -> errorInfo()[2];

      var_dump($firstName);
      var_dump($surname);
      var_dump($jobrole);
      var_dump($username);
      var_dump($password);
    }
  }
}

// Function attempts to login a customer
function AttemptCustomerLogin()
{
  Require 'dbConnection.php';

  if (isset($_POST["customerLoginSubmit"]))
  {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM DPH_Customer WHERE Username = :username";

    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute(['username' => $username]);

    if($success && $stmt->rowCount() > 0)
    {
      $result = $stmt->fetch();

      if ($result && password_verify($password, $result['Password']))
      {
        $_SESSION['userid'] = $result['User_ID'];
        $_SESSION['username'] = $result['Username'];
        $_SESSION['firstname'] = $result['First_name'];
      }
      else
      {
          echo "Password is invalid";
      }
    }
    else
    {
      echo" Record not found";
    }
  }
}

// Function attempts to login an employee
function AttemptEmployeeLogin()
{
  Require 'dbConnection.php';

  if (isset($_POST["employeeLoginSubmit"]))
  {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM DPH_Employee WHERE Username = :username";

    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute(['username' => $username]);

    if($success && $stmt->rowCount() > 0)
    {
      $result = $stmt->fetch();

      if ($result && password_verify($password, $result['Password']))
      {
        $_SESSION['userid'] = $result['User_ID'];
        $_SESSION['username'] = $result['Username'];
        $_SESSION['jobrole'] = $result['Job_Role'];
      }
      else
      {
          echo "Password is invalid";
      }
    }
    else
    {
      echo" Record not found";
    }
  }
}

function InsertMovie()
{
    Require 'dbConnection.php';

    // Checks if submit button has been pressed
    if (isset($_POST['insertMovieSubmit']))
    {

        $file = $_FILES['image_link'];

        $fileName = $_FILES['image_link']['name'];
        $fileTmpName = $_FILES['image_link']['tmp_name'];
        $fileSize = $_FILES['image_link']['size'];
        $fileError = $_FILES['image_link']['error'];
        $fileType = $_FILES['image_link']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        // Checks if file is an allowed type
        if (in_array($fileActualExt, $allowed))
        {
            // Checks there are no errors
            if ($fileError === 0)
            {
                // Checks file size is below stated value
                if ($fileSize < 1000000)
                {
                    // Gives file a unique id to stop overwriting of files with same name
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    // Determines file location
                    $fileDestination = 'images/' . $fileNameNew;
                    // Sends file to specified location
                    move_uploaded_file($fileTmpName, $fileDestination);
                    echo "Success!";

                    // Once complete carry out the INSERT statement to database
                    $title = (filter_input(INPUT_POST, 'headline', FILTER_SANITIZE_STRING));
                    $image = $fileDestination;
                    $description = (filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
                    $releaseDate = (filter_input(INPUT_POST, 'releaseDate', FILTER_SANITIZE_STRING));
                    $ageRating = (filter_input(INPUT_POST, 'ageRating', FILTER_SANITIZE_STRING));
                    $runTime = (filter_input(INPUT_POST, 'runTime', FILTER_SANITIZE_NUMBER_INT));
                    $genre = (filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING));
                    $director = (filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING));
                    $actors = (filter_input(INPUT_POST, 'actors', FILTER_SANITIZE_STRING));
                    $language = (filter_input(INPUT_POST, 'language', FILTER_SANITIZE_STRING));
                    $threeD = (filter_input(INPUT_POST, 'threeD', FILTER_VALIDATE_BOOLEAN));
                    $audioDescribed = (filter_input(INPUT_POST, 'threeD', FILTER_VALIDATE_BOOLEAN));
                    $starRating = (filter_input(INPUT_POST, 'userid', FILTER_SANITIZE_NUMBER_INT));

                    $query = $pdo->prepare
                    ("

                    INSERT INTO DPH_MOVIE (Title, Image_Link, Description, Release_Date, Age_Rating, RunTime, Genre, Director, Actors, Language, 3D, Audio_Described, Star_Rating)
                    VALUES (:title, :image, :description, :releaseDate, :ageRating, :runTime, :genre, :director, :actors, :language, :threeD, :audioDescribed, :starRating)
                    ");


                    $success = $query->execute
                    ([
                      'title' => $title,
                      'image' => $image,
                      'description' => $description,
                      'releaseDate' => $releaseDate,
                      'ageRating' => $ageRating,
                      'runTime' => $runTime,
                      'genre' => $genre,
                      'director' => $director,
                      'actors' => $actors,
                      'language' => $language,
                      'threeD' => $threeD,
                      'audioDescribed' => $audioDescribed,
                      'starRating' => $starRating
                    ]);

                    $count = $query->rowCount();
                    if($count > 0)
                    {
                      echo "Insert Successful";
                    }
                    else
                    {
                      echo "Insert Failed";
                    }
                }
                else
                {
                    echo "Your file is too big!";
                }
            }
            else
            {
                echo "There was an error uploading your file!";
            }
        }
        else
        {
            echo "You cannot upload files of this type!";
        }
    }
}
?>
