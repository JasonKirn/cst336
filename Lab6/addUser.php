<?php
//https://ide.c9.io/singh81/cst336
$servername = "us-cdbr-iron-east-05.cleardb.net";
$username = "bac85967e1905a";
$password = "1f5c1b57";
$dbname = "heroku_b451a5033689d3c"; 

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);



    function departmentList() {
        
        global $conn;
        
        $sql = "SELECT * FROM departments ORDER BY name";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($records = $result->fetch_assoc()) {
                echo "<option value='".$records['id']."'> " . $records['name'] . "</option>";
            }
        }   
        else {
            echo "WRONG CREDENTIALS";
        }
        
        return $records;
        
    }

if (isset($_POST['addUser'])) { //the add form has been submitted
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phoneNum'];
    $role = $_POST['role'];
    $department = $_POST['department'];//the deptId
    
    $sql = "INSERT INTO user
                (firstName, lastName, email, phone, role, deptId)
            VALUES
                ('$firstName', '$lastName', '$email', '$phone', '$role', '$department')";
    
    $conn->query($sql);
    echo "<span class='eventText'>";
    echo "User added";
    echo "</span>";
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Admin: Add new user</title>
        <style>
            @import url("./css/styles.css");
        </style>
    </head>
    <body>
        
        <h1> Adding New User </h1>
        
        <h1> Tech Checkout System: Adding a New User</h1>
        <form method="POST">
            User Id: <input type="text" name="userId" />
            <br />
            First Name:<input type="text" name="firstName" />
            <br />
            Last Name:<input type="text" name="lastName"/>
            <br/>
            Email: <input type= "email" name ="email"/>
            <br/>
            Phone Number: <input type ="text" name= "phoneNum"/>
            <br />
           Role: 
           <select name="role">
                <option value=""> - Select One - </option>
                <option value="staff">Staff</option>
                <option value="student">Student</option>
                <option value="faculty">Faculty</option>
            </select>
            <br />
            Department: 
            <select name="department">
                <option value="" > Select One </option>
                    <?php
                    
                    $departments = departmentList();
                    ?>
                
            </select>
            <input type="submit" id="addUserButton" value="Add User" name="addUser">
        </form>
    </body>
</html>