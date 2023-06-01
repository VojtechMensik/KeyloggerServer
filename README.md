# Keylogger
This software is meant to demonstrate how a keylogger could function. It captures the keystrokes of the user and uploads them to a remote server. This repository contains the server. The keylogger can be found at: https://github.com/VojtechMensik/keylogger
# How to use
In order to enable the program to run you will need to create a file **enable.txt** in the same directory as the .exe file. If you move the file elsewere, the program will close itself.
The captured keystrokes are stored  in **%appdata%\SystemData** directory. To setup the server, you can use xampp to host the server locally. Import the database.sql file to create a database for storing the captured keystokes. 
Once you have setup the server, write the full address in the **enable.txt file**, for example: http://localhost/upload.php.
# Disclamer
 The software provided herein is intended for educational purposes only. It is designed to serve as a learning tool for individuals interested in understanding the functioning and potential vulnerabilities of computer systems.
Users are solely responsible for their actions and should ensure compliance with all applicable laws, regulations, and ethical standards. The developer and publisher of this keylogger software shall not be held liable for any misuse, damages, or legal issues arising from its use.

