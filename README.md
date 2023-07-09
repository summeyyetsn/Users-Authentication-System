# Users-Authentication-System
This project is user membership and authentication system prepared in PHP language. BCrypt hashing algorithm is used for password hashing.

## User Membership:

Some format validations have been added to the users' membership form:<br>
Username: must be at least 6 characters<br>
Password: must be at least 8 characters<br>
at least one capital letter,<br>
at least one lowercase letter,<br>
at least one special character,<br>
must contain at least one number.<br>
email : HTML5 checks email format compliance for us.<br><br>
When the form validations are provided, the membership process takes place provided that there is no registered user with the same e-mail and name in the database.<br><br>
![2](https://github.com/summeyyetsn/Users-Authentication-System/assets/67558688/4a78e6c1-985a-402c-a539-4334f993ea31)
![özel karakter içermeli](https://github.com/summeyyetsn/Users-Authentication-System/assets/67558688/5538b64d-e796-430e-97f0-6dc268ae576b)



## User login:

Some format validations have been added to the users login form:<br>
email : It is checked whether the email is registered in the database.<br>
Password: If the email is registered in the database, the passwor corresponding to this email and the password entered by the user are compared with the 'password_verify' function. If a match is achieved, the login process is successful.
<br><br>

Short description video of the project:

https://github.com/summeyyetsn/Users-Authentication-System/assets/67558688/ff46da3b-5e84-4a6d-9199-2ff8725d68de

