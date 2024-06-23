#!/bin/bash
clear
if [ ! -d "/opt/lampp" ]; then
    echo "LAMPP is not installed in /opt/lampp"
    exit 1
fi

if ! command -v live-server &>/dev/null; then
    echo "live-server is not installed"
    exit 1
fi

if ! command -v figlet &>/dev/null; then
    echo "figlet is not installed"
    exit 1
fi

if ! command -v lolcat &>/dev/null; then
    echo "lolcat is not installed"
    exit 1
fi

is_not_running() {
    sudo /opt/lampp/lampp status | grep -q "not running"
    return $?
}

start_lampp() {
    sudo /opt/lampp/lampp start
    clear
    figlet -f term -t -k -c "Script created by" | lolcat -a -d 20
    figlet -f smslant -t -k -c 9OwL | lolcat -a -d 5
    figlet -f term -t -k -c "Don't ask me how to do this!" | lolcat -a -d 20
}

stop_lampp() {
    clear
    sudo /opt/lampp/lampp stop
    clear
    exit 0
}

if is_not_running; then
    start_lampp
fi

live-server --port=5500 --ignore=./upload/* --no-browser | lolcat &
trap stop_lampp SIGINT
wait
