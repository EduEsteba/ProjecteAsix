#!/usr/bin/expect -f
set username [lindex $argv 0]
set password [lindex $argv 1]

spawn passwd $username
expect "Introduzca la nueva contraseña de UNIX: "
send "$password\r"
expect "Vuelva a escribir la nueva contraseña de UNIX: "
send "$password\r"
expect eof
