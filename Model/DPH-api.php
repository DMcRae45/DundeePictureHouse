<?php
/*
    Description: Dundee Picture House API file
    Collection of functions used in the system

    Author: David McRae, Aaron Hay, Brad Mair
*/
//Read All Movies
function GetAllMovies()
{
    require 'dbConnection.php';

    $sortOrder = 'ORDER BY Release_Ordering desc';
    if (filter_input(INPUT_POST, "ordering", FILTER_SANITIZE_STRING))
    {
        $ordering = filter_input (INPUT_POST, "ordering", FILTER_SANITIZE_STRING);
        if ($ordering == "0")
        {
            $sortOrder = 'ORDER BY Release_Ordering desc';
        }
        elseif ($ordering == "1")
        {
            $sortOrder = 'ORDER BY Release_Ordering asc';
        }
        elseif ($ordering == "2")
        {
            $sortOrder = 'ORDER BY Age_Ordering asc';
        }
        elseif ($ordering == "3")
        {
            $sortOrder = 'ORDER BY Age_Ordering desc';
        }
        elseif ($ordering == "4")
        {
            $sortOrder = 'ORDER BY Title asc';
        }
        elseif ($ordering == "5")
        {
            $sortOrder = 'ORDER BY Title desc';
        }
        elseif ($ordering == "6")
        {
            $sortOrder = 'ORDER BY RunTime desc';
        }
        elseif ($ordering == "7")
        {
            $sortOrder = 'ORDER BY RunTime asc';
        }
        elseif ($ordering == "8")
        {
            $sortOrder = 'ORDER BY Movie_ID asc';
        }
        elseif ($ordering == "9")
        {
            $sortOrder = 'ORDER BY Movie_ID desc';
        }
    }

    $sql = "SELECT * FROM DPH_Movie $sortOrder";

    $stmt = $pdo->prepare($sql);
    $result = $stmt->fetch();
    $success = $stmt->execute();

    if($success && $stmt->rowCount() > 0)
    {
      //  convert to JSON
      $rows = array();
      while($r = $stmt->fetch())
      {
        $rows[] = $r;
      }
      return json_encode($rows);
    }
}

//Insert new Customer to database
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
    $nameError;
    $emailError;
    $usernameError;
    $passwordError;
    $passwordConfirmError;

    if (!preg_match("/^[a-zA-Z ]*$/",$firstName) || !preg_match("/^[a-zA-Z ]*$/",$surname)) // First & Surname must be Letters
    {
      $Error = true;
      $nameError = ":Your name can only contain letters";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Email Must be Valid
    {
      $Error = true;
      $emailError = ":Invalid email format";
    }

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username))//Username Must be letters & Numbers
    {
      $Error = true;
      $usernameError = ":Username Must Contain only letters and numbers";
    }

    if(!empty($password) && $password == $passwordConfirm) // Password & PasswordConfirm Must Match
    {
      if(strlen($password) <= '8')// Passowrd must be Atleast 8 characters
      {
        $Error = true;
        $passwordError = ":Password Must be Atleast 8 characters Long";
      }
      elseif(!preg_match("#[0-9]+#",$password)) // Password must contain a number
      {
        $Error = true;
        $passwordError = ":Your Password Must Contain At Least 1 Number!";
      }
      elseif(!preg_match("#[A-Z]+#",$password)) // Password Must contain an Uppercase letter
      {
        $Error = true;
        $passwordError = ":Your Password Must Contain At Least 1 Capital Letter!";
      }
      elseif(!preg_match("#[a-z]+#",$password))// Password Must Conatain a Lowercase letter
      {
        $Error = true;
        $passwordError = ":Your Password Must Contain At Least 1 Lowercase Letter!";
      }
      else// No password errors have Occured
      {
        $PasswordError = ":Password Is Acceptable";
      }
    }
  }
  if(!empty($password) && $password != $passwordConfirm) // Password and PasswordConfirm do NOT Match
  {
    $Error = true;
    $passwordConfirmError = ":Please Check You've Confirmed Your Password!";
  }
  if(empty($password)) // Password Is Empty
  {
    $Error = true;
    $passwordError = ":Please enter a password";
  }

  if($Error == true) // An Error Has Occured
  {
    $errorString = $nameError.$emailError.$usernameError.$passwordError.$passwordConfirmError;
    header('Location: ../View/registerCustomer.php?error='.$errorString);
  }
  else // Continue with the Registration
  {
    // Hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);
    $passwordConfirm ="";

    // Create SQL Template
    $query = $pdo->prepare
    ("

    INSERT INTO DPH_Customer (First_Name, Surname, Email, Username, Password)
    VALUES( :firstName, :surname, :email, :username, :password)

    ");

    // Runs and executes the query
    $success = $query->execute
    ([
      'firstName' => $firstName,
      'surname' => $surname,
      'email' => $email,
      'username' => $username,
      'password' => $password
    ]);

    // If rows returned is more than 0 Let us know if it inserted or not.
    $count = $query->rowCount();
    if($count > 0)
    {
      echo "Insert Successful";
      header('location: ../View/index.php');
    }
    else
    {
      echo "Insert Failed";
      //echo $query -> errorInfo()[2];
    }
  }
}

