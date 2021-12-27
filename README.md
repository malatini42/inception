# inception

- 125 / 100
- run sudo make && head to https://c3b5aw.42.fr

## mandatory part

- nginx
- mariadb
- wordpress

## bonus part

- redis
- adminer
- static CV
- vsftpd
- cAdvisor / Prometheus / Grafana

## notes

- Maybe care of "USER" before entrypoint.
- Disable docker as sudo but would require 42 VM to have enough autorization on docker sock.
- Prefer using copied configuration into the containers instead of modifying in .sh scripts.
