# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    entrypoint.sh                                      :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: malatini <dev@malatini.dev>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2021/10/24 23:48:10 by malatini            #+#    #+#              #
#    Updated: 2021/10/25 01:44:23 by malatini           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

target="/etc/php7/php-fpm.d/www.conf"
grep -E "listen = 127.0.0.1" $target > /dev/null 2>&1
if [ $? -eq 0 ]; then
	sed -i "s|.*listen = 127.0.0.1.*|listen = 8000|g" $target
fi

if [ ! -f "./adminer/index.php" ]; then
	mkdir ./adminer
	curl -L https://github.com/vrana/adminer/releases/download/v4.8.1/adminer-4.8.1-mysql-en.php \
			--output ./adminer/index.php --silent
fi

php-fpm7 --nodaemonize