//Insert new Employee to database
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
    $passwordConfirm = (filter_input(INPUT_POST, 'passwordConfirm', FILTER_SANITIZE_STRING));

    // Error checking variables
    $Error = false;
    $nameError;
    $jobRoleError;
    $usernameError;
    $passwordError;
    $passwordConfirmError;

    if (!preg_match("/^[a-zA-Z ]*$/",$firstName) || !preg_match("/^[a-zA-Z ]*$/",$surname)) // First & Surname must be Letters
    {
      $Error = true;
      $nameError = ":Your name can only contain letters";
    }

    if ($jobrole != "employee" || $jobrole != "supervisor" || $jobrole != "manager" ) // Job role must match a specific type from the list
    {
      $Error = true;
      $jobRoleError = ":Job role is not a valid type, please select one from the dropdown list";
    }

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username))//Username Must be letters & Numbers
    {
      $Error = true;
      $usernameError = ":Username Must Contain only letters and numbers";
    }

    if(!empty($password) && $password == $passwordConfirm) // Password & PasswordConfirm Must Match
    {
      if(strlen($password) <= '8')// Passowrd must be Atleast 8 characters
      {
        $Error = true;
        $passwordError = ":Password Must be Atleast 8 characters Long";
      }
      elseif(!preg_match("#[0-9]+#",$password)) // Password must contain a number
      {
        $Error = true;
        $passwordError = ":Your Password Must Contain At Least 1 Number!";
      }
      elseif(!preg_match("#[A-Z]+#",$password)) // Password Must contain an Uppercase letter
      {
        $Error = true;
        $passwordError = ":Your Password Must Contain At Least 1 Capital Letter!";
      }
      elseif(!preg_match("#[a-z]+#",$password))// Password Must Conatain a Lowercase letter
      {
        $Error = true;
        $passwordError = ":Your Password Must Contain At Least 1 Lowercase Letter!";
      }
      else// No password errors have Occured
      {
        $PasswordError = ":Password Is Acceptable";
      }
    }
  }
  if(!empty($password) && $password != $passwordConfirm) // Password and PasswordConfirm do NOT Match
  {
    $Error = true;
    $passwordConfirmError = ":Please Check You've Confirmed Your Password!";
  }
  if(empty($password)) // Password Is Empty
  {
    $Error = true;
    $passwordError = ":Please enter a password";
  }

  if($Error == true) // An Error Has Occured
  {
    $errorString = $nameError.$jobRoleError.$usernameError.$passwordError.$passwordConfirmError;
    header('Location: ../View/registerEmployee.php?error='.$errorString);
  }
  else // Continue with the Registration
  {
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
    }
  }

}

//Login Customer
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
        $_SESSION['LoggedIn'] = true;
        $_SESSION['userid'] = $result['Customer_ID'];
        $_SESSION['username'] = $result['Username'];
        $_SESSION['firstname'] = $result['First_Name'];
        header('location: ../View/index.php');
      }
      else
      {
        // invalid password
          $invalidError = "Invalid Credentials";
          header('location: ../View/customerLogin.php?error='.$invalidError);
      }
    }
    else
    {
      // no records found
      $invalidError = "Invalid Credentials";
      header('location: ../View/customerLogin.php?error='.$invalidError);
    }
  }
}

//Logout Users
function AttemptLogOut()
{
    session_start(); // Start Session / Resume Current Session
    session_destroy(); // Destroy Session
    header("Location: ../View/index.php"); // Redirect to index page
}

//Login Employee
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
        $_SESSION['LoggedIn'] = true;
        $_SESSION['userid'] = $result['Employee_ID'];
        $_SESSION['username'] = $result['Username'];
        $_SESSION['jobrole'] = $result['Job_Role'];
        header("Location:../View/employeeNavigation.php");
      }
      else
      {
        // Password is incorrect
        $invalidError = "Invalid Credentials";
        header('location: ../View/employeeLogin.php?error='.$invalidError);
      }
    }
    else
    {
      // no records found
      $invalidError = "Invalid Credentials";
      header('location: ../View/employeeLogin.php?error='.$invalidError);
    }
  }
}

