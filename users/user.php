<?php
require '../DB/db.php';

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Method to validate password
    public function validatePassword($password)
    {
        $pattern = '/^(?=.*[A-Z])(?=.*[0-9])(?=.*[\W]).{8,}$/';
        return preg_match($pattern, $password);
    }

    // Method to register the user
    public function register($username, $firstname, $lastname, $password, $email)
    {
        if (!$this->validatePassword($password)) {
            return "Password must be at least 8 characters, contain one uppercase letter, one number, and one symbol.";
        }

        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Call stored procedure
            $stmt = $this->pdo->prepare("CALL SP_UsersStore(?, ?, ?, ?, ?, ?, ?)");
            $user_id = NULL; // Use NULL for insert operation
            $operation_type = 0; // 0 for insert, 1 for update
            
            if ($stmt->execute([$username, $hashed_password, $firstname, $lastname, $email, $user_id, $operation_type])) {
                return  $successMessage = "Registration successfully !";
            } else {
                return $errorMessage = "Registration failed!";
            }
          //  return $status_message;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }


  
}
?>
