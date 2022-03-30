# inception 📚

inception - 2022 (Common Core).

❗️ Will only work on Linux OS (42 VM)

- Actual Status : validated.
- Result        : 100% (validated 07/01/2022)

[![forthebadge](https://forthebadge.com/images/badges/built-with-love.svg)](https://forthebadge.com)

![Alt text](/inception.png?raw=true "Inception")

Effectuer eventuellement les commandes suivantes sur l'host par precaution (a priori pas besoin)

```bash
#Sur la vm de l'ecole il y a pleins de service qui tournent sans qu'on le demande
sudo service nginx stop
sudo service mariadb stop
sudo service apache2 stop
sudo service mysql stop
```

Documentations lues :

[https://wiki.alpinelinux.org/wiki/MariaDB](https://wiki.alpinelinux.org/wiki/MariaDB)
[https://www.isicca.com/fr/lemp-installer-nginx-php7-mariadb/](https://www.isicca.com/fr/lemp-installer-nginx-php7-mariadb/)
[https://www.nginx.com/blog/installing-wordpress-with-nginx-unit/](https://www.nginx.com/blog/installing-wordpress-with-nginx-unit/)
[https://tech.osteel.me/posts/docker-for-local-web-development-part-1-a-basic-lemp-stack](https://tech.osteel.me/posts/docker-for-local-web-development-part-1-a-basic-lemp-stack)
[https://grafikart.fr/tutoriels/dns-fonctionnement-1061#autoplay](https://grafikart.fr/tutoriels/dns-fonctionnement-1061#autoplay)
[https://vsupalov.com/docker-arg-env-variable-guide/](https://vsupalov.com/docker-arg-env-variable-guide/)
[https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose-on-ubuntu-20-04](https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose-on-ubuntu-20-04)

**Installer docker-compose**:

[https://www.digitalocean.com/community/tutorials/how-to-install-docker-compose-on-ubuntu-18-04](https://www.digitalocean.com/community/tutorials/how-to-install-docker-compose-on-ubuntu-18-04)

→ Attention sur la VM il peut y avoir une erreur "exec" quand on lance docker-compose, cela signifie en realite qu'il n'est pas bien installe. La methode decrite dans le readme de Lea Lescure n'a pas fonctionné pour moi.

<aside>
💡 Ce projet consistera a vous faire mettre en place une mini-infrastructure de differents services suivants des regles specifiques.

</aside>

<aside>
💡 Nous travaillons sur ce projet sur une stack LEMP (Linux, Nginx, MariaDb/MySQL, PHP)

</aside>

**Documentation, tutoriels:**

- Techwithnana
- Article medium particulierement interessant : [https://medium.com/swlh/wordpress-deployment-with-nginx-php-fpm-and-mariadb-using-docker-compose-55f59e5c1a](https://medium.com/swlh/wordpress-deployment-with-nginx-php-fpm-and-mariadb-using-docker-compose-55f59e5c1a)
    - Attention celui-ci reprend des images officielles alors que nous devons refaire les notres sous debian ou alpine
- voir la playlist youtube de xavki [https://www.youtube.com/watch?v=pMAGe6nTkws](https://www.youtube.com/watch?v=pMAGe6nTkws)
- **super readme de Lea Lescure**

---

# **Docker compose**

[https://docs.docker.com/engine/swarm/how-swarm-mode-works/services/](https://docs.docker.com/engine/swarm/how-swarm-mode-works/services/)

Compose is a tool for defining and running multi-container Docker applications.

**Frequently a service is the image for a microservice within the context of some larger application.**

## Commandes docker-compose

```cpp
docker-compose build//build, construction de l image
docker-compose up//fait le build et le run
docker-compose up -d//-d comme detach, permet de garder le container actif meme si on sort du terminal

docker-compose ps//pour avoir l'etat des services
docker-compose start//on redemarre les services
docker-compose stop//on stop les services/containers
docker-compose rm//suppression
```

Docker-compose permet de faire du **scaling de service** (puisque c'est un "orchestrateur"). Cela signifie que nous allons pouvoir repliquer le service en plusieurs instances

```cpp
docker-compose scale SERVICE=3
```

On peut build une image mais on peut aussi la mettre a jour, pour cela utiliser (permet de se retourner sur les depots distants et non distants).

```cpp
docker-compose pull
```

## Redaction d'un fichier docker-compose

## Services

```yaml
services:
	servicename:
		image: alpine
		#On ajoute des "clauses" restart et container_name
		restart: always
		container_name: myalpine
		#premier script/premier process qu'on veut lancer au lancement du container
		entrypoint: ps aux
```

Pour faire des checks on peut faire **docker-compose ps** et **docker ps**.

 Pour checker les images on peut faire **docker images.**

Pour stopper les conteneurs il faut donc utiliser la commande :

```yaml
docker-compose stop
```

Si on fait un docker ps, il n'y aura pas de container affiche, et si on fait un docker ps -a on verra les conteneurs mais au status exited.

---

On peut faire un docker-compose start pour les relancer.

**docker-compose down** ou **docker-compose stop et docker-compose rm**

---

## Reseau

La commande docker network ls va nous permettre de constater que docker-compose a cree un bridge (reseau) specifique a notre application. Docker compose va nous permettre de "cloisonner" pour empecher la communication entre "les containers d'applications differentes".

### Observer le/les reseaux docker-compose

```yaml
docker network ls
```

Pour avoir encore plus d'informations sur un reseau il est possible d'utiliser la commande docker inspect <nomdureseau>

### Detailler les infos sur un network ou un volume

```yaml
docker inspect <networkname> | more
```

Si on veut se render sur une machine apres l'avoir lance il faut faire :

```yaml
#"rentrer a l'interieur du container"
docker exec -it nomducontainer sh
```

On peut installer nmap pour faire des tests sur les ports

On pourrait creer plusieurs reseaux, qui ne seraient pas accessibles par tous les services.

Les networks permettent notamment d'ajouter une grosse couche de securite supplementaire.

---

### Les volumes

→ les volumes sont une solution pour eviter la perte de donnees (permettent la persistence de donnees). Si on relance un nouveau conteneur, on veut pouvoir se regreffer sur ce qu on avait. On va pouvoir egalement potentiellement partager entre plusieurs conteneurs ces datas.

---

De la meme maniere qu'on cree un network on doit specifier le volume a la "racine" de l'indentation.

Au niveau de la declaration de notre volume on peut faire une declaration un peu plus poussee pour indiquer qu on stocke les donnees sur notre host qui stocke/heberge le docker.

Notre volume s'appelle dbdata, on va lui passer un driver local (l'herbergement se fera sur notre machine locale), on va lui passer plusieurs options.

On peut **observer nos volumes en faisant la commande**

```bash
docker volume ls
# docker inspect <volume_name>
```

Puisque les donnees sont stockees de “maniere externe” (via les volumes), meme si on fait un docker-compose down, lorsque l'on relancera notre base de donnees devra etre dans "le meme etat" que precedemment.

Comme on le faisait pour les reseaux, plusieurs containers pourront partager le meme volume.

**Tutoriel** : [https://www.youtube.com/watch?v=4beEybPzYqQ](https://www.youtube.com/watch?v=4beEybPzYqQ)

[https://github.com/groovemonkey/hands_on_linux-self_hosted_wordpress_for_linux_beginners/](https://github.com/groovemonkey/hands_on_linux-self_hosted_wordpress_for_linux_beginners/)

[https://github.com/MansoorMajeed/devops-from-scratch/blob/master/episodes/28-setting-up-wordpress-nginx-php-fpm.md](https://github.com/MansoorMajeed/devops-from-scratch/blob/master/episodes/28-setting-up-wordpress-nginx-php-fpm.md)

# Notes

## Presentation de docker compose

Docker-compose fait partie de la "suite Docker". Il existe egalement Docker Engine, Docker Machine.

Docker-compose permet de gerer plus facilement le fait d'avoir plusieurs containers (micro-services) en permettant la **coordination**. Il permet de mieux gerer les **dependances** (aspects reseaux, volumes, partages de fichiers etc..). Docker-compose "intervient en matiere de service".

Un service pourrait conteniun ou plusieurs containers. Docker-compose est un "orchestrateur" de containers (actions, interactions entre les uns et les autres).

Comme pour le dockerfile, il s'agit simplement d'un fichier docker-compose.yml ce qui permet un partage facile.

---

Pour pouvoir repondre aux exigences du sujet, il va falloir modifier le fichier /etc/hosts pour mentionner 127.0.0.1 <login>

---

Il va potentiellement falloir reinstaller docker-compose si la version installee n'est pas la latest

### Fastcgi (proxying with nginx)

→ improve performance by not running each request as a separate process.

"It is used to efficiently interface with a server that processes requests for dynamic content (=php)."

---

→One of the main uses-cases of FastCGI proxying within Nginx is for PHP processing. Nginx MUST rely on a separate PHP processor to handle PHP requests. Most often, the processing is handled with php-fpm, a PHP processor that has been extensively tested to work with Nginx.

---

The directive that Nginx uses to define the actual server to proxy to using the FastCGI protocol is fastcgi_pass.

FastCGI is a protocol that cannot read http headers. We have to pass the information by "other means", that is to say, params

```bash
root /var/www/html;

location ~ \ .php $ {
	fastcgi_pass 127.0.0.1:9000;
	fastcgi_param REQUEST_METHOD $request_method;
	fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
	fastcgi_index index.php;
}
```

Multiple locations can use the same config

**Correction et projet**

[Intra Projects Inception Edit.pdf](Inception%20eada2/Intra_Projects_Inception_Edit.pdf)

La correction doit se faire sur le poste / la vm du corrige meme en distanciel.

## Commandes docker (simples) importantes

```python
#Pulls the docker image from dockerhub
docker pull
#Pulls and start the image/container
docker run
docker run -d #Detach permet de continuer a travailler sur le terminal
#-p option pour le port
docker ps -a #All containers not matter if they are running or not
#Restart a container if we made some changes
#all the images you have locally
docker images

docker start
docker stop
#see all the running containers
docker ps
#Lancer une base de donnees postgreSQL
#docker run -e POSTGRES_PASSWORD=password postgres:9.6
```

[readme](https://www.notion.so/readme-8e6402c62a4f4ffaadd5a23392cacfd2)

le "nom de domaine" [login.42.fr](http://login.42.fr) doit pointer vers l'IP locale 127.0.0.1 (demande explicitement dans le sujet). Donc si on fait [https://malatini.42.fr](https://malatini.42.fr) ca revient a faire [https://127.0.0.1](https://127.0.0.1) (attention si on commence a charger tout de suite avec cette page ca peut faire une erreur de cache un peu bizarre qui ne genere pas le CSS).

→ revoir la fiche de correction et preparer des reponses

→ relire la doc la veille des corrections (readme Lea)

MySQL/mariadb

→super tuto de Alessandro Castellani (how to install mariadb on ubuntu)

```bash
sudo mysql -u root -p
#Meme si on a installe mariadb on utilise quand meme les commandes mysql
#pour eviter d'avoir a faire sudo a chaque fois on va updater l'utilisqteur ROOT
MariaDB [(none)]> UPDATE mysql.user SET plugin='mysql_native_password' WHERE user = 'root' AND plugin='unix_socket';
#Ne pas oublier de flush les privileges
FLUSH PRIVILEGES

#voir des infos
mariadb --version

#modifier la configuration
sudo vim /etc/mysql/mariadb.conf.d/50-server.cnf
```

# PID 1

Il ne faut pas utiliser de hacky path. Pour respecter le sujet il n'est pas necessaire d'installer dumb init mais juste de faire des entrypoint et des commandes qui n'utilisent pas d'hacky paths. On va "rentrer" dans les containers via des commandes plus traditionnelles docker.

Install *de* *dumb-init* *->* *A* *minimal* *init* *system* *for* *Linux* *containers*

Will *be* *useful* *to* *handle* *signals* *(PID1* *-* *Signal* *handling* *in* *Docker)*

Les *containers* *docker* *generent* *des* *process* *ayant* *pour* *pid* *1.*

https://petermalmgren.com/signal-handling-docker/

*Si on run un container "wrapped in a shell script", le scrip shell aura le pid 1 et*

*il sera plus possible de passer des signaux au process enfant (aka le container).*

*Dans ce cas SIGTERM serait ignoré.*

*On peut utiliser un "init like process" comme dumb-init, qui possede des capacites de*

*signal "proxying".*

**Commandes nginx**

```bash
nginx status
```

→ voir pourquoi on lance avec la commande "daemon off".

## Makefile

Dans docker-compose, le flag f n'est pas utilise pour forcer mais simplement pour indiquer le fichier docker-compose.yaml

### Checks

Lister tous les process running :

```cpp
ps -aux | less
```

Checker les ports ouverts :

```cpp
netstat -ab
```

Lister les utilisateurs et leur groupe :

```bash
#Lister les utilisateurs
cat /etc/passwd | awk -F: '{print $ 1}'
#Afficher les groupes
cat /etc/group | awk -F: '{print $ 1}'

```

Lister les utilisateurs d'une base de données :

```bash
SELECT User FROM mysql.user;
```

Afficher les droits d'un utilisateur d'une base de données :

```bash
show grants for "user"@"localhost";
```

Acceder a l'invite de commande mysql

```bash
mysql -u root -p
#by default mysql does not allow root login so that's why we should add users
```

Remote Database

```bash
#recuperer l'adresse IP de la base de donnees
ip a
#Mysql client est le paquet qui permet la connexion a distance
mysql -h <ip> -u root-p
#by default mysql does not allow remote connexion
#we have to edit the conf file
sudo vim /etc/mysql/mysql.conf.d/mysql/cnf
#comment the bind address or write 0.0.0.0 or add
#skip-networking
#skip-bind-adresss
```

**login[.42.fr](http://malatini.42.fr)**

Quand on va modifier le fichier /etc/hosts pour que faire une sort de “fausse redirection DNS”.

[https://support.acquia.com/hc/en-us/articles/360004175973-Using-an-etc-hosts-file-for-custom-domains-during-development](https://support.acquia.com/hc/en-us/articles/360004175973-Using-an-etc-hosts-file-for-custom-domains-during-development)

```bash
sudo brew services list
#lister les services, on pourrait egalement leurs status
```

## Mariadb / SQL

### Utilisateurs base de donnees

```sql
SELECT User, Db, Host from mysql.db;
/** voir dans mes commentaires code */
```

**Acceder a mysql sans ajouter des arguments**

[https://newbedev.com/shell-error-1045-28000-access-denied-for-user-root-localhost-using-password-no-code-example](https://newbedev.com/shell-error-1045-28000-access-denied-for-user-root-localhost-using-password-no-code-example)

**Page d’administration wordpress**

[https://localhost/wp-admin/index.php](https://localhost/wp-admin/index.php)

**Supers docs user mysql**

[https://www.digitalocean.com/community/tutorials/comment-installer-mysql-sur-ubuntu-18-04-fr](https://www.digitalocean.com/community/tutorials/comment-installer-mysql-sur-ubuntu-18-04-fr)

[https://www.daniloaz.com/en/how-to-create-a-user-in-mysql-mariadb-and-grant-permissions-on-a-specific-database/](https://www.daniloaz.com/en/how-to-create-a-user-in-mysql-mariadb-and-grant-permissions-on-a-specific-database/)

[https://newbedev.com/shell-error-1045-28000-access-denied-for-user-root-localhost-using-password-no-code-example](https://newbedev.com/shell-error-1045-28000-access-denied-for-user-root-localhost-using-password-no-code-example)

### Les volumes

[https://www.youtube.com/watch?v=2ybhGrTSSTo](https://www.youtube.com/watch?v=2ybhGrTSSTo)

[https://www.section.io/engineering-education/how-to-share-data-between-a-docker-container-and-the-host-computer/](https://www.section.io/engineering-education/how-to-share-data-between-a-docker-container-and-the-host-computer/)

[https://www.youtube.com/watch?v=SBUCYJgg4Mk](https://www.youtube.com/watch?v=SBUCYJgg4Mk)

"volumes are used to share data between containers"

```bash
docker volume create <name>
docker volume ls
```

## Docker volumes

→ persistance

→ statefull applications

We plug the physical file system of the host into the container file system

→ mounted into the container

→ If it is modified on the container it will be on the host and vice versa

Il existe plusieurs types de volumes et donc plusieurs commandes

```bash
#host volume
#You decide where on the host file system is mounted into the container
docker run -v <host_directory>:<container_directory>

#Create a volume without spcecifiying where on the host
/var/lib/ #Anonymous volumes
docker run -v /var/lib/mysql/data

#Named volumes -> most used ones, use it on production
docker run name:/var/lib/mysql/data/
```

You define the volume either on the run command OR on the docker-compose file.

Nous on preferera specifier les volumes dans le docker-compoe file.

**Checker les logs**

```bash
sudo docker logs #on peut meme specifier le container qui nous interesse
# wordpress
```