//Insert new Movie to database
function AttemptInsertMovie()
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
                    $fileDestination = '../View/images/' . $fileNameNew;
                    // Sends file to specified location
                    move_uploaded_file($fileTmpName, $fileDestination);

                    // Once complete carry out the INSERT statement to database
                    $title = (filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
                    $video = (filter_input(INPUT_POST, 'video', FILTER_SANITIZE_STRING));
                    $image = $fileDestination;
                    $description = (filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
                    $releaseDate = (filter_input(INPUT_POST, 'releaseDate', FILTER_SANITIZE_STRING));
                    $ageRating = (filter_input(INPUT_POST, 'ageRating', FILTER_SANITIZE_STRING));
                    $runTime = (filter_input(INPUT_POST, 'runTime', FILTER_SANITIZE_NUMBER_INT));
                    $genre = (filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING));
                    $director = (filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING));
                    $actors = (filter_input(INPUT_POST, 'actors', FILTER_SANITIZE_STRING));
                    $language = (filter_input(INPUT_POST, 'language', FILTER_SANITIZE_STRING));
                    $starRating = (filter_input(INPUT_POST, 'starRating', FILTER_SANITIZE_STRING));


                    $Error = false;
                    $videoError;
                    $descriptionError;
                    // release Date
                    // Age Rating
                    $runTimeError;
                    $genreError;
                    $directorError;
                    $languageError;
                    // $starRatingError;

                    // IMPLEMENT LATER
                    // $httpsSubString = 'https://www.youtube.com';
                    // $watchSubString = 'watch?v=';
                    // if(strpos($video, $httpsSubString) !== 0)
                    // {
                    //     $Error = true;
                    //     $videoError = ":This is not a Youtube link.";
                    // }
                    // elseif(strpos($video, $watchSubString) == false)
                    // {
                    //   $Error = true;
                    //   $videoError = ":Please check that the youtube link is correct";
                    // }

                    if(preg_match('#[^0-9]#',$runTime) || strlen($runTime) > 3)
                    {
                      $Error = true;
                      $runTimeError = ":Runtime must be the amount of minutes in whole numbers.";
                    }

                    if(!preg_match("/^[a-zA-Z ]*$/",$genre))
                    {
                      $Error = true;
                      $genreError = ":Genre can only contain letters.";
                    }

                    if(!preg_match("/^[a-zA-Z ]*$/",$director))
                    {
                      $Error = true;
                      $directorError = ":Director can only caontain letters.";
                    }

                    if(!preg_match("/^[a-zA-Z ]*$/",$language))
                    {
                      $Error = true;
                      $languageError = ":Language can only contain letters.";
                    }

                    if($Error == true) // An Error Has Occured
                    {
                      $errorString = $videoError.$runTimeError.$genreError.$directorError.$languageError;
                      header('Location: ../View/insertMovie.php?error='.$errorString);
                    }
                    else
                    {

                    $YoutubeURL = "watch?v=";
                    $embededURL = "embed/";
                    $video = str_replace($YoutubeURL, $embededURL, $video); // replace part of the Youtube URL to make it an embeded video for easy use by users.
                    $releaseOrder = date("Y-m-d", strtotime($releaseDate)); // Force date format DD/MM/YYYY
                    $releaseDate = date("d-m-Y", strtotime($releaseDate)); // Force date format DD/MM/YYYY

                    switch($starRating)
                    {
                      case "0":
                        $starRating = "../View/images/0_star.png";
                        break;
                      case "1":
                        $starRating = "../View/images/1_star.png";
                        break;
                      case "2":
                        $starRating = "../View/images/2_star.png";
                        break;
                      case "3":
                        $starRating = "../View/images/3_star.png";
                        break;
                      case "4":
                        $starRating = "../View/images/4_star.png";
                        break;
                      case "5":
                        $starRating = "../View/images/5_star.png";
                        break;
                    }

                    switch($ageRating)
                    {
                      case "U":
                        $ageRating = "../View/images/U.png";
                        $ageOrdering = "0";
                        break;
                      case "PG":
                        $ageRating = "../View/images/PG.png";
                        $ageOrdering = "1";
                        break;
                      case "12A":
                        $ageRating = "../View/images/12A.png";
                        $ageOrdering = "2";
                        break;
                      case "15":
                        $ageRating = "../View/images/15.png";
                        $ageOrdering = "3";
                        break;
                      case "18":
                        $ageRating = "../View/images/18.png";
                        $ageOrdering = "4";
                        break;
                    }

                    if(isset($_POST['threeD']))
                    {
                      $threeD = 1;
                    }
                    else
                    {
                      $threeD = 0;
                    }

                    if(isset($_POST['audioDescribed']))
                    {
                      $audioDescribed = 1;
                    }
                    else
                    {
                      $audioDescribed = 0;
                    }

                    $query = $pdo->prepare
                    ("

                    INSERT INTO DPH_Movie (Title, Video_Link, Image_Link, Description, Release_Ordering, Release_Date, Age_Ordering, Age_Rating, RunTime, Genre, Director, Actors, Language, 3D, Audio_Described, Star_Rating)
                    VALUES (:title, :video, :image, :description, :releaseOrder, :releaseDate, :ageOrdering, :ageRating, :runTime, :genre, :director, :actors, :language, :threeD, :audioDescribed, :starRating)

                    ");


                    $success = $query->execute
                    ([
                      'title' => $title,
                      'video' => $video,
                      'image' => $image,
                      'description' => $description,
                      'releaseOrder' => $releaseOrder,
                      'releaseDate' => $releaseDate,
                      'ageOrdering' => $ageOrdering,
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
                      $validError = "Success";
                      header('location: ../View/insertMovie.php?error='.$validError);
                    }
                    else
                    {
                      $invalidError = "Insert Failed";
                      header('location: ../View/insertMovie.php?error='.$invalidError);
                    }
                  }
                }
                else
                {
                    $invalidError = "Your file is too big!";
                    header('location: ../View/insertMovie.php?error='.$invalidError);
                }
            }
            else
            {
                $invalidError = "There was an error uploading your file!";
                header('location: ../View/insertMovie.php?error='.$invalidError);
            }
        }
        else
        {
            $invalidError = "You cannot upload files of this type!";
            header('location: ../View/insertMovie.php?error='.$invalidError);
        }
    }
}

