# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    entrypoint.sh                                      :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: malatini <dev@malatini.dev>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2021/10/24 23:50:34 by malatini            #+#    #+#              #
#    Updated: 2021/10/24 23:50:35 by malatini           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

conf_file="/etc/redis.conf"
grep -E "bind 127.0.0.1" $conf_file > /dev/null 2>&1
if [ $? -eq 0 ]; then
	sed -i "s|bind 127.0.0.1|bind 0.0.0.0|g" $conf_file
fi

grep -E "protected-mode yes" $conf_file > /dev/null 2>&1
if [ $? -eq 0 ]; then
	sed -i "s|protected-mode yes|protected-mode no|g" $conf_file
fi

redis-server /etc/redis.conf