#!/bin/bash
while [ $# -gt 0 ]; do
    key="$1"
    case $key in
        -u)
        user="$2"
        shift; shift;;
        -p)
        password="$2"
        shift; shift;;
        *)
        echo "Opción desconocida: $key"
        echo "Uso: $0 [-u <user>] [-p <password>]"
        exit 1;;
    esac
done
if [ -z "$user" ] || [ -z "$password" ]; then
    echo "Faltan argumentos"
    echo "Uso: $0 [-u <user>] [-p <password>]"
    exit 1
fi
echo -e "$password\n$password" | passwd $user > /dev/null 2>&1