function AttemptUpdateMovie()
{
    Require 'dbConnection.php';
    // Checks if submit button has been pressed
    if (isset($_POST['updateMovieSubmit']))
    {
      $index = (filter_input(INPUT_POST, 'index', FILTER_SANITIZE_STRING));
      $movieEncode = getMovieByID($index);
      $movie_details = json_decode($movieEncode);
      $file = $_FILES['image_link'];
      // Checks there are no errors
      if ($_FILES['image_link']['error'] === 0)
      {
        $fileName = $_FILES['image_link']['name'];
        $fileTmpName = $_FILES['image_link']['tmp_name'];
        $fileError = $_FILES['image_link']['error'];
        $fileType = $_FILES['image_link']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png');
        if (in_array($fileActualExt, $allowed))
        {
          $newImage = True;
        }
      }
      else
      {
        $oldImage = $movie_details->Image_Link;
      }
        // Checks if file is an allowed type
        if (isset($newImage) || isset($oldImage))
        {
                // Checks file size is below stated value
                if ($_FILES['image_link']['size'] < 1000000 || isset($oldImage))
                {
                  if (!isset($oldImage))
                  {
                    try
                    {
                      unlink($movie_details->Image_Link);
                    }
                    catch (Exception $e) {}
                    // Gives file a unique id to stop overwriting of files with same name
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    // Determines file location
                    $fileDestination = '../View/images/' . $fileNameNew;
                    // Sends file to specified location
                    move_uploaded_file($fileTmpName, $fileDestination);
                  }
                  else
                  {
                    $fileDestination = $oldImage;
                  }
                    // Once complete carry out the INSERT statement to database
                    $title = (filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
                    $video = (filter_input(INPUT_POST, 'video', FILTER_SANITIZE_STRING));
                    $image = $fileDestination;
                    $description = (filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
                    $releaseDate = (filter_input(INPUT_POST, 'releaseDate', FILTER_SANITIZE_STRING));
                    $ageRating = (filter_input(INPUT_POST, 'ageRating', FILTER_SANITIZE_STRING));
                    $runTime = (filter_input(INPUT_POST, 'runTime', FILTER_SANITIZE_NUMBER_INT));
                    $genre = (filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING));
                    $director = (filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING));
                    $actors = (filter_input(INPUT_POST, 'actors', FILTER_SANITIZE_STRING));
                    $language = (filter_input(INPUT_POST, 'language', FILTER_SANITIZE_STRING));
                    $starRating = (filter_input(INPUT_POST, 'starRating', FILTER_SANITIZE_STRING));
                    $YoutubeURL = "watch?v=";
                    $embededURL = "embed/";
                    $video = str_replace($YoutubeURL, $embededURL, $video); // replace part of the Youtube URL to make it an embeded video for easy use by users.
                    $releaseOrder = date("Y-m-d", strtotime($releaseDate));
                    $releaseDate = date("d-m-Y", strtotime($releaseDate)); // Force date format DD/MM/YYYY

                    switch($starRating)
                    {
                      case "0":
                        $starRating = "../View/images/0_star.png";
                        break;
                      case "1":
                        $starRating = "../View/images/1_star.png";
                        break;
                      case "2":
                        $starRating = "../View/images/2_star.png";
                        break;
                      case "3":
                        $starRating = "../View/images/3_star.png";
                        break;
                      case "4":
                        $starRating = "../View/images/4_star.png";
                        break;
                      case "5":
                        $starRating = "../View/images/5_star.png";
                        break;
                    }
                    switch($ageRating)
                    {
                      case "U":
                        $ageRating = "../View/images/U.png";
                        $ageOrdering = "0";
                        break;
                      case "PG":
                        $ageRating = "../View/images/PG.png";
                        $ageOrdering = "1";
                        break;
                      case "12A":
                        $ageRating = "../View/images/12A.png";
                        $ageOrdering = "2";
                        break;
                      case "15":
                        $ageRating = "../View/images/15.png";
                        $ageOrdering = "3";
                        break;
                      case "18":
                        $ageRating = "../View/images/18.png";
                        $ageOrdering = "4";
                        break;
                    }
                    if(isset($_POST['threeD']))
                    {
                      $threeD = 1;
                    }
                    else
                    {
                      $threeD = 0;
                    }
                    if(isset($_POST['audioDescribed']))
                    {
                      $audioDescribed = 1;
                    }
                    else
                    {
                      $audioDescribed = 0;
                    }
                    $query = $pdo->prepare
                    ("
                    UPDATE DPH_Movie
                    SET
                    Title = :title,
                    Video_Link = :video,
                    Image_Link = :image,
                    Description = :description,
                    Release_Ordering = :releaseOrder,
                    Release_Date = :releaseDate,
                    Age_Ordering = :ageOrdering,
                    Age_Rating = :ageRating,
                    RunTime = :runTime,
                    Genre = :genre,
                    Director = :director,
                    Actors = :actors,
                    Language = :language,
                    3D = :threeD,
                    Audio_Described = :audioDescribed,
                    Star_Rating = :starRating
                    WHERE Movie_ID = ".$index."
                    ");
                    $success = $query->execute
                    ([
                      'title' => $title,
                      'video' => $video,
                      'image' => $image,
                      'description' => $description,
                      'releaseOrder' => $releaseOrder,
                      'releaseDate' => $releaseDate,
                      'ageOrdering' => $ageOrdering,
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
                      echo $query -> errorInfo()[2];
                    }
                }
                else
                {
                    echo "Your file is too big!";
                }
        }
        else
        {
            echo "You cannot upload files of this type!";
        }
    }
}

//Delete Movie from database
function RemoveMovieByID($movieid)
{
  require 'dbConnection.php';

  $stmt = $pdo->prepare
  (
    "SELECT Showing_ID FROM DPH_Showing WHERE Movie_ID = :movieid"
  );

  $success = $stmt->execute
  ([
    'movieid' => $movieid
  ]);

  if($success && $stmt->rowCount() > 0)
  {
    //  convert to JSON
    $rows = array();
    while($r = $stmt->fetch())
    {
      $rows[] = $r;
    }
    $result = json_encode($rows);

    $showings = json_decode($result);
    $index = 0;

    for($i = 0 ; $i < sizeof($showings) ; $i++)
    {
      $showingid = $showings[$index]->Showing_ID;

      $stmtTicket = $pdo->prepare
      (
        "DELETE FROM DPH_Ticket WHERE Showing_ID = :showingid"
      );

      $success = $stmtTicket->execute
      ([
        'showingid' => $showingid
      ]);

      if($success && $stmtTicket->rowCount() > 0)
      {
        echo 'Ticket Removed';
      }
      else
      {
        echo 'Failed';
      }
      $index++;
    }
  }
  else
  {
    echo 'No Tickets';
  }

    $stmtShowing = $pdo->prepare
    (
      "DELETE FROM DPH_Showing WHERE Movie_ID = :movieid"
    );

    $success = $stmtShowing->execute
    ([
      'movieid' => $movieid
    ]);

    if($success && $stmtShowing->rowCount() > 0)
    {
      echo 'Showings Removed';
    }
    else
    {
      echo 'No Showings';
    }

    $stmtMovie = $pdo->prepare
    (
      "DELETE FROM DPH_Movie WHERE Movie_ID = :movieid"
    );

    $success = $stmtMovie->execute
    ([
      'movieid' => $movieid
    ]);

    if($success && $stmtMovie->rowCount() > 0)
    {
      echo 'Movie Removed';
    }
    else
    {
      echo 'Failed';
    }
}

//Read Movie by ID index
function getMovieByID($movieid)
{
  require 'dbConnection.php';

  $query = $pdo->prepare
  ("
  SELECT * FROM DPH_Movie WHERE Movie_ID = :movieid LIMIT 1
  ");

  $success = $query->execute
  ([
    'movieid' => $movieid
  ]);

  if($success && $query->rowCount() > 0)
  {
    $row = $query->fetch();
    return json_encode($row);
  }
  else
  {
    echo "Unable to find Movie";
  }
}

//Read Showing by ID index
function getShowingByID($showingid)
{
  require 'dbConnection.php';

  $query = $pdo->prepare
  ("
  SELECT * FROM DPH_Showing WHERE Showing_ID = :showingid LIMIT 1
  ");

  $success = $query->execute
  ([
    'showingid' => $showingid
  ]);

  if($success && $query->rowCount() > 0)
  {
    $row = $query->fetch();
    return json_encode($row);
  }
  else
  {
    echo "Unable to find Showing";
  }
}

//Alter Employees Promote
function AttemptPromoteEmployeeByID($employeeid)
{
  require 'dbConnection.php';

  $checkSql = "SELECT Job_Role FROM DPH_Employee WHERE Employee_ID = :employeeid";

  $checkStmt = $pdo->prepare($checkSql);
  $checkSuccess = $checkStmt->execute(['employeeid' => $employeeid]);

  if($checkSuccess && $checkStmt->rowCount() > 0)
  {
    $oldJobRole = $checkStmt->fetch();
  }
  else
  {
    echo 'No Employee found to Promote';
  }

  $embededURLJobRole = $oldJobRole['Job_Role'];

  $canDemote = false;
  if($embededURLJobRole == "employee")
  {
    $canDemote = true;
    $embededURLJobRole = "supervisor";
  }
  elseif($embededURLJobRole == "supervisor")
  {
    $canDemote = true;
    $embededURLJobRole = "manager";
  }
  elseif($embededURLJobRole == "manager")
  {
    echo 'Cannot Promote manager any higher than a manager';
  }
  else
  {
    echo 'Current Job Role is Unknown';
  }

  if($canPromote = true)
  {
    $query = $pdo->prepare
    ("
    UPDATE DPH_Employee SET Job_Role = :newJobRole WHERE Employee_ID = :employeeid
    ");

    $success = $query->execute
    ([
      'newJobRole' => $embededURLJobRole,
      'employeeid' => $employeeid
    ]);

    if($success && $query->rowCount() > 0)
    {
      echo 'Done';
    }
    else
    {
      echo "System Error, Job role was not updated";
      echo $query -> errorInfo()[2];
    }
  }
  else
  {
    echo 'Unable to Promote';
  }
}

//Alter Employees Demote
function AttemptDemoteEmployeeByID($employeeid)
{
  require 'dbConnection.php';

  $checkSql = "SELECT Job_Role FROM DPH_Employee WHERE Employee_ID = :employeeid";

  $checkStmt = $pdo->prepare($checkSql);
  $checkSuccess = $checkStmt->execute(['employeeid' => $employeeid]);

  if($checkSuccess && $checkStmt->rowCount() > 0)
  {
    $oldJobRole = $checkStmt->fetch();
  }
  else
  {
    echo 'No Employee found to Demote';
  }

  $embededURLJobRole = $oldJobRole['Job_Role'];

  $canDemote = false;
  if($embededURLJobRole == "employee")
  {
    echo 'Cannot Demote employee any lower than an employee';
  }
  elseif($embededURLJobRole == "supervisor")
  {
    $canDemote = true;
    $embededURLJobRole = "employee";
  }
  elseif($embededURLJobRole == "manager")
  {
    $canDemote = true;
    $embededURLJobRole = "supervisor";
  }
  else
  {
    echo 'Current Job Role is Unknown';
  }

  if($canPromote = true)
  {
    $query = $pdo->prepare
    ("
    UPDATE DPH_Employee SET Job_Role = :newJobRole WHERE Employee_ID = :employeeid
    ");

    $success = $query->execute
    ([
      'newJobRole' => $embededURLJobRole,
      'employeeid' => $employeeid
    ]);

    if($success && $query->rowCount() > 0)
    {
      echo 'Done';
    }
    else
    {
      echo "System Error, Job role was not updated";
      echo $query -> errorInfo()[2];
    }
  }
  else
  {
    echo 'Unable to Demote';
  }
}

//Delete Employee from database
function AttemptDeleteEmployee($employeeid)
{
  require 'dbConnection.php';

  $query = $pdo->prepare
  ("
  DELETE FROM DPH_Employee WHERE Employee_ID = :employeeid
  ");

  $success = $query->execute
  ([
    'employeeid' => $employeeid
  ]);

  if($success && $query->rowCount() > 0)
  {
    echo 'Delete Successful';
  }
  else
  {
    echo 'Delete Failed';
  }
}

//Read All Employee records from database
function GetAllEmployees()
{
  require 'dbConnection.php';

  $sql = "SELECT Employee_ID, First_Name, Surname, Username, Job_Role FROM DPH_Employee";

  $stmt = $pdo->prepare($sql);
  $result = $stmt->fetch();
  $success = $stmt->execute();

  if($success && $stmt->rowCount() > 0)
  {
    //  convert to JSON
    $rows = array();
    while($r = $stmt->fetch())
    {
      $rows[] = $r;
    }
    return json_encode($rows);
  }
}

//Rest API Searching
function OMDBSearch()
{
  if(isset($_POST['search-by-title-button']))
  {
    $searchItem = (filter_input(INPUT_POST, 'searchTitle', FILTER_SANITIZE_STRING)); //Sanitize the string
    $searchItem = str_replace(' ', '+', $searchItem); //Replace any whitespace with '+' symbols to work on a url
    $listOfMovies = file_get_contents("http://www.omdbapi.com/?apikey=1917d84&type=movie&s=".$searchItem); //Get a list of search results from the OMDb API
    return $listOfMovies; //Return the results
  }
}

//Generate Movie ticket
function GenerateTicketCode()
{
  $day = dechex(date('d'));
  $month = dechex(date('m'));
  $year = dechex(date('y'));
  $hour = dechex(date('H'));
  $minute = dechex(date('i'));
  $second = dechex(date('s'));

  $userid = $_SESSION['userid'];

  $code = $day.$month.$year.$hour.$minute.$second.$userid;

  return $code;
}

//Read Ticket(s) by User ID index
function GetUserTickets($userid)
{
  require 'dbConnection.php';

  $query = $pdo->prepare
  ("
    SELECT t.Ticket_ID, t.Code, m.Title, s.Screen_ID, m.Movie_ID, t.Ticket_Type, t.Seating_Type, s.Showing_Type, s.Showing_Date, s.Showing_Start_Time
    FROM DPH_Ticket t
    JOIN DPH_Showing s ON (t.Showing_ID = s.Showing_ID)
    JOIN DPH_Payment p ON (t.Payment_ID = p.Payment_ID)
    JOIN DPH_Movie m ON (s.Movie_ID = m.Movie_ID)
    WHERE (p.Customer_ID = :userid && s.Showing_Date >= CURDATE())
    ORDER BY s.Showing_Date asc, s.Showing_Start_Time asc, t.Ticket_Type asc
  ");

  $success = $query->execute
  ([
    'userid' => $userid
  ]);

  if($success && $query->rowCount() > 0)
  {
    //  convert to JSON
    $rows = array();
    while($r = $query->fetch())
    {
      $rows[] = $r;
    }
    return json_encode($rows);
  }
}

//Read number of tickets available for showing, by ID index
function GetTicketCount($showingID)
{
  require 'dbConnection.php';

  $query = $pdo->prepare
  ("
    SELECT COUNT(Ti.Ticket_ID) as Numb_Of_Tickets, Sc.Available_Tickets, Sc.Available_Premium_Tickets
    FROM DPH_Ticket Ti
    JOIN DPH_Showing Sh ON (Ti.Showing_ID = Sh.Showing_ID)
    JOIN DPH_Screen Sc ON (Sh.Screen_ID = Sc.Screen_ID)
    WHERE (Ti.Showing_ID = :showid)
  ");

  $success = $query->execute
  ([
    'showid' => $showingID
  ]);
  if($success && $query->rowCount() > 0)
  {
    $row = $query->fetch();
  }
  return json_encode($row);
}

//Read ticket prices from database
function GetTicketInfo()
{
  require 'dbConnection.php';

  $sql = "SELECT * FROM DPH_TicketPrice";

  $stmt = $pdo->prepare($sql);
  $result = $stmt->fetch();
  $success = $stmt->execute();

  if($success && $stmt->rowCount() > 0)
  {
    //  convert to JSON
    $rows = array();
    while($r = $stmt->fetch())
    {
      $rows[] = $r;
    }
    return json_encode($rows);
  }
}

//Read all screens from database
function GetAllScreens()
{
  require 'dbConnection.php';

  $sql = "SELECT * FROM DPH_Screen";

  $stmt = $pdo->prepare($sql);
  $result = $stmt->fetch();
  $success = $stmt->execute();

  if($success && $stmt->rowCount() > 0)
  {
    //  convert to JSON
    $rows = array();
    while($r = $stmt->fetch())
    {
      $rows[] = $r;
    }
    return json_encode($rows);
  }
}

//Insert new Showing
function AttemptInsertShowing()
{
  if (isset($_POST['insertShowingSubmit']))
  {
    require 'dbConnection.php';
    $canInsert = ture;

    $showingDate = (filter_input(INPUT_POST, 'showingDate', FILTER_SANITIZE_STRING));
    $showingTime = (filter_input(INPUT_POST, 'showingTime', FILTER_SANITIZE_STRING));
    if (date("H:i") > date("H:i", $showingTime))
    {
      $canInsert = False;
    }
    $showingType = (filter_input(INPUT_POST, 'showingType', FILTER_SANITIZE_STRING));
    $movieid = (filter_input(INPUT_POST, 'movieid', FILTER_SANITIZE_STRING));
    $screenid = (filter_input(INPUT_POST, 'screenid', FILTER_SANITIZE_STRING));

    if(isset($_POST['threeD']))
    {
      $showingType = "3D";
    }
    else
    {
      $showingType = "2D";
    }

    $query = $pdo->prepare
    ("

    INSERT INTO DPH_Showing (Showing_Start_Time, Showing_Date, Showing_Type, Movie_ID, Screen_ID)
    VALUES (:showingTime, :showingDate, :showingType, :movieid, :screenid)

    ");

    $success = $query->execute
    ([
      'showingTime' => $showingTime,
      'showingDate' => $showingDate,
      'showingType' => $showingType,
      'movieid' => $movieid,
      'screenid' => $screenid,
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
}

//Read all 2D showings for movie, by ID index
function GetTwoDShowings($movieid, $showingDate)
{
  require 'dbConnection.php';

  $twoD = "2D";

  $sql = "SELECT * FROM DPH_Showing WHERE  Movie_ID = :movieid && Showing_Type = :twoD && Showing_Date = :showingDate ORDER BY Showing_Start_Time asc";

  $stmt = $pdo->prepare($sql);
  $result = $stmt->fetch();
  $success = $stmt->execute
  ([
    'movieid' => $movieid,
    'twoD' => $twoD,
    'showingDate' => $showingDate
  ]);
  if($success && $stmt->rowCount() > 0)
  {
    //  convert to JSON
    $rows = array();
    while($r = $stmt->fetch())
    {
      $rows[] = $r;
    }
    return json_encode($rows);
  }
}

//Read all 3D showings for movie, by ID index
function GetThreeDShowings($movieid, $showingDate)
{
  require 'dbConnection.php';

  $threeD = "3D";

  $sql = "SELECT * FROM DPH_Showing WHERE Movie_ID = :movieid && Showing_Type = :threeD && Showing_Date = :showingDate ORDER BY Showing_Start_Time asc";

  $stmt = $pdo->prepare($sql);
  $result = $stmt->fetch();
  $success = $stmt->execute
  ([
    'movieid' => $movieid,
    'threeD' => $threeD,
    'showingDate' => $showingDate
  ]);

  if($success && $stmt->rowCount() > 0)
  {
    //  convert to JSON
    $rows = array();
    while($r = $stmt->fetch())
    {
      $rows[] = $r;
    }
    return json_encode($rows);
  }
}

//Insert a new PayPal Payment to database
function insertPayments($customerid, $transactionid, $paymentStatus, $buyerName, $buyerEmail, $buyerID, $grossAmount, $currencyCode)
{
  require 'dbConnection.php';

  // may need to add date here
  $query =
  ("

    INSERT INTO DPH_Payment (Customer_ID, Transaction_ID, Gross_Payment, Currency_Code, Buyer_ID, Buyer_Name, Buyer_Email, Payment_Status)
    VALUES(:customerid, :transactionid, :grossPayment, :currencyCode, :buyerid, :buyerName, :buyerEmail, :paymentStatus)

  ");

  $stmt = $pdo->prepare($query);

  // Runs and executes the query
  $success = $stmt->execute
  ([
      'customerid' => $customerid,
      'transactionid' => $transactionid,
      'grossPayment' => $grossAmount,
      'currencyCode' => $currencyCode,
      'buyerid' => $buyerID,
      'buyerName' => $buyerName,
      'buyerEmail' => $buyerEmail,
      'paymentStatus' => $paymentStatus
  ]);

  if($success  && $stmt->rowCount() > 0)
  {
    echo "Insert Successful";
  }
  else
  {
    echo "Insert Failed";
    echo $query -> errorInfo()[2];
  }
}

//Read number of customer tickets from bookTickets.php
function GetTicketQuantities()
{
  $quantity_Adult = (filter_input(INPUT_POST, 'ticketQuantityAdult', FILTER_SANITIZE_STRING));
  $quantity_Child = (filter_input(INPUT_POST, 'ticketQuantityChild', FILTER_SANITIZE_STRING));
  $quantity_Student = (filter_input(INPUT_POST, 'ticketQuantityStudent', FILTER_SANITIZE_STRING));
  $quantity_Senior = (filter_input(INPUT_POST, 'ticketQuantitySenior', FILTER_SANITIZE_STRING));
  $quantity_Family = (filter_input(INPUT_POST, 'ticketQuantityFamily', FILTER_SANITIZE_STRING));

  $array = array($quantity_Adult, $quantity_Child, $quantity_Student, $quantity_Senior, $quantity_Family);

  return json_encode($array);
}

//Read type of customer tickets from bookTickets.php
function GetSeatingTypes()
{
  $seatingType_Adult = (filter_input(INPUT_POST, 'seatingTypeAdult', FILTER_SANITIZE_STRING));
  $seatingType_Child = (filter_input(INPUT_POST, 'seatingTypeChild', FILTER_SANITIZE_STRING));
  $seatingType_Student = (filter_input(INPUT_POST, 'seatingTypeStudent', FILTER_SANITIZE_STRING));
  $seatingType_Senior = (filter_input(INPUT_POST, 'seatingTypeSenior', FILTER_SANITIZE_STRING));
  $seatingType_Family = (filter_input(INPUT_POST, 'seatingTypeFamily', FILTER_SANITIZE_STRING));

  $array = array($seatingType_Adult, $seatingType_Child, $seatingType_Student, $seatingType_Senior, $seatingType_Family);

  return json_encode($array);
}

//Insert new Ticket to database
function CreateUserTicket($code, $ticketType, $seatingType, $paymentid, $showingid)
{
  require 'dbConnection.php';

  // may need to add date here
    $query =
    ("

      INSERT INTO DPH_Ticket (Code, Ticket_Type, Seating_Type, Payment_ID, Showing_ID)
      VALUES(:code, :ticketType, :seatingType, :paymentid, :showingid)

    ");

    $stmt = $pdo->prepare($query);

    // Runs and executes the query
    $success = $stmt->execute
    ([
        'code' => $code,
        'ticketType' => $ticketType,
        'seatingType' => $seatingType,
        'paymentid' => $paymentid,
        'showingid' => $showingid
    ]);

    if($success  && $stmt->rowCount() > 0)
    {
      echo "Insert Successful";
    }
    else
    {
      echo "Insert Failed";
      echo $query -> errorInfo()[2];
    }
}

//Read Payment by ID index
function GetPaymentID($customerid)
{
  require 'dbConnection.php';

  $query =
  ("
    SELECT Payment_ID FROM DPH_Payment WHERE Customer_ID = :customerid ORDER BY Payment_ID desc LIMIT 1
  ");

  $stmt = $pdo->prepare($query);
  $success = $stmt->execute
  ([
      'customerid' => $customerid
  ]);

  if($success && $stmt->rowCount() > 0)
  {
    $paymentid = $stmt->fetch();

    //$paymentid = $paymentid[0];

    return $paymentid;
  }
}

//Read ticket(s) by ticket code index
function GetCustomerTicket()
{
  require 'dbConnection.php';

    $code = (filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING));

    $query = $pdo->prepare
    ("
      SELECT t.Ticket_ID, t.Code, m.Title, s.Screen_ID, m.Movie_ID, t.Ticket_Type, t.Seating_Type, s.Showing_Type, s.Showing_Date, s.Showing_Start_Time
      FROM DPH_Ticket t
      JOIN DPH_Showing s ON (t.Showing_ID = s.Showing_ID)
      JOIN DPH_Payment p ON (t.Payment_ID = p.Payment_ID)
      JOIN DPH_Movie m ON (s.Movie_ID = m.Movie_ID)
      WHERE (t.Code = :code)
      ORDER BY s.Showing_Date asc, s.Showing_Start_Time asc, t.Ticket_Type asc
    ");

    $success = $query->execute
    ([
      'code' => $code
    ]);

    if($success && $query->rowCount() > 0)
    {
      //  convert to JSON
      $rows = array();
      while($r = $query->fetch())
      {
        $rows[] = $r;
      }
      return json_encode($rows);
    }
    else
    {
      echo "Sorry, No Tickets with This code.";
    }
}

//Read all Customers
function GetAllCustomers()
{
  require 'dbConnection.php';

  $sql = "SELECT * FROM DPH_Customer";

  $stmt = $pdo->prepare($sql);
  $result = $stmt->fetch();
  $success = $stmt->execute();

  if($success && $stmt->rowCount() > 0)
  {
    //  convert to JSON
    $rows = array();
    while($r = $stmt->fetch())
    {
      $rows[] = $r;
    }
    return json_encode($rows);
  }
}

//Delete Customer from database by ID index
function AttemptDeleteCustomer($customerid)
{
  require 'dbConnection.php';

  $query = $pdo->prepare
  (
    "DELETE FROM DPH_Customer WHERE Customer_ID = :customerid"
  );

  $success = $query->execute
  ([
    'customerid' => $customerid
  ]);

  if($success && $query->rowCount() > 0)
  {
    echo 'Delete Successful';
    header('location: ../View/manageCustomers.php');
  }
  else
  {
    echo 'Delete Failed';
  }
}

//Read Showing by ID index
function GetShowingsByMovieID($movieid)
{
  require 'dbConnection.php';

  $stmt = $pdo->prepare
  ("
  SELECT * FROM DPH_Showing WHERE Movie_ID = :movieid
  ");

  $result = $stmt->fetch();
  $success = $stmt->execute
  ([
    'movieid' => $movieid
  ]);

  if($success && $stmt->rowCount() > 0)
  {
    //  convert to JSON
    $rows = array();
    while($r = $stmt->fetch())
    {
      $rows[] = $r;
    }
    return json_encode($rows);
  }
}

function AttemptDeleteShowing($showid, $movieID)
{
  require 'dbConnection.php';

  $stmtTicket = $pdo->prepare
  (
    "DELETE FROM DPH_Ticket WHERE Showing_ID = :showingid"
  );

  $success = $stmtTicket->execute
  ([
    'showingid' => $showid
  ]);

  if($success && $stmtTicket->rowCount() > 0)
  {
    echo 'Ticket Removed';
  }
  else
  {
    echo 'No Tickets to Remove';
  }

  $stmtShowing = $pdo->prepare
  (
    "DELETE FROM DPH_Showing WHERE Showing_ID = :showid"
  );

  $success = $stmtShowing->execute
  ([
    'showid' => $showid
  ]);

  if($success && $stmtShowing->rowCount() > 0)
  {
    echo 'Showing Removed';
  }
  else
  {
    echo 'Failed';
  }
  header('location: ../View/removeShowings.php?movieID='.$movieID);
}
?>
