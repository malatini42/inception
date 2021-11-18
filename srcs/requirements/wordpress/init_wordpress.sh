#!/bin/sh

if [ -f ./wordpress/wp-config.php ]
then
    echo "Wordpress in well installed"
else
    echo "We have to install wordpress"
fi

#Va permettre d'empecher un restart en permanence
# Takes any command line arguments passed to entrypoint.sh and execs them as command.
exec "$@"